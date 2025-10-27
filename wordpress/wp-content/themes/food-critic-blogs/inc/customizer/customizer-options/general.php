<?php
function food_critic_blogs_general_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	$wp_customize->add_panel(
		'food_critic_blogs_general', array(
			'priority' => 2,
			'title' => esc_html__( 'General Options', 'food-critic-blogs' ),
		)
	);

	/*=========================================
	Breadcrumb  Section
	=========================================*/
	$wp_customize->add_section(
		'food_critic_blogs_breadcrumb_setting', array(
			'title' => esc_html__( 'Breadcrumb Options', 'food-critic-blogs' ),
			'priority' => 1,
			'panel' => 'food_critic_blogs_general',
		)
	);
	
	// Settings 
	$wp_customize->add_setting(
		'food_critic_blogs_breadcrumb_settings'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'food_critic_blogs_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'food_critic_blogs_breadcrumb_settings',
		array(
			'type' => 'hidden',
			'label' => __('Settings','food-critic-blogs'),
			'section' => 'food_critic_blogs_breadcrumb_setting',
		)
	);
	
	// Breadcrumb Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'food_critic_blogs_hs_breadcrumb' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'food_critic_blogs_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'food_critic_blogs_hs_breadcrumb', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'food-critic-blogs' ),
			'section'     => 'food_critic_blogs_breadcrumb_setting',
			'settings'    => 'food_critic_blogs_hs_breadcrumb',
			'type'        => 'checkbox'
		) 
	);


	$wp_customize->add_setting(
    	'food_critic_blogs_breadcrumb_seprator',
    	array(
			'default' => '/',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'food_critic_blogs_breadcrumb_seprator',
		array(
		    'label'   		=> __('Breadcrumb separator','food-critic-blogs'),
		    'section'		=> 'food_critic_blogs_breadcrumb_setting',
			'type' 			=> 'text',
		)  
	);

	$wp_customize->add_setting( 'food_critic_blogs_upgrade_page_settings_5',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new Food_Critic_Blogs_Control_Upgrade(
        $wp_customize, 'food_critic_blogs_upgrade_page_settings_5',
            array(
                'priority'      => 200,
                'section'       => 'food_critic_blogs_breadcrumb_setting',
                'settings'      => 'food_critic_blogs_upgrade_page_settings_5',
                'label'         => __( 'Food Critic Blogs Pro comes with additional features.', 'food-critic-blogs' ),
                'choices'       => array( __( '12+ Sections', 'food-critic-blogs' ), __( 'One Click Demo Importer', 'food-critic-blogs' ), __( 'Section Reordering Facility', 'food-critic-blogs' ),__( 'Advance Typography', 'food-critic-blogs' ),__( 'Easy Customization', 'food-critic-blogs' ),__( '24x7 Support', 'food-critic-blogs' ), )
            )
        )
    ); 

	/*=========================================
	Preloader Section
	=========================================*/
	$wp_customize->add_section(
		'food_critic_blogs_preloader_section_setting', array(
			'title' => esc_html__( 'Preloader Options', 'food-critic-blogs' ),
			'priority' => 3,
			'panel' => 'food_critic_blogs_general',
		)
	);

	// Preloader Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'food_critic_blogs_preloader_setting' , 
			array(
			'sanitize_callback' => 'food_critic_blogs_sanitize_checkbox',
			'capability' => 'edit_theme_options',
		) 
	);
	
	$wp_customize->add_control(
	'food_critic_blogs_preloader_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Preloader', 'food-critic-blogs' ),
			'section'     => 'food_critic_blogs_preloader_section_setting',
			'settings'    => 'food_critic_blogs_preloader_setting',
			'type'        => 'checkbox'
		) 
	);

	
	$wp_customize->add_setting(
    	'food_critic_blogs_preloader_text',
    	array(
			'default' => 'Loading',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'food_critic_blogs_preloader_text',
		array(
		    'label'   		=> __('Preloader Text','food-critic-blogs'),
		    'section'		=> 'food_critic_blogs_preloader_section_setting',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)
	);

	// Preloader Background Color Setting
    $wp_customize->add_setting(
        'food_critic_blogs_preloader_bg_color',
        array(
            'default' => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
            'capability' => 'edit_theme_options',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'food_critic_blogs_preloader_bg_color',
            array(
                'label' => esc_html__('Preloader Background Color', 'food-critic-blogs'),
                'section' => 'food_critic_blogs_preloader_section_setting', // Adjust section if needed
                'settings' => 'food_critic_blogs_preloader_bg_color',
            )
        )
    );

    // Preloader Color Setting
    $wp_customize->add_setting(
        'food_critic_blogs_preloader_color',
        array(
            'default' => '#4FD675',
            'sanitize_callback' => 'sanitize_hex_color',
            'capability' => 'edit_theme_options',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'food_critic_blogs_preloader_color',
            array(
                'label' => esc_html__('Preloader Color', 'food-critic-blogs'),
                'section' => 'food_critic_blogs_preloader_section_setting', // Adjust section if needed
                'settings' => 'food_critic_blogs_preloader_color',
            )
        )
    );

    $wp_customize->add_setting( 'food_critic_blogs_upgrade_page_settings_6',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new Food_Critic_Blogs_Control_Upgrade(
        $wp_customize, 'food_critic_blogs_upgrade_page_settings_6',
            array(
                'priority'      => 200,
                'section'       => 'food_critic_blogs_preloader_section_setting',
                'settings'      => 'food_critic_blogs_upgrade_page_settings_6',
                'label'         => __( 'Food Critic Blogs Pro comes with additional features.', 'food-critic-blogs' ),
                'choices'       => array( __( '12+ Sections', 'food-critic-blogs' ), __( 'One Click Demo Importer', 'food-critic-blogs' ), __( 'Section Reordering Facility', 'food-critic-blogs' ),__( 'Advance Typography', 'food-critic-blogs' ),__( 'Easy Customization', 'food-critic-blogs' ),__( '24x7 Support', 'food-critic-blogs' ), )
            )
        )
    ); 


	/*=========================================
	Scroll To Top Section
	=========================================*/
	$wp_customize->add_section(
		'food_critic_blogs_scroll_to_top_section_setting', array(
			'title' => esc_html__( 'Scroll To Top Options', 'food-critic-blogs' ),
			'priority' => 3,
			'panel' => 'food_critic_blogs_footer_section',
		)
	);

	// Scroll To Top Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'food_critic_blogs_scroll_top_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'food_critic_blogs_sanitize_checkbox',
			'capability' => 'edit_theme_options',
		) 
	);
	
	$wp_customize->add_control(
	'food_critic_blogs_scroll_top_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Scroll To Top', 'food-critic-blogs' ),
			'section'     => 'food_critic_blogs_scroll_to_top_section_setting',
			'settings'    => 'food_critic_blogs_scroll_top_setting',
			'type'        => 'checkbox'
		) 
	);

	// Scroll To Top Color Setting
	$wp_customize->add_setting(
		'food_critic_blogs_scroll_top_color',
		array(
			'default'           => '#fff',
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'food_critic_blogs_scroll_top_color',
			array(
				'label'    => esc_html__( 'Scroll To Top Color', 'food-critic-blogs' ),
				'section'  => 'food_critic_blogs_scroll_to_top_section_setting',
				'settings' => 'food_critic_blogs_scroll_top_color',
			)
		)
	);

	// Scroll To Top Background Color Setting
	$wp_customize->add_setting(
		'food_critic_blogs_scroll_top_bg_color',
		array(
			'default'           => '#4FD675',
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'food_critic_blogs_scroll_top_bg_color',
			array(
				'label'    => esc_html__( 'Scroll To Top Background Color', 'food-critic-blogs' ),
				'section'  => 'food_critic_blogs_scroll_to_top_section_setting',
				'settings' => 'food_critic_blogs_scroll_top_bg_color',
			)
		)
	);

	 $wp_customize->add_setting( 'food_critic_blogs_upgrade_page_settings_7',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new Food_Critic_Blogs_Control_Upgrade(
        $wp_customize, 'food_critic_blogs_upgrade_page_settings_7',
            array(
                'priority'      => 200,
                'section'       => 'food_critic_blogs_scroll_to_top_section_setting',
                'settings'      => 'food_critic_blogs_upgrade_page_settings_7',
                'label'         => __( 'Food Critic Blogs Pro comes with additional features.', 'food-critic-blogs' ),
                'choices'       => array( __( '12+ Sections', 'food-critic-blogs' ), __( 'One Click Demo Importer', 'food-critic-blogs' ), __( 'Section Reordering Facility', 'food-critic-blogs' ),__( 'Advance Typography', 'food-critic-blogs' ),__( 'Easy Customization', 'food-critic-blogs' ),__( '24x7 Support', 'food-critic-blogs' ), )
            )
        )
    ); 

	/*=========================================
	Woocommerce Section
	=========================================*/
	$wp_customize->add_section(
		'food_critic_blogs_woocommerce_section_setting', array(
			'title' => esc_html__( 'Woocommerce Settings', 'food-critic-blogs' ),
			'priority' => 3,
			'panel' => 'woocommerce',
		)
	);

	$wp_customize->add_setting(
    	'food_critic_blogs_custom_shop_per_columns',
    	array(
			'default' => '3',
			'sanitize_callback' => 'absint',
		)
	);	
	$wp_customize->add_control( 
		'food_critic_blogs_custom_shop_per_columns',
		array(
		    'label'   		=> __('Product Per Columns','food-critic-blogs'),
		    'section'		=> 'food_critic_blogs_woocommerce_section_setting',
			'type' 			=> 'number',
			'transport'         => $selective_refresh,
		)  
	);

	$wp_customize->add_setting(
    	'food_critic_blogs_custom_shop_product_per_page',
    	array(
			'default' => '9',
			'sanitize_callback' => 'absint',
		)
	);	
	$wp_customize->add_control( 
		'food_critic_blogs_custom_shop_product_per_page',
		array(
		    'label'   		=> __('Product Per Page','food-critic-blogs'),
		    'section'		=> 'food_critic_blogs_woocommerce_section_setting',
			'type' 			=> 'number',
			'transport'         => $selective_refresh,
		)  
	);

	// Woocommerce Sidebar Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'food_critic_blogs_wocommerce_sidebar_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'food_critic_blogs_sanitize_checkbox',
			'capability' => 'edit_theme_options',
		) 
	);
	
	$wp_customize->add_control(
	'food_critic_blogs_wocommerce_sidebar_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Woocommerce Sidebar', 'food-critic-blogs' ),
			'section'     => 'food_critic_blogs_woocommerce_section_setting',
			'settings'    => 'food_critic_blogs_wocommerce_sidebar_setting',
			'type'        => 'checkbox'
		)
	);
	
	$wp_customize->add_setting( 'food_critic_blogs_upgrade_page_settings_8',
		array(
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( new Food_Critic_Blogs_Control_Upgrade(
		$wp_customize, 'food_critic_blogs_upgrade_page_settings_8',
			array(
				'priority'      => 200,
				'section'       => 'woocommerce_section_setting',
				'settings'      => 'food_critic_blogs_upgrade_page_settings_8',
				'label'         => __( 'Food Critic Blogs Pro comes with additional features.', 'food-critic-blogs' ),
				'choices'       => array( __( '12+ Sections', 'food-critic-blogs' ), __( 'One Click Demo Importer', 'food-critic-blogs' ), __( 'Section Reordering Facility', 'food-critic-blogs' ),__( 'Advance Typography', 'food-critic-blogs' ),__( 'Easy Customization', 'food-critic-blogs' ),__( '24x7 Support', 'food-critic-blogs' ), )
			)
		)
	); 

	/*=========================================
	Sticky Header Section
	=========================================*/
	$wp_customize->add_section(
		'sticky_header_section_setting', array(
			'title' => esc_html__( 'Sticky Header Options', 'food-critic-blogs' ),
			'priority' => 3,
			'panel' => 'food_critic_blogs_general',
		)
	);

	// Sticky Header Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'food_critic_blogs_sticky_header' , 
			array(
			'sanitize_callback' => 'food_critic_blogs_sanitize_checkbox',
			'capability' => 'edit_theme_options',
		) 
	);

	$wp_customize->add_control(
	'food_critic_blogs_sticky_header', 
		array(
			'label'	      => esc_html__( 'Hide / Show Sticky Header', 'food-critic-blogs' ),
			'section'     => 'sticky_header_section_setting',
			'settings'    => 'food_critic_blogs_sticky_header',
			'type'        => 'checkbox'
		) 
	);

	$wp_customize->add_setting( 'food_critic_blogs_upgrade_page_settings_9',
		array(
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( new Food_Critic_Blogs_Control_Upgrade(
		$wp_customize, 'food_critic_blogs_upgrade_page_settings_9',
			array(
				'priority'      => 200,
				'section'       => 'sticky_header_section_setting',
				'settings'      => 'food_critic_blogs_upgrade_page_settings_9',
				'label'         => __( 'Food Critic Blogs Pro comes with additional features.', 'food-critic-blogs' ),
				'choices'       => array( __( '12+ Sections', 'food-critic-blogs' ), __( 'One Click Demo Importer', 'food-critic-blogs' ), __( 'Section Reordering Facility', 'food-critic-blogs' ),__( 'Advance Typography', 'food-critic-blogs' ),__( 'Easy Customization', 'food-critic-blogs' ),__( '24x7 Support', 'food-critic-blogs' ), )
			)
		)
	); 

	/*=========================================
	404 Page Options
	=========================================*/
	$wp_customize->add_section(
		'food_critic_blogs_404_section', array(
			'title' => esc_html__( '404 Page Options', 'food-critic-blogs' ),
			'priority' => 1,
			'panel' => 'food_critic_blogs_general',
		)
	);

	$wp_customize->add_setting(
		'food_critic_blogs_404_title',
		array(
			'default' => '404',
			'sanitize_callback' => 'sanitize_text_field',
			'priority' => 2,
		)
	);	
	$wp_customize->add_control( 
		'food_critic_blogs_404_title',
		array(
			'label'   		=> __('404 Heading','food-critic-blogs'),
			'section'		=> 'food_critic_blogs_404_section',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)  
	);

	$wp_customize->add_setting(
		'food_critic_blogs_404_Text',
		array(
			'default' => 'Page Not Found',
			'sanitize_callback' => 'sanitize_text_field',
			'priority' => 2,
		)
	);	
	$wp_customize->add_control( 
		'food_critic_blogs_404_Text',
		array(
			'label'   		=> __('404 Title','food-critic-blogs'),
			'section'		=> 'food_critic_blogs_404_section',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)  
	);

	$wp_customize->add_setting(
		'food_critic_blogs_404_content',
		array(
			'default' => 'The page you were looking for could not be found.',
			'sanitize_callback' => 'sanitize_text_field',
			'priority' => 2,
		)
	);	
	$wp_customize->add_control( 
		'food_critic_blogs_404_content',
		array(
			'label'   		=> __('404 Content','food-critic-blogs'),
			'section'		=> 'food_critic_blogs_404_section',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)  
	);

	$wp_customize->add_setting( 'food_critic_blogs_upgrade_page_settings_10',
		array(
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( new Food_Critic_Blogs_Control_Upgrade(
		$wp_customize, 'food_critic_blogs_upgrade_page_settings_10',
			array(
				'priority'      => 200,
				'section'       => 'food_critic_blogs_404_section',
				'settings'      => 'food_critic_blogs_upgrade_page_settings_10',
				'label'         => __( 'Food Critic Blogs Pro comes with additional features.', 'food-critic-blogs' ),
				'choices'       => array( __( '12+ Sections', 'food-critic-blogs' ), __( 'One Click Demo Importer', 'food-critic-blogs' ), __( 'Section Reordering Facility', 'food-critic-blogs' ),__( 'Advance Typography', 'food-critic-blogs' ),__( 'Easy Customization', 'food-critic-blogs' ),__( '24x7 Support', 'food-critic-blogs' ), )
			)
		)
	);

}

add_action( 'customize_register', 'food_critic_blogs_general_setting' );