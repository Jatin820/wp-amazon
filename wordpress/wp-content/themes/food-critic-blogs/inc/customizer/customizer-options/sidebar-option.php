<?php
function food_critic_blogs_sidebar_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	$wp_customize->add_panel(
		'food_critic_blogs_sidebar', array(
			'priority' => 31,
			'title' => esc_html__( 'Sidebar Options', 'food-critic-blogs' ),
		)
	);

	/*=========================================
	Sidebar Option  Section
	=========================================*/
	$wp_customize->add_section(
		'food_critic_blogs_sidebar_settings', array(
			'title' => esc_html__( 'Sidebar Options', 'food-critic-blogs' ),
			'priority' => 1,
			'panel' => 'food_critic_blogs_general',
		)
	);
	

	// Archive Sidebar Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'food_critic_blogs_archive_sidebar_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'food_critic_blogs_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'food_critic_blogs_archive_sidebar_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Archive Sidebar', 'food-critic-blogs' ),
			'section'     => 'food_critic_blogs_sidebar_settings',
			'settings'    => 'food_critic_blogs_archive_sidebar_setting',
			'type'        => 'checkbox'
		) 
	);

	// Index Sidebar Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'food_critic_blogs_index_sidebar_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'food_critic_blogs_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'food_critic_blogs_index_sidebar_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Index Sidebar', 'food-critic-blogs' ),
			'section'     => 'food_critic_blogs_sidebar_settings',
			'settings'    => 'food_critic_blogs_index_sidebar_setting',
			'type'        => 'checkbox'
		) 
	);

	// Pages Sidebar Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'food_critic_blogs_paged_sidebar_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'food_critic_blogs_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'food_critic_blogs_paged_sidebar_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Pages Sidebar', 'food-critic-blogs' ),
			'section'     => 'food_critic_blogs_sidebar_settings',
			'settings'    => 'food_critic_blogs_paged_sidebar_setting',
			'type'        => 'checkbox'
		) 
	);

	// Search Result Sidebar Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'food_critic_blogs_search_result_sidebar_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'food_critic_blogs_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'food_critic_blogs_search_result_sidebar_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Search Result Sidebar', 'food-critic-blogs' ),
			'section'     => 'food_critic_blogs_sidebar_settings',
			'settings'    => 'food_critic_blogs_search_result_sidebar_setting',
			'type'        => 'checkbox'
		) 
	);

	// Single Post Sidebar Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'food_critic_blogs_single_post_sidebar_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'food_critic_blogs_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'food_critic_blogs_single_post_sidebar_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Single Post Sidebar', 'food-critic-blogs' ),
			'section'     => 'food_critic_blogs_sidebar_settings',
			'settings'    => 'food_critic_blogs_single_post_sidebar_setting',
			'type'        => 'checkbox'
		) 
	);

	// Sidebar Page Sidebar Date Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'food_critic_blogs_single_page_sidebar_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'food_critic_blogs_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'food_critic_blogs_single_page_sidebar_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Page Width Sidebar', 'food-critic-blogs' ),
			'section'     => 'food_critic_blogs_sidebar_settings',
			'settings'    => 'food_critic_blogs_single_page_sidebar_setting',
			'type'        => 'checkbox'
		) 
	);

	$wp_customize->add_setting( 'food_critic_blogs_sidebar_position', array(
        'default'   => 'right',
        'sanitize_callback' => 'food_critic_blogs_sanitize_sidebar_position',
    ));

    $wp_customize->add_control( 'food_critic_blogs_sidebar_position', array(
        'label'    => __( 'Sidebar Position', 'food-critic-blogs' ),
        'section'  => 'food_critic_blogs_sidebar_settings',
        'settings' => 'food_critic_blogs_sidebar_position',
        'type'     => 'radio',
        'choices'  => array(
            'right' => __( 'Right Sidebar', 'food-critic-blogs' ),
            'left'  => __( 'Left Sidebar', 'food-critic-blogs' ),
        ),
    ));

	$wp_customize->add_setting( 'food_critic_blogs_upgrade_page_settings_15',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new Food_Critic_Blogs_Control_Upgrade(
        $wp_customize, 'food_critic_blogs_upgrade_page_settings_15',
            array(
                'priority'      => 200,
                'section'       => 'food_critic_blogs_sidebar_settings',
                'settings'      => 'food_critic_blogs_upgrade_page_settings_15',
                'label'         => __( 'Food Critic Blogs Pro comes with additional features.', 'food-critic-blogs' ),
                'choices'       => array( __( '12+ Sections', 'food-critic-blogs' ), __( 'One Click Demo Importer', 'food-critic-blogs' ), __( 'Section Reordering Facility', 'food-critic-blogs' ),__( 'Advance Typography', 'food-critic-blogs' ),__( 'Easy Customization', 'food-critic-blogs' ),__( '24x7 Support', 'food-critic-blogs' ), )
            )
        )
    );

}

add_action( 'customize_register', 'food_critic_blogs_sidebar_setting' );