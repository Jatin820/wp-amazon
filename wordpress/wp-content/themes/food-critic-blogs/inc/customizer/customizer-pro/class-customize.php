<?php

if ( ! defined( 'FOOD_CRICTIC_BLOGS_PREMIUM' ) ) {
    define( 'FOOD_CRICTIC_BLOGS_PREMIUM', 'https://www.seothemesexpert.com/products/food-blogger-website-template' );
}

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Food_Critic_Blogs_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
        require_once get_template_directory() . '/inc/customizer/customizer-pro/section-pro.php';

        // Register custom section types.
		$manager->register_section_type( 'Food_Critic_Blogs_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Food_Critic_Blogs_Customize_Section_Pro(
				$manager,
				'food-critic-blogs',
				array(
					'title'      => __( 'UPGRADE TO PREMIUM', 'food-critic-blogs' ),
                    'pro_text' => esc_html__( 'Go Pro','food-critic-blogs' ),
                    'pro_url'  => esc_url( FOOD_CRICTIC_BLOGS_PREMIUM, 'food-critic-blogs'),
                    'priority' => 0
                )
			)
		);

	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {
        require_once get_template_directory() . '/inc/customizer/customizer-pro/section-pro.php';

        wp_enqueue_script( 'food-critic-blogs-customize-controls', trailingslashit( get_template_directory_uri() ) . 'inc/customizer/customizer-pro/customize-controls.js', array( 'customize-controls' ) );
		wp_enqueue_style( 'food-critic-blogs-customize-controls', trailingslashit( get_template_directory_uri() ) . 'inc/customizer/customizer-pro/customize-controls.css' );
	}
}
// Doing this customizer thang!
Food_Critic_Blogs_Customize::get_instance();