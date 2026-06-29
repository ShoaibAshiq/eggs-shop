<?php
global $wpsl_settings, $wpsl;
$output         = $this->get_custom_css();
$autoload_class = ( ! $wpsl_settings['autoload'] ) ? 'class="wpsl-not-loaded"' : '';
$output .= '<div class="center">';
$output .= '<div class="search__form row">
            <form autocomplete="off">
	          <div class="form__title col-xs-12">Enter Name or City or State or Phone or Zip Code:</div>
	          <div class="wpsl-input input_block col-xs-12 col-sm-8 col-md-4"><input  id="wpsl-search-input" type="text"></div>';

if ( $wpsl_settings['radius_dropdown'] || $wpsl_settings['results_dropdown'] ) {
	$output .= "\t\t\t" . '<div class="wpsl-select-wrap">' . "\r\n";

	if ( $wpsl_settings['radius_dropdown'] ) {
		$output .= "\t\t\t\t" . '<div id="wpsl-radius">' . "\r\n";
		$output .= "\t\t\t\t\t" . '<label for="wpsl-radius-dropdown">' . esc_html( $wpsl->i18n->get_translation( 'radius_label', __( 'Search radius', 'wpsl' ) ) ) . '</label>' . "\r\n";
		$output .= "\t\t\t\t\t" . '<select id="wpsl-radius-dropdown" class="wpsl-dropdown" name="wpsl-radius">' . "\r\n";
		$output .= "\t\t\t\t\t\t" . $this->get_dropdown_list( 'search_radius' ) . "\r\n";
		$output .= "\t\t\t\t\t" . '</select>' . "\r\n";
		$output .= "\t\t\t\t" . '</div>' . "\r\n";
	}

	if ( $wpsl_settings['results_dropdown'] ) {
		$output .= "\t\t\t\t" . '<div id="wpsl-results">' . "\r\n";
		$output .= "\t\t\t\t\t" . '<label for="wpsl-results-dropdown">' . esc_html( $wpsl->i18n->get_translation( 'results_label', __( 'Results', 'wpsl' ) ) ) . '</label>' . "\r\n";
		$output .= "\t\t\t\t\t" . '<select id="wpsl-results-dropdown" class="wpsl-dropdown" name="wpsl-results">' . "\r\n";
		$output .= "\t\t\t\t\t\t" . $this->get_dropdown_list( 'max_results' ) . "\r\n";
		$output .= "\t\t\t\t\t" . '</select>' . "\r\n";
		$output .= "\t\t\t\t" . '</div>' . "\r\n";
	}

	$output .= "\t\t\t" . '</div>' . "\r\n";
}

if ( $this->use_category_filter() ) {
	$output .= $this->create_category_filter();
}


$output .= ' <div class="button_block col-xs-6 col-sm-4 col-md-2"><button id="wpsl-search-btn" class="button">Submit</button></div></form></div>';


$output .= '<div class="search__results row">';

$output .= "\t" . '<div id="wpsl-gmap" class="wpsl-gmap-canvas"></div>' . "\r\n";
//$output .= "\t" . '<div class="results__number">3 locations near</div>' . "\r\n";
$output .= "\t" . '<div id="wpsl-result-list" class="list col-xs-12 col-md-4 col-md-pull-8">' . "\r\n";
$output .= "\t" . '<div>' . "\r\n";
$output .= "\t\t" . '<div id="wpsl-stores" class="item" ' . $autoload_class . '>' . "\r\n";

$output .= "\t\t\t" . '<ul></ul>' . "\r\n";
$output .= "\t\t" . '</div>' . "\r\n";
$output .= "\t\t" . '<div id="wpsl-direction-details">' . "\r\n";
$output .= "\t\t\t" . '<ul></ul>' . "\r\n";
$output .= "\t\t" . '</div>' . "\r\n";
$output .= "\t\t" . '</div>' . "\r\n";
$output .= "\t" . '</div>' . "\r\n";
$output .= '</div>' . "\r\n";

return $output;
