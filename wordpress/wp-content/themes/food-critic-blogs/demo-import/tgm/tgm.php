<?php

	require get_template_directory() . '/demo-import/tgm/class-tgm-plugin-activation.php';
/**
 * Recommended plugins.
 */
function food_critic_blogs_register_recommended_plugins() {
	$plugins = array(
		
		array(
			'name'             => __( 'FAQly – Ultimate FAQ', 'food-critic-blogs' ),
			'slug'             => 'faqly-ultimate-faq',
			'required'         => false,
			'force_activation' => false,
		)

	);
	$config = array();
	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'food_critic_blogs_register_recommended_plugins' );