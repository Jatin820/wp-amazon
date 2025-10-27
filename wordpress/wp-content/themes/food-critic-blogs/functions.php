<?php
if ( ! function_exists( 'food_critic_blogs_enqueue_files' ) ) :
function food_critic_blogs_enqueue_files() {

// Root path/URI.
define( 'FOOD_CRICTIC_BLOGS_PARENT_DIR', get_template_directory() );
define( 'FOOD_CRICTIC_BLOGS_PARENT_URI', get_template_directory_uri() );

// Root path/URI.
define( 'FOOD_CRICTIC_BLOGS_PARENT_INC_DIR', FOOD_CRICTIC_BLOGS_PARENT_DIR . '/inc');
define( 'FOOD_CRICTIC_BLOGS_PARENT_INC_URI', FOOD_CRICTIC_BLOGS_PARENT_URI . '/inc');

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-slider' );

	/*
	 * Let WordPress manage the document title.
	 */
	add_theme_support( 'title-tag' );

	add_theme_support( 'responsive-embeds' );
	
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );
	
	//Add selective refresh for sidebar widget
	add_theme_support( 'customize-selective-refresh-widgets' );
	
	/*
	 * Make theme available for translation.
	 */
	load_theme_textdomain( 'food-critic-blogs', get_stylesheet_directory() . '/languages' );
		
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary'  => esc_html__( 'Primary Menu', 'food-critic-blogs' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
		
	add_theme_support('custom-logo');

	/*
	 * WooCommerce Plugin Support
	 */
	add_theme_support( 'woocommerce' );
	
	// Gutenberg wide images.
	add_theme_support( 'align-wide' );
	
	
	//Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'food_critic_blogs_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	add_theme_support( 'custom-header', apply_filters( 'food_critic_blogs_custom_header_args', array(
		'default-image'          => get_template_directory_uri() . '/assets/images/slider1.png',
		'default-text-color'     => 'ffffff',
		'width'                  => 2000, 
		'height'                 => 200,
		'flex-width'    		 => true,
		'flex-height'    		 => true,
        'uploads'            => true,
	) ) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	*/
	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'assets/css/editor-style.css', food_critic_blogs_google_font_url() ) );

	//  --------------------------------------------- ENQUEUE ----------------------------------------------------- //
		
	/**
	 * Implement the Custom Header feature.
	 */
	require_once get_template_directory() . '/inc/custom-header.php';

	/**
	 * Load Theme About Page
	 */
	require get_parent_theme_file_path( '/inc/aboutthemes/about-theme.php' );

	/**
	 * Demo Import
	 */
	require get_parent_theme_file_path( '/demo-import/demo-import-settings.php' );

}
endif;
add_action( 'after_setup_theme', 'food_critic_blogs_enqueue_files' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function food_critic_blogs_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'food_critic_blogs_content_width', 1170 );
}
add_action( 'after_setup_theme', 'food_critic_blogs_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

function food_critic_blogs_widgets_init() {
	
	register_sidebar( array(
		'name' => __( 'Sidebar Widget Area', 'food-critic-blogs' ),
		'id' => 'food-critic-blogs-sidebar-primary',
		'description' => __( 'The Primary Widget Area', 'food-critic-blogs' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4><div class="title"><span class="shap"></span></div>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Widget Area', 'food-critic-blogs' ),
		'id' => 'food-critic-blogs-footer-widget-area',
		'description' => __( 'The Footer Widget Area', 'food-critic-blogs' ),
		'before_widget' => '<div class="footer-widget col-lg-3 col-sm-6 wow fadeIn" data-wow-delay="0.2s"><aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside></div>',
		'before_title' => '<h5 class="widget-title w-title">',
		'after_title' => '</h5><span class="shap"></span>',
	) );
}
add_action( 'widgets_init', 'food_critic_blogs_widgets_init' );


// Load styles and scripts
require_once get_template_directory() . '/inc/enqueue.php';

// Bootstrap Nav Walker
require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

// Template Tags
require_once get_template_directory() . '/inc/template-tags.php';

// Extras
require_once get_template_directory() . '/inc/extras.php';


// Fonts
require_once get_template_directory() . '/inc/fonts.php';

// Webfont Loader
require_once get_template_directory() . '/wptt-webfont-loader.php';


// Customizer
require_once get_template_directory() . '/inc/customizer.php';


add_filter( 'nav_menu_link_attributes', 'food_critic_blogs_dropdown_data_attribute', 20, 3 );
/**
 * Use namespaced data attribute for Bootstrap's dropdown toggles.
 *
 * @param array    $atts HTML attributes applied to the item's `<a>` element.
 * @param WP_Post  $item The current menu item.
 * @param stdClass $args An object of wp_nav_menu() arguments.
 * @return array
 */
function food_critic_blogs_dropdown_data_attribute( $atts, $item, $args ) {
    if ( is_a( $args->walker, 'WP_Bootstrap_Navwalker' ) ) {
        if ( array_key_exists( 'data-toggle', $atts ) ) {
            unset( $atts['data-toggle'] );
            $atts['data-bs-toggle'] = 'dropdown';
        }
    }
    return $atts;
}

function food_critic_blogs_remove_theme_customizer_setting($wp_customize) {
    // Remove the setting
    $wp_customize->remove_setting('display_header_text');
    // Remove the control
    $wp_customize->remove_control('display_header_text');
}
add_action('customize_register', 'food_critic_blogs_remove_theme_customizer_setting', 20); 
// Use a priority greater than the one used for adding the setting


// Set the number of products per row to 3 on the shop page
add_filter('loop_shop_columns', 'food_critic_blogs_custom_shop_loop_columns');

if (!function_exists('food_critic_blogs_custom_shop_loop_columns')) {
    function food_critic_blogs_custom_shop_loop_columns() {
        // Retrieve the number of columns from theme customizer setting (default: 3)
        $food_critic_blogs_columns = get_theme_mod('food_critic_blogs_custom_shop_per_columns', 3);
        return $food_critic_blogs_columns;
    }
}

function food_critic_blogs_custom_controls() {
	
	load_template( trailingslashit( get_template_directory() ) . '/inc/customizer/customizer-custom-controls.php' );
}
add_action( 'customize_register', 'food_critic_blogs_custom_controls' );

// Set the number of products per page on the shop page
add_filter('loop_shop_per_page', 'food_critic_blogs_custom_shop_per_page', 20);

if (!function_exists('food_critic_blogs_custom_shop_per_page')) {
    function food_critic_blogs_custom_shop_per_page($food_critic_blogs_products_per_page) {
        // Retrieve the number of products per page from theme customizer setting (default: 9)
        $food_critic_blogs_products_per_page = get_theme_mod('food_critic_blogs_custom_shop_product_per_page', 9);
        return $food_critic_blogs_products_per_page;
    }
}

/**
 * Generate Google Fonts URL.
 */
function food_critic_blogs_google_font_url() {
    // Corrected Google Fonts URL format
    $google_fonts_url = 'https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap';
    return $google_fonts_url;
}

/**
 * Enqueue theme styles and scripts.
 */
function food_critic_blogs_scripts_styles() {

	$food_critic_blogs_headings_font = esc_html(get_theme_mod('food_critic_blogs_headings_text'));
	$food_critic_blogs_body_font = esc_html(get_theme_mod('food_critic_blogs_body_text'));

	if( $food_critic_blogs_headings_font ) {
		wp_enqueue_style( 'food-critic-blogs-headings-fonts', '//fonts.googleapis.com/css?family='. $food_critic_blogs_headings_font );
	} else {
		// Enqueue Google Fonts
		wp_enqueue_style('food-critic-blogs-google-fonts', food_critic_blogs_google_font_url(), array(), null);
	}
	if( $food_critic_blogs_body_font ) {
		wp_enqueue_style( 'food-critic-blogs-body-fonts', '//fonts.googleapis.com/css?family='. $food_critic_blogs_body_font );
	} else {
		// Enqueue main stylesheet
		wp_enqueue_style('food-critic-blogs-main-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));
	}

}
add_action('wp_enqueue_scripts', 'food_critic_blogs_scripts_styles');

/**
 * Enqueue theme copyright alignment style.
 */
function food_critic_blogs_copyright_alignment_option() {
    // Get the alignment setting from the theme customizer.
    $food_critic_blogs_copyright_alignment = get_theme_mod('food_critic_blogs_copyright_alignment', 'center');

    // Start building the CSS string for the alignment.
    $food_critic_blogs_copyright_alignment_css = '
        .copyright-text, .footer-copyright, .footer-copyright a, p.copyright-text {
            text-align: ' . esc_attr($food_critic_blogs_copyright_alignment) . ';
        }
    ';

    // Add the inline style to the theme's main stylesheet.
    wp_add_inline_style('food-critic-blogs-style', $food_critic_blogs_copyright_alignment_css);
}

add_action('wp_enqueue_scripts', 'food_critic_blogs_copyright_alignment_option');


function Food_Critic_Blogs_Customize_css() {
    $food_critic_blogs_dynamic_color = get_theme_mod( 'food_critic_blogs_dynamic_color_one', '#4FD675' );
    $food_critic_blogs_custom_css = ":root { --color-primary1: {$food_critic_blogs_dynamic_color}; }";
    wp_add_inline_style( 'food-critic-blogs-style', $food_critic_blogs_custom_css );
}
add_action( 'wp_enqueue_scripts', 'Food_Critic_Blogs_Customize_css' );

function creative_blog_activation_notice() {
    // Check if the notice has already been dismissed
    if (get_option('creative_blog_notice_dismissed')) {
        return;
    }

    // Avoid showing the notice on the demo import wizard page
    if (isset($_GET['page']) && $_GET['page'] === 'foodcriticblogs-wizard') {
        return;
    }
    ?>
    <div class="updated notice notice-get-started-class is-dismissible" data-notice="get_started">
        <div class="food-critic-blogs-getting-started-notice clearfix">
            <div class="food-critic-blogs-theme-notice-content">
                <h2 class="food-critic-blogs-notice-h2">
                    <?php
                    printf(
                        /* translators: 1: welcome page link starting html tag, 2: welcome page link ending html tag. */
                        esc_html__('Welcome! Thank you for choosing %1$s!', 'food-critic-blogs'), '<strong>' . wp_get_theme()->get('Name') . '</strong>'
                    );
                    ?>
                </h2>
                <a class="food-critic-blogs-btn-get-started button button-primary button-hero food-critic-blogs-button-padding" 
                    href="<?php echo esc_url(admin_url('themes.php?page=foodcriticblogs-wizard')); ?>" 
                    id="food-critic-blogs-import-button">
                    <?php esc_html_e('One Click Demo Import', 'food-critic-blogs') ?>
                </a>
            </div>
        </div>
    </div>
    <?php
}

add_action('admin_notices', 'creative_blog_activation_notice');

// Add Ajax action to handle dismiss
add_action('wp_ajax_creative_blog_dismiss_notice', 'creative_blog_dismiss_notice');

// Reset the dismissed status when the theme is activated
function creative_blog_notice_status() {
    delete_option('creative_blog_notice_dismissed');
}
add_action('after_switch_theme', 'creative_blog_notice_status');

function creative_blog_dismiss_notice() {
    // Update the option to mark the notice as dismissed
    update_option('creative_blog_notice_dismissed', true);

    // Return a JSON response to indicate the success of the action
    wp_send_json_success();
}