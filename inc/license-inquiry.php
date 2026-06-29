<?php
/**
 * License inquiry form — save submissions + optional SMTP mail.
 *
 * Add to wp-config.php for Gmail SMTP (App Password required):
 *
 * define( 'ET_SMTP_ENABLED', true );
 * define( 'ET_SMTP_HOST', 'smtp.gmail.com' );
 * define( 'ET_SMTP_PORT', 587 );
 * define( 'ET_SMTP_USER', 'mnnanhavibhutta@gmail.com' );
 * define( 'ET_SMTP_PASS', 'your-16-char-app-password' );
 * define( 'ET_SMTP_FROM', 'mnnanhavibhutta@gmail.com' );
 * define( 'ET_SMTP_FROM_NAME', 'Eggs Time' );
 * define( 'ET_LICENSE_INQUIRY_EMAIL', 'mnnanhavibhutta@gmail.com' );
 */

if ( ! function_exists( 'et_get_license_inquiry_recipient' ) ) {
    function et_get_license_inquiry_recipient() {
        if ( defined( 'ET_LICENSE_INQUIRY_EMAIL' ) && is_email( ET_LICENSE_INQUIRY_EMAIL ) ) {
            return ET_LICENSE_INQUIRY_EMAIL;
        }

        return 'mnnanhavibhutta@gmail.com';
    }
}

if ( ! function_exists( 'et_get_license_inquiry_from_email' ) ) {
    function et_get_license_inquiry_from_email() {
        if ( defined( 'ET_SMTP_FROM' ) && is_email( ET_SMTP_FROM ) ) {
            return ET_SMTP_FROM;
        }

        if ( defined( 'ET_SMTP_USER' ) && is_email( ET_SMTP_USER ) ) {
            return ET_SMTP_USER;
        }

        $domain = wp_parse_url( home_url(), PHP_URL_HOST );
        if ( $domain ) {
            return 'noreply@' . $domain;
        }

        return et_get_license_inquiry_recipient();
    }
}

add_action( 'phpmailer_init', 'et_configure_license_smtp' );
function et_configure_license_smtp( $phpmailer ) {
    if ( ! defined( 'ET_SMTP_ENABLED' ) || ! ET_SMTP_ENABLED ) {
        return;
    }

    if ( ! defined( 'ET_SMTP_HOST' ) || ! defined( 'ET_SMTP_USER' ) || ! defined( 'ET_SMTP_PASS' ) ) {
        return;
    }

    $phpmailer->isSMTP();
    $phpmailer->Host       = ET_SMTP_HOST;
    $phpmailer->SMTPAuth   = true;
    $phpmailer->Username   = ET_SMTP_USER;
    $phpmailer->Password   = ET_SMTP_PASS;
    $phpmailer->Port       = defined( 'ET_SMTP_PORT' ) ? (int) ET_SMTP_PORT : 587;
    $phpmailer->SMTPSecure = defined( 'ET_SMTP_SECURE' ) ? ET_SMTP_SECURE : 'tls';
    $phpmailer->From       = et_get_license_inquiry_from_email();
    $phpmailer->FromName   = defined( 'ET_SMTP_FROM_NAME' ) ? ET_SMTP_FROM_NAME : get_bloginfo( 'name' );
}

add_filter( 'wp_mail_from', 'et_license_inquiry_mail_from' );
function et_license_inquiry_mail_from( $from_email ) {
    if ( ! empty( $GLOBALS['et_license_inquiry_sending_mail'] ) ) {
        return et_get_license_inquiry_from_email();
    }

    return $from_email;
}

add_filter( 'wp_mail_from_name', 'et_license_inquiry_mail_from_name' );
function et_license_inquiry_mail_from_name( $from_name ) {
    if ( ! empty( $GLOBALS['et_license_inquiry_sending_mail'] ) ) {
        return defined( 'ET_SMTP_FROM_NAME' ) ? ET_SMTP_FROM_NAME : get_bloginfo( 'name' );
    }

    return $from_name;
}

add_action( 'init', 'et_register_license_inquiry_cpt' );
function et_register_license_inquiry_cpt() {
    register_post_type(
        'et_license_inquiry',
        array(
            'labels'              => array(
                'name'          => 'License Inquiries',
                'singular_name' => 'License Inquiry',
                'menu_name'     => 'License Inquiries',
            ),
            'public'              => false,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'menu_position'       => 26,
            'menu_icon'           => 'dashicons-email-alt',
            'capability_type'     => 'post',
            'capabilities'        => array(
                'create_posts' => 'do_not_allow',
            ),
            'map_meta_cap'        => true,
            'supports'            => array( 'title' ),
            'has_archive'         => false,
        )
    );
}

add_action( 'admin_post_nopriv_et_license_inquiry', 'et_license_handle_inquiry' );
add_action( 'admin_post_et_license_inquiry', 'et_license_handle_inquiry' );

