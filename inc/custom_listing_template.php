<?php

add_filter( 'wpsl_listing_template', 'custom_listing_template' );

function custom_listing_template() {

	global $wpsl, $wpsl_settings;
	$listing_template = '<li data-store-id="<%= id %>" class="item__description wpsl-store-location">' . "\r\n";
	if ( !$wpsl_settings['hide_distance'] ) {
		$listing_template .=  ' <div class="item__distance"><%= distance %> ' . esc_html( $wpsl_settings['distance_unit'] ).'</div>';
	}
	$listing_template .= '<div  class="item__title"><%= store %></div>' ;

	$listing_template .= '<div><%= address %><br>'  ;
	$listing_template .= '<% if ( address2 ) { %>';
	$listing_template .= '<%= address2 %><br>';
	$listing_template .=  '<% } %>';
	$listing_template .=  wpsl_address_format_placeholders();

	if ( !$wpsl_settings['hide_country'] ) {
		$listing_template .= ' <%= country %>';
	}
	$listing_template .=  '<% if ( zip ) { %>';
	$listing_template .=  '<div><%= zip %></div>';
	$listing_template .=  '<% } %>' ;
	$listing_template .=  '</div>';

	$listing_template .=  '<% if ( phone ) { %>';
	$listing_template .=  '<div class="phone"><%= phone %></div>';
	$listing_template .=  '<% } %>' ;
	$listing_template .=  '<% if ( url ) { %>';
	$listing_template .=  '<div><a href="<%= url %>" target="_blank"><%= url %></a></div>';
	$listing_template .=  '<% } %>' ;

	// Show the phone, fax or email data if they exist.
	if ( $wpsl_settings['show_contact_details'] ) {

		$listing_template .= "\t\t\t" . '<p class="wpsl-contact-details">' . "\r\n";
		$listing_template .= "\t\t\t" . '<% if ( phone ) { %>' . "\r\n";
		$listing_template .= "\t\t\t" . '<span><strong>' . esc_html( $wpsl->i18n->get_translation( 'phone_label', __( 'Phone', 'wpsl' ) ) ) . '</strong>: <%= formatPhoneNumber( phone ) %></span>' . "\r\n";
		$listing_template .= "\t\t\t" . '<% } %>' . "\r\n";
		$listing_template .= "\t\t\t" . '<% if ( fax ) { %>' . "\r\n";
		$listing_template .= "\t\t\t" . '<span><strong>' . esc_html( $wpsl->i18n->get_translation( 'fax_label', __( 'Fax', 'wpsl' ) ) ) . '</strong>: <%= fax %></span>' . "\r\n";
		$listing_template .= "\t\t\t" . '<% } %>' . "\r\n";
		$listing_template .= "\t\t\t" . '<% if ( email ) { %>' . "\r\n";
		$listing_template .= "\t\t\t" . '<span><strong>' . esc_html( $wpsl->i18n->get_translation( 'email_label', __( 'Email', 'wpsl' ) ) ) . '</strong>: <%= email %></span>' . "\r\n";
		$listing_template .= "\t\t\t" . '<% } %>' . "\r\n";
		$listing_template .= "\t\t\t" . '</p>' . "\r\n";
	}

	$listing_template .= '<%= createDirectionUrl() %>';

	$listing_template .= '</li>';
	$listing_template .= '<hr>';
	$listing_template .= '<br>';




	return $listing_template;
}