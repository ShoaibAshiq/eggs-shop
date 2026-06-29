<?php
/**
 * License page — Licensee inquiry form
 */

$et_license_categories_options = array(
    'Toys & Collectibles',
    'Surprise Eggs',
    'Confectionery & Snacks',
    'Vitamins & Kids Wellness',
    'Apparel & Accessories',
    'Publishing & Educational Products',
    'Games & Digital Content',
    'Promotions & Retail Programs',
);

$et_license_territory_options = array(
    'North America',
    'Europe',
    'Asia Pacific',
    'Latin America',
    'Middle East',
    'Africa',
    'Global',
    'Other',
);

$et_license_country_options = array(
    'United States',
    'Canada',
    'United Kingdom',
    'Germany',
    'France',
    'Spain',
    'Italy',
    'Netherlands',
    'Poland',
    'United Arab Emirates',
    'Saudi Arabia',
    'India',
    'China',
    'Japan',
    'Australia',
    'Mexico',
    'Brazil',
    'Other',
);

$et_license_form_sent = isset( $_GET['license_sent'] ) && $_GET['license_sent'] === '1';
$et_license_form_saved = isset( $_GET['license_sent'] ) && $_GET['license_sent'] === '2';
$et_license_form_error = isset( $_GET['license_sent'] ) && $_GET['license_sent'] === '0';
?>
<section class="et-license__contact" id="et-license-contact" aria-labelledby="et-license-contact-title">
    <div class="et-license__section-inner center">
        <div class="et-license__contact-panel">
            <header class="et-license__contact-header">
                <h2 class="et-license__contact-title" id="et-license-contact-title">
                    Interested in Becoming a Licensee?
                </h2>
                <p class="et-license__contact-subtitle">
                    Fill out the form below and our licensing team will contact you.
                </p>
            </header>

            <?php if ( $et_license_form_sent ) : ?>
                <div class="et-license__form-notice et-license__form-notice--success" role="status">
                    Thank you! Your inquiry has been submitted. Our licensing team will be in touch soon.
                </div>
            <?php elseif ( $et_license_form_saved ) : ?>
                <div class="et-license__form-notice et-license__form-notice--success" role="status">
                    Thank you! Your inquiry has been received and saved. Our team will review it shortly.
                </div>
            <?php elseif ( $et_license_form_error ) : ?>
                <div class="et-license__form-notice et-license__form-notice--error" role="alert">
                    Please fill in all required fields with a valid email address.
                </div>
            <?php endif; ?>

            <form
                class="et-license__form"
                method="post"
                action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>"
                novalidate
            >
                <input type="hidden" name="action" value="et_license_inquiry" />
                <?php wp_nonce_field( 'et_license_inquiry', 'et_license_nonce' ); ?>

                <div class="et-license__form-grid">
                    <div class="et-license__form-field">
                        <label class="et-license__form-label" for="et-lic-company">Company Name <span class="et-license__required">*</span></label>
                        <input
                            type="text"
                            id="et-lic-company"
                            name="company_name"
                            class="et-license__form-input"
                            placeholder="Company Name"
                            required
                        />
                    </div>

                    <div class="et-license__form-field">
                        <label class="et-license__form-label" for="et-lic-contact">Contact Name <span class="et-license__required">*</span></label>
                        <input
                            type="text"
                            id="et-lic-contact"
                            name="contact_name"
                            class="et-license__form-input"
                            placeholder="Contact Name"
                            required
                        />
                    </div>

                    <div class="et-license__form-field">
                        <label class="et-license__form-label" for="et-lic-email">Email <span class="et-license__required">*</span></label>
                        <input
                            type="email"
                            id="et-lic-email"
                            name="email"
                            class="et-license__form-input"
                            placeholder="Email"
                            required
                        />
                    </div>

                    <div class="et-license__form-field">
                        <label class="et-license__form-label" for="et-lic-phone">Phone Number</label>
                        <input
                            type="tel"
                            id="et-lic-phone"
                            name="phone"
                            class="et-license__form-input"
                            placeholder="Phone Number"
                        />
                    </div>

                    <div class="et-license__form-field">
                        <label class="et-license__form-label" for="et-lic-country">Country <span class="et-license__required">*</span></label>
                        <select id="et-lic-country" name="country" class="et-license__form-input et-license__form-select" required>
                            <option value="">Select Country</option>
                            <?php foreach ( $et_license_country_options as $country ) : ?>
                                <option value="<?php echo esc_attr( $country ); ?>"><?php echo esc_html( $country ); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="et-license__form-field">
                        <label class="et-license__form-label" for="et-lic-website">Website</label>
                        <input
                            type="url"
                            id="et-lic-website"
                            name="website"
                            class="et-license__form-input"
                            placeholder="Website"
                        />
                    </div>

                    <div class="et-license__form-field">
                        <label class="et-license__form-label" for="et-lic-category">Product Category <span class="et-license__required">*</span></label>
                        <select id="et-lic-category" name="product_category" class="et-license__form-input et-license__form-select" required>
                            <option value="">Select Category</option>
                            <?php foreach ( $et_license_categories_options as $category ) : ?>
                                <option value="<?php echo esc_attr( $category ); ?>"><?php echo esc_html( $category ); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="et-license__form-field">
                        <label class="et-license__form-label" for="et-lic-territory">Territory / Market <span class="et-license__required">*</span></label>
                        <select id="et-lic-territory" name="territory" class="et-license__form-input et-license__form-select" required>
                            <option value="">Select Territory</option>
                            <?php foreach ( $et_license_territory_options as $territory ) : ?>
                                <option value="<?php echo esc_attr( $territory ); ?>"><?php echo esc_html( $territory ); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="et-license__form-field et-license__form-field--full">
                    <label class="et-license__form-label" for="et-lic-message">Your Message</label>
                    <textarea
                        id="et-lic-message"
                        name="message"
                        class="et-license__form-input et-license__form-textarea"
                        rows="5"
                        placeholder="Tell us about your company and licensing interest..."
                    ></textarea>
                </div>

                <div class="et-license__form-actions">
                    <button type="submit" class="et-license__form-submit">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/>
                        </svg>
                        Submit Inquiry
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
