<?php
function food_critic_blogs_header_settings( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';

	/*=========================================
	Food Critic Blogs Site Identity
	=========================================*/
	$wp_customize->add_section(
        'title_tagline',
        array(
        	'priority'      => 1,
            'title' 		=> __('Site Identity','food-critic-blogs'),
			'panel'  		=> 'food_critic_blogs_frontpage_sections',
		)
    );

    // Site Title Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'food_critic_blogs_site_title_setting' , 
			array(
			'default' => '0',
			'sanitize_callback' => 'food_critic_blogs_sanitize_checkbox',
			'capability' => 'edit_theme_options',
		) 
	);
	
	$wp_customize->add_control(
	'food_critic_blogs_site_title_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Site Title', 'food-critic-blogs' ),
			'section'     => 'title_tagline',
			'settings'    => 'food_critic_blogs_site_title_setting',
			'type'        => 'checkbox'
		) 
	);

	// Tagline Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'food_critic_blogs_tagline_setting' , 
			array(
			'default' => '',
			'sanitize_callback' => 'food_critic_blogs_sanitize_checkbox',
			'capability' => 'edit_theme_options',
		) 
	);
	
	$wp_customize->add_control(
	'food_critic_blogs_tagline_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Tagline', 'food-critic-blogs' ),
			'section'     => 'title_tagline',
			'settings'    => 'food_critic_blogs_tagline_setting',
			'type'        => 'checkbox'
		) 
	);

	// Add the setting for logo width
	$wp_customize->add_setting(
		'food_critic_blogs_logo_width',
		array(
			'default'           => '100',
			'sanitize_callback' => 'food_critic_blogs_sanitize_logo_width',
			'priority'          => 2,
		)
	);

	// Add control for logo width
	$wp_customize->add_control( 
		'food_critic_blogs_logo_width',
		array(
			'label'     => __('Logo Width', 'food-critic-blogs'),
			'section'   => 'title_tagline',
			'type'      => 'number',
			'input_attrs' => array(
				'min'   => 1,
				'max'   => 150,
				'step'  => 1,
			),
			'transport' => $selective_refresh,
		)  
	);

	$wp_customize->add_setting( 'food_critic_blogs_upgrade_page_settings_583',
	array(
		'sanitize_callback' => 'sanitize_text_field'
	)
	);
	$wp_customize->add_control( new Food_Critic_Blogs_Control_Upgrade(
		$wp_customize, 'food_critic_blogs_upgrade_page_settings_583',
			array(
				'priority'      => 200,
				'section'       => 'title_tagline',
				'settings'      => 'food_critic_blogs_upgrade_page_settings_583',
				'label'         => __( 'Food Critic Blogs Pro comes with additional features.', 'food-critic-blogs' ),
				'choices'       => array( __( '12+ Sections', 'food-critic-blogs' ), __( 'One Click Demo Importer', 'food-critic-blogs' ), __( 'Section Reordering Facility', 'food-critic-blogs' ),__( 'Advance Typography', 'food-critic-blogs' ),__( 'Easy Customization', 'food-critic-blogs' ),__( '24x7 Support', 'food-critic-blogs' ), )
			)
		)
	);

	$wp_customize->add_setting( 'food_critic_blogs_upgrade_page_settings_583',
	array(
		'sanitize_callback' => 'sanitize_text_field'
	)
	);
	$wp_customize->add_control( new Food_Critic_Blogs_Control_Upgrade(
		$wp_customize, 'food_critic_blogs_upgrade_page_settings_583',
			array(
				'priority'      => 200,
				'section'       => 'title_tagline',
				'settings'      => 'food_critic_blogs_upgrade_page_settings_583',
				'label'         => __( 'Food Critic Blogs Pro comes with additional features.', 'food-critic-blogs' ),
				'choices'       => array( __( '12+ Sections', 'food-critic-blogs' ), __( 'One Click Demo Importer', 'food-critic-blogs' ), __( 'Section Reordering Facility', 'food-critic-blogs' ),__( 'Advance Typography', 'food-critic-blogs' ),__( 'Easy Customization', 'food-critic-blogs' ),__( '24x7 Support', 'food-critic-blogs' ), )
			)
		)
	);
	
    /*=========================================
	top header
	=========================================*/
	$wp_customize->add_section(
        'food_critic_blogs_topbar',
        array(
        	'priority'      => 3,
            'title' 		=> __('Header Information','food-critic-blogs'),
			'panel'  		=> 'food_critic_blogs_frontpage_sections',
		)
    );

    $wp_customize->add_setting( 
		'food_critic_blogs_header_sidebar' , 
			array(
			'default' => true,
			'sanitize_callback' => 'food_critic_blogs_sanitize_checkbox',
			'capability' => 'edit_theme_options',
		) 
	);
	$wp_customize->add_control(
	'food_critic_blogs_header_sidebar', 
		array(
			'label'	      => esc_html__( 'Show / Hide Header Sidebar Toggle', 'food-critic-blogs' ),
			'section'     => 'food_critic_blogs_topbar',
			'settings'    => 'food_critic_blogs_header_sidebar',
			'type'        => 'checkbox'
		) 
	);

	$wp_customize->add_setting('food_critic_blogs_facebook_url',array(
		'default'=> '#',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('food_critic_blogs_facebook_url',array(
		'label'	=> __('Facebook Link','food-critic-blogs'),
		'section'=> 'food_critic_blogs_topbar',
		'type'=> 'url'
	));

	$wp_customize->add_setting('food_critic_blogs_twitter_url',array(
		'default'=> '#',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('food_critic_blogs_twitter_url',array(
		'label'	=> __('Twitter Link','food-critic-blogs'),
		'section'=> 'food_critic_blogs_topbar',
		'type'=> 'url'
	));
	
	$wp_customize->add_setting('food_critic_blogs_instagram_url',array(
		'default'=> '#',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('food_critic_blogs_instagram_url',array(
		'label'	=> __('Instagram Link','food-critic-blogs'),
		'section'=> 'food_critic_blogs_topbar',
		'type'=> 'url'
	));

	$wp_customize->add_setting('food_critic_blogs_youtube_url',array(
		'default'=> '#',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('food_critic_blogs_youtube_url',array(
		'label'	=> __('Youtube Link','food-critic-blogs'),
		'section'=> 'food_critic_blogs_topbar',
		'type'=> 'url'
	));

	$wp_customize->add_setting( 'food_critic_blogs_upgrade_page_settings_5832',
	array(
		'sanitize_callback' => 'sanitize_text_field'
	)
	);
	$wp_customize->add_control( new Food_Critic_Blogs_Control_Upgrade(
		$wp_customize, 'food_critic_blogs_upgrade_page_settings_5832',
			array(
				'priority'      => 200,
				'section'       => 'food_critic_blogs_topbar',
				'settings'      => 'food_critic_blogs_upgrade_page_settings_5832',
				'label'         => __( 'Food Critic Blogs Pro comes with additional features.', 'food-critic-blogs' ),
				'choices'       => array( __( '12+ Sections', 'food-critic-blogs' ), __( 'One Click Demo Importer', 'food-critic-blogs' ), __( 'Section Reordering Facility', 'food-critic-blogs' ),__( 'Advance Typography', 'food-critic-blogs' ),__( 'Easy Customization', 'food-critic-blogs' ),__( '24x7 Support', 'food-critic-blogs' ), )
			)
		)
	);
 
	$wp_customize->register_panel_type( 'Food_Critic_Blogs_WP_Customize_Panel' );
	$wp_customize->register_section_type( 'food_critic_blogs_WP_Customize_Section' );

}
add_action( 'customize_register', 'food_critic_blogs_header_settings' );

if ( class_exists( 'WP_Customize_Panel' ) ) {
  	class Food_Critic_Blogs_WP_Customize_Panel extends WP_Customize_Panel {
	   public $panel;
	   public $type = 'food_critic_blogs_panel';
	   public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;
	      return $array;
    	}
  	}
}

if ( class_exists( 'WP_Customize_Section' ) ) {
  	class food_critic_blogs_WP_Customize_Section extends WP_Customize_Section {
	   public $section;
	   public $type = 'food_critic_blogs_section';
	   public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;

	      if ( $this->panel ) {
	        $array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
	      } else {
	        $array['customizeAction'] = 'Customizing';
	      }
	      return $array;
    	}
  	}
}