function et_license_handle_inquiry() {
    if (
        ! isset( $_POST['et_license_nonce'] )
        || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['et_license_nonce'] ) ), 'et_license_inquiry' )
    ) {
        wp_die( esc_html__( 'Invalid form submission.', 'eggs-shop' ) );
    }

    $company   = isset( $_POST['company_name'] ) ? sanitize_text_field( wp_unslash( $_POST['company_name'] ) ) : '';
    $contact   = isset( $_POST['contact_name'] ) ? sanitize_text_field( wp_unslash( $_POST['contact_name'] ) ) : '';
    $email     = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
    $phone     = isset( $_POST['phone'] ) ? sanitize_text_field( wp_unslash( $_POST['phone'] ) ) : '';
    $country   = isset( $_POST['country'] ) ? sanitize_text_field( wp_unslash( $_POST['country'] ) ) : '';
    $website   = isset( $_POST['website'] ) ? esc_url_raw( wp_unslash( $_POST['website'] ) ) : '';
    $category  = isset( $_POST['product_category'] ) ? sanitize_text_field( wp_unslash( $_POST['product_category'] ) ) : '';
    $territory = isset( $_POST['territory'] ) ? sanitize_text_field( wp_unslash( $_POST['territory'] ) ) : '';
    $message   = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';

    $redirect_fail = wp_get_referer() ? wp_get_referer() : home_url( '/license/' );
    $redirect_fail = add_query_arg( 'license_sent', '0', remove_query_arg( 'license_sent', $redirect_fail ) );

    if ( $company === '' || $contact === '' || $email === '' || ! is_email( $email ) || $country === '' || $category === '' || $territory === '' ) {
        wp_safe_redirect( $redirect_fail );
        exit;
    }

    $inquiry_id = et_save_license_inquiry(
        compact( 'company', 'contact', 'email', 'phone', 'country', 'website', 'category', 'territory', 'message' )
    );

    $mail_sent = et_send_license_inquiry_email(
        compact( 'company', 'contact', 'email', 'phone', 'country', 'website', 'category', 'territory', 'message' )
    );

    if ( $inquiry_id ) {
        update_post_meta( $inquiry_id, '_et_mail_sent', $mail_sent ? 'yes' : 'no' );
    }

    $redirect = wp_get_referer() ? wp_get_referer() : home_url( '/license/' );
    $redirect = remove_query_arg( 'license_sent', $redirect );

    if ( ! $inquiry_id && ! $mail_sent ) {
        wp_safe_redirect( add_query_arg( 'license_sent', '0', $redirect ) . '#et-license-contact' );
        exit;
    }

    $redirect = add_query_arg( 'license_sent', $mail_sent ? '1' : '2', $redirect );
    wp_safe_redirect( $redirect . '#et-license-contact' );
    exit;
}

function et_save_license_inquiry( $data ) {
    $post_id = wp_insert_post(
        array(
            'post_type'   => 'et_license_inquiry',
            'post_status' => 'private',
            'post_title'  => sprintf(
                'Inquiry from %s — %s',
                $data['company'],
                wp_date( 'M j, Y g:i a' )
            ),
        ),
        true
    );

    if ( is_wp_error( $post_id ) ) {
        return 0;
    }

    $meta_map = array(
        '_et_company'   => $data['company'],
        '_et_contact'   => $data['contact'],
        '_et_email'     => $data['email'],
        '_et_phone'     => $data['phone'],
        '_et_country'   => $data['country'],
        '_et_website'   => $data['website'],
        '_et_category'  => $data['category'],
        '_et_territory' => $data['territory'],
        '_et_message'   => $data['message'],
    );

    foreach ( $meta_map as $key => $value ) {
        update_post_meta( $post_id, $key, $value );
    }

    return (int) $post_id;
}

function et_send_license_inquiry_email( $data ) {
    $to      = et_get_license_inquiry_recipient();
    $subject = sprintf( '[Eggs Time] Licensing Inquiry from %s', $data['company'] );
    $body    = "New licensing inquiry:\n\n"
        . "Company: {$data['company']}\n"
        . "Contact: {$data['contact']}\n"
        . "Email: {$data['email']}\n"
        . "Phone: {$data['phone']}\n"
        . "Country: {$data['country']}\n"
        . "Website: {$data['website']}\n"
        . "Product Category: {$data['category']}\n"
        . "Territory: {$data['territory']}\n\n"
        . "Message:\n{$data['message']}\n";

    $headers = array(
        'Content-Type: text/plain; charset=UTF-8',
        'Reply-To: ' . $data['contact'] . ' <' . $data['email'] . '>',
    );

    $GLOBALS['et_license_inquiry_sending_mail'] = true;
    $sent = (bool) wp_mail( $to, $subject, $body, $headers );
    $GLOBALS['et_license_inquiry_sending_mail'] = false;

    return $sent;
}

add_action( 'add_meta_boxes', 'et_license_inquiry_meta_box' );
function et_license_inquiry_meta_box() {
    add_meta_box(
        'et_license_inquiry_details',
        'Inquiry Details',
        'et_license_inquiry_meta_box_render',
        'et_license_inquiry',
        'normal',
        'high'
    );
}

function et_license_inquiry_meta_box_render( $post ) {
    $fields = array(
        'Company'          => get_post_meta( $post->ID, '_et_company', true ),
        'Contact'          => get_post_meta( $post->ID, '_et_contact', true ),
        'Email'            => get_post_meta( $post->ID, '_et_email', true ),
        'Phone'            => get_post_meta( $post->ID, '_et_phone', true ),
        'Country'          => get_post_meta( $post->ID, '_et_country', true ),
        'Website'          => get_post_meta( $post->ID, '_et_website', true ),
        'Product Category' => get_post_meta( $post->ID, '_et_category', true ),
        'Territory'        => get_post_meta( $post->ID, '_et_territory', true ),
        'Email Sent'       => get_post_meta( $post->ID, '_et_mail_sent', true ) === 'yes' ? 'Yes' : 'No',
        'Message'          => get_post_meta( $post->ID, '_et_message', true ),
    );

    echo '<table class="widefat striped"><tbody>';
    foreach ( $fields as $label => $value ) {
        echo '<tr><th style="width:180px;">' . esc_html( $label ) . '</th><td>' . nl2br( esc_html( (string) $value ) ) . '</td></tr>';
    }
    echo '</tbody></table>';
}
