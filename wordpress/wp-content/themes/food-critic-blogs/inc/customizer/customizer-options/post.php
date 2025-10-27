<?php
function food_critic_blogs_post_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	$wp_customize->add_panel(
		'food_critic_blogs_post', array(
			'priority' => 31,
			'title' => esc_html__( 'Post Options', 'food-critic-blogs' ),
		)
	);

	/*=========================================
	Archive Post  Section
	=========================================*/
	$wp_customize->add_section(
		'food_critic_blogs_archive_post_setting', array(
			'title' => esc_html__( 'Archive Post', 'food-critic-blogs' ),
			'priority' => 1,
			'panel' => 'food_critic_blogs_post',
		)
	);

	// Layouts Post
	$wp_customize->add_setting('food_critic_blogs_blog_layout_option_setting',array(
	  'default' => 'Default',
	  'sanitize_callback' => 'food_critic_blogs_sanitize_choices'
	));
	$wp_customize->add_control(new Food_Critic_Blogs_Image_Radio_Control($wp_customize, 'food_critic_blogs_blog_layout_option_setting', array(
	  'type' => 'select',
	  'label' => __('Blog Post Layouts','food-critic-blogs'),
	  'section' => 'food_critic_blogs_archive_post_setting',
	  'choices' => array(
		'Default' => esc_url(get_template_directory_uri()).'/assets/images/layout-1.png',
		'Left' => esc_url(get_template_directory_uri()).'/assets/images/layout-2.png',
		'Right' => esc_url(get_template_directory_uri()).'/assets/images/layout-3.png',
	))));
		
	// Post Heading Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'food_critic_blogs_post_heading_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'food_critic_blogs_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
		'food_critic_blogs_post_heading_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Heading', 'food-critic-blogs' ),
			'section'     => 'food_critic_blogs_archive_post_setting',
			'settings'    => 'food_critic_blogs_post_heading_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Content Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'food_critic_blogs_post_content_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'food_critic_blogs_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'food_critic_blogs_post_content_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Content', 'food-critic-blogs' ),
			'section'     => 'food_critic_blogs_archive_post_setting',
			'settings'    => 'food_critic_blogs_post_content_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Featured Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'food_critic_blogs_post_featured_image_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'food_critic_blogs_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'food_critic_blogs_post_featured_image_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Feature Image', 'food-critic-blogs' ),
			'section'     => 'food_critic_blogs_archive_post_setting',
			'settings'    => 'food_critic_blogs_post_featured_image_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Date Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'food_critic_blogs_post_date_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'food_critic_blogs_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'food_critic_blogs_post_date_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Date', 'food-critic-blogs' ),
			'section'     => 'food_critic_blogs_archive_post_setting',
			'settings'    => 'food_critic_blogs_post_date_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Date Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'food_critic_blogs_post_comments_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'food_critic_blogs_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'food_critic_blogs_post_comments_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Comment', 'food-critic-blogs' ),
			'section'     => 'food_critic_blogs_archive_post_setting',
			'settings'    => 'food_critic_blogs_post_comments_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Date Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'food_critic_blogs_post_author_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'food_critic_blogs_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'food_critic_blogs_post_author_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Author', 'food-critic-blogs' ),
			'section'     => 'food_critic_blogs_archive_post_setting',
			'settings'    => 'food_critic_blogs_post_author_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Timing Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'food_critic_blogs_post_timing_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'food_critic_blogs_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'food_critic_blogs_post_timing_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Timings', 'food-critic-blogs' ),
			'section'     => 'food_critic_blogs_archive_post_setting',
			'settings'    => 'food_critic_blogs_post_timing_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Tags Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'food_critic_blogs_post_tags_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'food_critic_blogs_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'food_critic_blogs_post_tags_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Tags', 'food-critic-blogs' ),
			'section'     => 'food_critic_blogs_archive_post_setting',
			'settings'    => 'food_critic_blogs_post_tags_settings',
			'type'        => 'checkbox'
		) 
	);

	$wp_customize->add_setting('food_critic_blogs_excerpt_limit', array(
        'default'           => 50,
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('food_critic_blogs_excerpt_limit', array(
        'label'   => __('Excerpt Word Limit', 'food-critic-blogs'),
        'section' => 'food_critic_blogs_archive_post_setting',
        'type'    => 'number',
    ));

	$wp_customize->add_setting( 'food_critic_blogs_upgrade_page_settings_133',
	array(
		'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( new Food_Critic_Blogs_Control_Upgrade(
		$wp_customize, 'food_critic_blogs_upgrade_page_settings_133',
			array(
				'priority'      => 200,
				'section'       => 'food_critic_blogs_archive_post_setting',
				'settings'      => 'food_critic_blogs_upgrade_page_settings_133',
				'label'         => __( 'Food Critic Blogs Pro comes with additional features.', 'food-critic-blogs' ),
				'choices'       => array( __( '12+ Sections', 'food-critic-blogs' ), __( 'One Click Demo Importer', 'food-critic-blogs' ), __( 'Section Reordering Facility', 'food-critic-blogs' ),__( 'Advance Typography', 'food-critic-blogs' ),__( 'Easy Customization', 'food-critic-blogs' ),__( '24x7 Support', 'food-critic-blogs' ), )
			)
		)
	); 

	/*=========================================
	Single Post  Section
	=========================================*/
	$wp_customize->add_section(
		'food_critic_blogs_single_post', array(
			'title' => esc_html__( 'Single Post', 'food-critic-blogs' ),
			'priority' => 3,
			'panel' => 'food_critic_blogs_post',
		)
	);
	
	// Post Heading Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'food_critic_blogs_single_post_heading_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'food_critic_blogs_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'food_critic_blogs_single_post_heading_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Heading', 'food-critic-blogs' ),
			'section'     => 'food_critic_blogs_single_post',
			'settings'    => 'food_critic_blogs_single_post_heading_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Content Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'food_critic_blogs_single_post_content_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'food_critic_blogs_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'food_critic_blogs_single_post_content_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Content', 'food-critic-blogs' ),
			'section'     => 'food_critic_blogs_single_post',
			'settings'    => 'food_critic_blogs_single_post_content_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Featured Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'food_critic_blogs_single_post_featured_image_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'food_critic_blogs_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'food_critic_blogs_single_post_featured_image_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Feature Image', 'food-critic-blogs' ),
			'section'     => 'food_critic_blogs_single_post',
			'settings'    => 'food_critic_blogs_single_post_featured_image_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Date Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'food_critic_blogs_single_post_date_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'food_critic_blogs_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'food_critic_blogs_single_post_date_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Date', 'food-critic-blogs' ),
			'section'     => 'food_critic_blogs_single_post',
			'settings'    => 'food_critic_blogs_single_post_date_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Date Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'food_critic_blogs_single_post_comments_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'food_critic_blogs_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'food_critic_blogs_single_post_comments_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Comment', 'food-critic-blogs' ),
			'section'     => 'food_critic_blogs_single_post',
			'settings'    => 'food_critic_blogs_single_post_comments_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Date Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'food_critic_blogs_single_post_author_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'food_critic_blogs_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'food_critic_blogs_single_post_author_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Author', 'food-critic-blogs' ),
			'section'     => 'food_critic_blogs_single_post',
			'settings'    => 'food_critic_blogs_single_post_author_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Date Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'food_critic_blogs_single_post_timing_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'food_critic_blogs_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'food_critic_blogs_single_post_timing_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Timings', 'food-critic-blogs' ),
			'section'     => 'food_critic_blogs_single_post',
			'settings'    => 'food_critic_blogs_single_post_timing_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Tags Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'food_critic_blogs_single_post_tags_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'food_critic_blogs_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'food_critic_blogs_single_post_tags_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Tags', 'food-critic-blogs' ),
			'section'     => 'food_critic_blogs_single_post',
			'settings'    => 'food_critic_blogs_single_post_tags_settings',
			'type'        => 'checkbox'
		) 
	);

	// Related Posts Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'food_critic_blogs_show_hide_related_post' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'food_critic_blogs_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'food_critic_blogs_show_hide_related_post', 
		array(
			'label'	      => esc_html__( 'Hide / Show Related Posts', 'food-critic-blogs' ),
			'section'     => 'food_critic_blogs_single_post',
			'settings'    => 'food_critic_blogs_show_hide_related_post',
			'type'        => 'checkbox'
		) 
	);

	$wp_customize->add_setting( 
    	'food_critic_blogs_related_posts_heading',
    	array(
			'default' => 'Related Posts',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'priority'      => 1,
		)
	);	

	$wp_customize->add_control( 
		'food_critic_blogs_related_posts_heading',
		array(
		    'label'   		=> __('Related Post Heading','food-critic-blogs'),
		    'section'		=> 'food_critic_blogs_single_post',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)
	);

	$wp_customize->add_setting('food_critic_blogs_related_post_counts', array(
        'default'           => 3,
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('food_critic_blogs_related_post_counts', array(
        'label'   => __('Number Of Related Posts To Show', 'food-critic-blogs'),
        'section' => 'food_critic_blogs_single_post',
        'type'    => 'number',
    ));

	$wp_customize->add_setting( 'food_critic_blogs_upgrade_page_settings_58',
	array(
		'sanitize_callback' => 'sanitize_text_field'
	)
	);
	$wp_customize->add_control( new Food_Critic_Blogs_Control_Upgrade(
		$wp_customize, 'food_critic_blogs_upgrade_page_settings_58',
			array(
				'priority'      => 200,
				'section'       => 'food_critic_blogs_single_post',
				'settings'      => 'food_critic_blogs_upgrade_page_settings_58',
				'label'         => __( 'Food Critic Blogs Pro comes with additional features.', 'food-critic-blogs' ),
				'choices'       => array( __( '12+ Sections', 'food-critic-blogs' ), __( 'One Click Demo Importer', 'food-critic-blogs' ), __( 'Section Reordering Facility', 'food-critic-blogs' ),__( 'Advance Typography', 'food-critic-blogs' ),__( 'Easy Customization', 'food-critic-blogs' ),__( '24x7 Support', 'food-critic-blogs' ), )
			)
		)
	); 
}

add_action( 'customize_register', 'food_critic_blogs_post_setting' );