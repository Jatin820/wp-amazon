<?php
/**
 * Food Critic Blogs Theme Customizer.
 *
 * @package Food Critic Blogs
 */

 if ( ! class_exists( 'Food_Critic_Blogs_Customizer' ) ) {

	/**
	 * Customizer Loader
	 *
	 * @since 1.0.0
	 */
	class Food_Critic_Blogs_Customizer {

		/**
		 * Instance
		 *
		 * @access private
		 * @var object
		 */
		private static $food_critic_blogs_instance;

		/**
		 * Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$food_critic_blogs_instance ) ) {
				self::$food_critic_blogs_instance = new self;
			}
			return self::$food_critic_blogs_instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() {
			/**
			 * Customizer
			 */
			add_action( 'customize_preview_init',                  array( $this, 'Food_Critic_Blogs_Customizer_preview_js' ) );
			add_action( 'customize_controls_enqueue_scripts', 	   array( $this, 'Food_Critic_Blogs_Customizer_script' ) );
			add_action( 'customize_register',                      array( $this, 'Food_Critic_Blogs_Customizer_register' ) );
			add_action( 'after_setup_theme',                       array( $this, 'Food_Critic_Blogs_Customizer_settings' ) );
		}
		
		/**
		 * Add postMessage support for site title and description for the Theme Customizer.
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 */
		function Food_Critic_Blogs_Customizer_register( $wp_customize ) {
			
			$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
			$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
			$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
			$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
			$wp_customize->get_setting('custom_logo')->transport = 'refresh';			
			
			/**
			 * Helper files
			 */
			require FOOD_CRICTIC_BLOGS_PARENT_INC_DIR . '/customizer/sanitization.php';
		} 
		
		/**
		 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
		 */
		function Food_Critic_Blogs_Customizer_preview_js() {
			wp_enqueue_script( 'food-critic-blogs-customizer', FOOD_CRICTIC_BLOGS_PARENT_INC_URI . '/customizer/assets/js/customizer-preview.js', array( 'customize-preview' ), '20151215', true );
		}		
		
		function Food_Critic_Blogs_Customizer_script() {
			 wp_enqueue_script( 'food-critic-blogs-customizer-section', FOOD_CRICTIC_BLOGS_PARENT_INC_URI .'/customizer/assets/js/customizer-section.js', array("jquery"),'', true  );
		}

		// Include customizer customizer settings.
			
		function Food_Critic_Blogs_Customizer_settings() {
			require FOOD_CRICTIC_BLOGS_PARENT_INC_DIR . '/customizer/customizer-options/header.php';
			require FOOD_CRICTIC_BLOGS_PARENT_INC_DIR . '/customizer/customizer-options/frontpage.php';
			require FOOD_CRICTIC_BLOGS_PARENT_INC_DIR . '/customizer/customizer-options/footer.php';
			require FOOD_CRICTIC_BLOGS_PARENT_INC_DIR . '/customizer/customizer-options/post.php';
			require FOOD_CRICTIC_BLOGS_PARENT_INC_DIR . '/customizer/customizer-options/sidebar-option.php';
			require FOOD_CRICTIC_BLOGS_PARENT_INC_DIR . '/customizer/customizer-options/typography.php';
			require FOOD_CRICTIC_BLOGS_PARENT_INC_DIR . '/customizer/customizer-pro/customizer-upgrade-class.php';
			require FOOD_CRICTIC_BLOGS_PARENT_INC_DIR . '/customizer/customizer-options/general.php';
			require FOOD_CRICTIC_BLOGS_PARENT_INC_DIR . '/customizer/customizer-pro/class-customize.php';
		}

	}
}

/**
 *  Kicking this off by calling 'get_instance()' method
 */
Food_Critic_Blogs_Customizer::get_instance();