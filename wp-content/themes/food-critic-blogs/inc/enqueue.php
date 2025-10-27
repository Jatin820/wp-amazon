<?php

// In your theme's functions.php or equivalent
add_action('customize_controls_enqueue_scripts', function() {
    $version = wp_get_theme()->get('Version');
    
    // Define parameters
    $customizer_params = array(
        'some_key' => 'some_value', // Add your parameters here
    );
    
    wp_enqueue_script(
        'food-critic-blogs-customize-section-button',
        get_theme_file_uri('assets/js/customize-controls.js'),
        ['customize-controls'],
        $version,
        true
    );

    wp_enqueue_style(
        'food-critic-blogs-customize-section-button',
        get_theme_file_uri('assets/css/customize-controls.css'),
        ['customize-controls'],
        $version
    );

    wp_localize_script(
        'food-critic-blogs-customize-section-button',
        'food_critic_blogs_customizer_params',
        $customizer_params
    );
});


 /**
 * Enqueue scripts and styles.
 */
function food_critic_blogs_scripts() {
	// Styles	 

	wp_enqueue_style('bootstrap-min',get_template_directory_uri().'/assets/css/bootstrap.min.css');

	// owl
	wp_enqueue_style( 'owl-carousel-css', get_theme_file_uri( '/assets/css/owl.carousel.css' ) );
		
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/assets/css/fontawesome-all.css' );
	
	wp_enqueue_style('food-critic-blogs-editor-style',get_template_directory_uri().'/assets/css/editor-style.css');

	wp_enqueue_style('food-critic-blogs-main', get_template_directory_uri() . '/assets/css/main.css');

	wp_enqueue_style('food-critic-blogs-woo', get_template_directory_uri() . '/assets/css/woo.css');
	
	wp_enqueue_style( 'food-critic-blogs-style', get_stylesheet_uri() );


	wp_enqueue_style('food-critic-blogs-main', get_stylesheet_uri(), array() );
		wp_style_add_data('food-critic-blogs-main', 'rtl', 'replace');
	
	// Scripts

	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array('jquery'), false, true);

	wp_enqueue_script('food-critic-blogs-theme-js', get_template_directory_uri() . '/assets/js/theme.js', array('jquery'), false, true);

	wp_enqueue_script( 'owl-carousel-js', get_theme_file_uri( '/assets/js/owl.carousel.js' ), array( 'jquery' ), true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'food_critic_blogs_scripts' );

// Function to enqueue custom CSS
function food_critic_blogs_enqueue_custom_css() {
    // Define a unique handle for your inline stylesheet
    $handle = 'food-critic-blogs-style';
    
    // Get the generated custom CSS
    $food_critic_blogs_custom_css = "";

    $food_critic_blogs_blog_layouts = get_theme_mod('food_critic_blogs_blog_layout_option_setting', 'Default');
    if ($food_critic_blogs_blog_layouts == 'Default') {
        $food_critic_blogs_custom_css .= '.blog-item{';
        $food_critic_blogs_custom_css .= 'text-align:center;';
        $food_critic_blogs_custom_css .= '}';
    } elseif ($food_critic_blogs_blog_layouts == 'Left') {
        $food_critic_blogs_custom_css .= '.blog-item{';
        $food_critic_blogs_custom_css .= 'text-align:Left;';
        $food_critic_blogs_custom_css .= '}';
    } elseif ($food_critic_blogs_blog_layouts == 'Right') {
        $food_critic_blogs_custom_css .= '.blog-item{';
        $food_critic_blogs_custom_css .= 'text-align:Right;';
        $food_critic_blogs_custom_css .= '}';
    }
    // Enqueue the inline stylesheet
    wp_add_inline_style($handle, $food_critic_blogs_custom_css);

    // Get the generated custom CSS
    $food_critic_blogs_custom_css = "";

    $food_critic_blogs_slider_arrows = get_theme_mod('food_critic_blogs_slider_arrows',true);
    if($food_critic_blogs_slider_arrows == false){
    $food_critic_blogs_custom_css .='.page-template-template-frontpage .headerbox{';
        $food_critic_blogs_custom_css .='position:static; border-bottom:1px solid #ccc';
    $food_critic_blogs_custom_css .='}';
    }

    // Enqueue the inline stylesheet
    wp_add_inline_style($handle, $food_critic_blogs_custom_css);

    // Add inline style for Scroll to Top
    $food_critic_blogs_scroll_top_bg_color = get_theme_mod('food_critic_blogs_scroll_top_bg_color', '#4FD675');
    $food_critic_blogs_scroll_top_color = get_theme_mod('food_critic_blogs_scroll_top_color', '#fff');
    $food_critic_blogs_scroll_custom_css = "
        #scrolltop {
            background-color: {$food_critic_blogs_scroll_top_bg_color};
        }
        #scrolltop span {
            color: {$food_critic_blogs_scroll_top_color};
        }
    ";
    wp_add_inline_style('food-critic-blogs-style', $food_critic_blogs_scroll_custom_css);

    // Add inline style for Preloader
    $food_critic_blogs_preloader_bg_color = get_theme_mod('food_critic_blogs_preloader_bg_color', '#ffffff');
    $food_critic_blogs_preloader_color = get_theme_mod('food_critic_blogs_preloader_color', '#4FD675');
    $food_critic_blogs_preloader_custom_css = "
        .loading {
            background-color: {$food_critic_blogs_preloader_bg_color};
        }
        .loader {
            border-color: {$food_critic_blogs_preloader_color};
            color: {$food_critic_blogs_preloader_color};
            text-shadow: 0 0 10px {$food_critic_blogs_preloader_color};
        }
        .loader::before {
            border-top-color: {$food_critic_blogs_preloader_color};
            border-right-color: {$food_critic_blogs_preloader_color};
        }
        .loader span::before {
            background: {$food_critic_blogs_preloader_color};
            box-shadow: 0 0 10px {$food_critic_blogs_preloader_color};
        }
    ";
    wp_add_inline_style('food-critic-blogs-style', $food_critic_blogs_preloader_custom_css);
}

// Hook the function to the 'wp_enqueue_scripts' action
add_action('wp_enqueue_scripts', 'food_critic_blogs_enqueue_custom_css');


//Admin Enqueue for Admin
function food_critic_blogs_admin_enqueue_scripts(){
    wp_enqueue_style('food-critic-blogs-admin-style', esc_url( get_template_directory_uri() ) . '/inc/aboutthemes/admin.css');
    wp_enqueue_script('dismiss-notice-script', get_stylesheet_directory_uri() . '/inc/aboutthemes/theme-admin-notice.js', array('jquery'), null, true);
}
add_action( 'admin_enqueue_scripts', 'food_critic_blogs_admin_enqueue_scripts' );