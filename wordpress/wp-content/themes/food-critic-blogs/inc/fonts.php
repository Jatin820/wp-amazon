<?php

/*
 * Props to the BLDR Theme: https://wordpress.org/themes/bldr/
 * */

function food_critic_blogs_custom_styles($food_critic_blogs_custom) {

	//Fonts

	$food_critic_blogs_headings_font = esc_html(get_theme_mod('food_critic_blogs_headings_text'));

	$food_critic_blogs_body_font = esc_html(get_theme_mod('food_critic_blogs_body_text'));

	if ( $food_critic_blogs_headings_font ) {

		$food_critic_blogs_font_pieces = explode(":", $food_critic_blogs_headings_font);

		$food_critic_blogs_custom .= "h1, h2, h3, h4, h5, h6 { font-family: {$food_critic_blogs_font_pieces[0]}; }"."\n";

	}

	if ( $food_critic_blogs_body_font ) {

		$food_critic_blogs_font_pieces = explode(":", $food_critic_blogs_body_font);

		$food_critic_blogs_custom .= "body, button, input, select, textarea { font-family: {$food_critic_blogs_font_pieces[0]} !important; }"."\n";

	}

	//Output all the styles

	wp_add_inline_style( 'food-critic-blogs-style', $food_critic_blogs_custom );

}

add_action( 'wp_enqueue_scripts', 'food_critic_blogs_custom_styles' );


//Sanitizes Fonts
function food_critic_blogs_sanitize_fonts( $food_critic_blogs_input ) {
	$food_critic_blogs_valid = array(
		'' => 'Select',
		'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
		'Open Sans:400italic,700italic,400,700' => 'Open Sans',
		'Oswald:400,700' => 'Oswald',
		'Playfair Display:400,700,400italic' => 'Playfair Display',
		'Montserrat:400,700' => 'Montserrat',
		'Raleway:400,700' => 'Raleway',
		'Droid Sans:400,700' => 'Droid Sans',
		'Lato:400,700,400italic,700italic' => 'Lato',
		'Arvo:400,700,400italic,700italic' => 'Arvo',
		'Lora:400,700,400italic,700italic' => 'Lora',
		'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
		'Oxygen:400,300,700' => 'Oxygen',
		'PT Serif:400,700' => 'PT Serif',
		'PT Sans:400,700,400italic,700italic' => 'PT Sans',
		'PT Sans Narrow:400,700' => 'PT Sans Narrow',
		'Cabin:400,700,400italic' => 'Cabin',
		'Fjalla One:400' => 'Fjalla One',
		'Francois One:400' => 'Francois One',
		'Josefin Sans:400,300,600,700' => 'Josefin Sans',
		'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
		'Arimo:400,700,400italic,700italic' => 'Arimo',
		'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
		'Bitter:400,700,400italic' => 'Bitter',
		'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
		'Roboto:400,400italic,700,700italic' => 'Roboto',
		'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
		'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
		'Roboto Slab:400,700' => 'Roboto Slab',
		'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
		'Rokkitt:400' => 'Rokkitt',
		'Inter:400' => 'Inter',
		'Damion:400' => 'Damion',
		'Lobster:400' => 'Lobster',
		'Figtree:300,400,500,600,700,800,900,300italic,400italic,500italic,600italic,700italic,800italic,900italic' => 'Figtree',
	);

	if ( array_key_exists( $food_critic_blogs_input, $food_critic_blogs_valid ) ) {
		return $food_critic_blogs_input;
	} else {
		return '';
	}
}