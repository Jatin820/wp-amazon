<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;


function wens_styllusion_scripts(){
   // enqueue parent style
	wp_enqueue_style('wens-styllusion-parent-style', get_theme_file_uri() . '/style.css');
    
}
add_action('wp_enqueue_scripts', 'wens_styllusion_scripts');


function wens_styllusion_register_block_pattern_categories(){
    register_block_pattern_category(
        'wens-styllusion',
        array( 'label' => __( 'WENS Styllusion', 'wens-styllusion' ) )
    );

}
add_action('init', 'wens_styllusion_register_block_pattern_categories');
