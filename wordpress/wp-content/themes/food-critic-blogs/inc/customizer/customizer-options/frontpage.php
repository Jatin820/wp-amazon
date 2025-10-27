<?php
function food_critic_blogs_blog_setting( $wp_customize ) {

$wp_customize->register_control_type( 'Food_Critic_Blogs_Control_Upgrade' );
	
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	$wp_customize->add_panel(
		'food_critic_blogs_frontpage_sections', array(
			'priority' => 1,
			'title' => esc_html__( 'Frontpage Sections', 'food-critic-blogs' ),
		)
	);
	
	/*=========================================
	Slider Section
	=========================================*/
	$wp_customize->add_section( 'food_critic_blogs_slider_section' , array(
    	'title'      => __( 'Slider Section', 'food-critic-blogs' ),
    	'priority' => 2,
		'panel' => 'food_critic_blogs_frontpage_sections'
	) );

	// Slider Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'food_critic_blogs_slider_arrows' , 
			array(
			'default' => true,
			'sanitize_callback' => 'food_critic_blogs_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	$wp_customize->add_control(
	'food_critic_blogs_slider_arrows', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'food-critic-blogs' ),
			'section'     => 'food_critic_blogs_slider_section',
			'settings'    => 'food_critic_blogs_slider_arrows',
			'type'        => 'checkbox'
		) 
	);

	$food_critic_blogs_categories = get_categories();
	$food_critic_blogs_cats = array();
	$food_critic_blogs_i = 0;
	foreach($food_critic_blogs_categories as $food_critic_blogs_category){
	if($food_critic_blogs_i==0){
		$food_critic_blogs_default = $food_critic_blogs_category->slug;
		$food_critic_blogs_i++;
	}
	$food_critic_blogs_cats[$food_critic_blogs_category->slug] = $food_critic_blogs_category->name;
	}

	$wp_customize->add_setting('food_critic_blogs_main_post_slider_category_setting',array(
	  'default' => 'Slider',
	  'sanitize_callback' => 'food_critic_blogs_sanitize_choices',
	));
	$wp_customize->add_control('food_critic_blogs_main_post_slider_category_setting',array(
		'type'    => 'select',
		'choices' => $food_critic_blogs_cats,
		'label' => __('Select Category','food-critic-blogs'),
		'section' => 'food_critic_blogs_slider_section',
	));

	$wp_customize->add_setting( 'food_critic_blogs_upgrade_page_settings_1',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new Food_Critic_Blogs_Control_Upgrade(
        $wp_customize, 'food_critic_blogs_upgrade_page_settings_1',
            array(
                'priority'      => 200,
                'section'       => 'food_critic_blogs_slider_section',
                'settings'      => 'food_critic_blogs_upgrade_page_settings_1',
                'label'         => __( 'Food Critic Blogs Pro comes with additional features.', 'food-critic-blogs' ),
                'choices'       => array( __( '12+ Sections', 'food-critic-blogs' ), __( 'One Click Demo Importer', 'food-critic-blogs' ), __( 'Section Reordering Facility', 'food-critic-blogs' ),__( 'Advance Typography', 'food-critic-blogs' ),__( 'Easy Customization', 'food-critic-blogs' ),__( '24x7 Support', 'food-critic-blogs' ), )
            )
        )
    );

	// Category Tab Section

	$wp_customize->add_section('food_critic_blogs_category_tab_section',array(
		'title'	=> __('Category Tab Section','food-critic-blogs'),
		'panel' => 'food_critic_blogs_frontpage_sections',
		'priority' => 3,
	));

	// Slider Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'food_critic_blogs_category_tab_enable' , 
			array(
			'default' => true,
			'sanitize_callback' => 'food_critic_blogs_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	$wp_customize->add_control(
	'food_critic_blogs_category_tab_enable', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'food-critic-blogs' ),
			'section'     => 'food_critic_blogs_category_tab_section',
			'settings'    => 'food_critic_blogs_category_tab_enable',
			'type'        => 'checkbox'
		) 
	);

	$wp_customize->add_setting('food_critic_blogs_category_tab_heading',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('food_critic_blogs_category_tab_heading',array(
		'label'	=> __('Section Title','food-critic-blogs'),
		'section'	=> 'food_critic_blogs_category_tab_section',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('food_critic_blogs_category_tab_sub_heading',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('food_critic_blogs_category_tab_sub_heading',array(
		'label'	=> __('Section Sub Title','food-critic-blogs'),
		'section'	=> 'food_critic_blogs_category_tab_section',
		'type'		=> 'text'
	));

	$food_critic_blogs_categories = get_categories();
	$food_critic_blogs_cat_post = array();
	$food_critic_blogs_cat_post['select'] = __('Select', 'food-critic-blogs'); // Default "Select" option

	foreach ($food_critic_blogs_categories as $food_critic_blogs_category) {
	    $food_critic_blogs_cat_post[$food_critic_blogs_category->slug] = $food_critic_blogs_category->name;
	}

	for ($food_critic_blogs_i = 1; $food_critic_blogs_i <= 4; $food_critic_blogs_i++) {

	    // Tab Title
	    $wp_customize->add_setting('food_critic_blogs_entertainment_tab_tab_title' . $food_critic_blogs_i, array(
	        'default' => '',
	        'sanitize_callback' => 'sanitize_text_field'
	    ));
	    $wp_customize->add_control('food_critic_blogs_entertainment_tab_tab_title' . $food_critic_blogs_i, array(
	        'label' => __('Tab Title ', 'food-critic-blogs') . $food_critic_blogs_i,
	        'section' => 'food_critic_blogs_category_tab_section',
	        'type' => 'text'
	    ));

	    // Category 1
	    $wp_customize->add_setting('food_critic_blogs_entertainment_tab_category_one' . $food_critic_blogs_i, array(
	        'default' => 'select',
	        'sanitize_callback' => 'sanitize_text_field',
	    ));
	    $wp_customize->add_control('food_critic_blogs_entertainment_tab_category_one' . $food_critic_blogs_i, array(
	        'type' => 'select',
	        'choices' => $food_critic_blogs_cat_post,
	        'label' => __('Choose Category 1', 'food-critic-blogs'),
	        'section' => 'food_critic_blogs_category_tab_section',
	    ));

	    // Category 2
	    $wp_customize->add_setting('food_critic_blogs_entertainment_tab_category_two' . $food_critic_blogs_i, array(
	        'default' => 'select',
	        'sanitize_callback' => 'sanitize_text_field',
	    ));
	    $wp_customize->add_control('food_critic_blogs_entertainment_tab_category_two' . $food_critic_blogs_i, array(
	        'type' => 'select',
	        'choices' => $food_critic_blogs_cat_post,
	        'label' => __('Choose Category 2', 'food-critic-blogs'),
	        'section' => 'food_critic_blogs_category_tab_section',
	    ));

	    // Category 3
	    $wp_customize->add_setting('food_critic_blogs_entertainment_tab_category_three' . $food_critic_blogs_i, array(
	        'default' => 'select',
	        'sanitize_callback' => 'sanitize_text_field',
	    ));
	    $wp_customize->add_control('food_critic_blogs_entertainment_tab_category_three' . $food_critic_blogs_i, array(
	        'type' => 'select',
	        'choices' => $food_critic_blogs_cat_post,
	        'label' => __('Choose Category 3', 'food-critic-blogs'),
	        'section' => 'food_critic_blogs_category_tab_section',
	    ));
	}

	$wp_customize->add_setting('food_critic_blogs_header_button',array(
		'default' => __('More', 'food-critic-blogs'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('food_critic_blogs_header_button',array(
		'label'	=> __('Add Button Text','food-critic-blogs'),
		'section'=> 'food_critic_blogs_category_tab_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('food_critic_blogs_header_link',array(
		'default'=> '#',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('food_critic_blogs_header_link',array(
		'label'	=> __('Add Button Link','food-critic-blogs'),
		'section'=> 'food_critic_blogs_category_tab_section',
		'type'=> 'url'
	));

	$wp_customize->add_setting( 'food_critic_blogs_upgrade_page_settings_16',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new Food_Critic_Blogs_Control_Upgrade(
        $wp_customize, 'food_critic_blogs_upgrade_page_settings_16',
            array(
                'priority'      => 200,
                'section'       => 'food_critic_blogs_category_tab_section',
                'settings'      => 'food_critic_blogs_upgrade_page_settings_16',
                'label'         => __( 'Food Critic Blogs Pro comes with additional features.', 'food-critic-blogs' ),
                'choices'       => array( __( '12+ Sections', 'food-critic-blogs' ), __( 'One Click Demo Importer', 'food-critic-blogs' ), __( 'Section Reordering Facility', 'food-critic-blogs' ),__( 'Advance Typography', 'food-critic-blogs' ),__( 'Easy Customization', 'food-critic-blogs' ),__( '24x7 Support', 'food-critic-blogs' ), )
            )
        )
    ); 

}

add_action( 'customize_register', 'food_critic_blogs_blog_setting' );

// service selective refresh
function food_critic_blogs_blog_section_partials( $wp_customize ){	
	// blog_title
	$wp_customize->selective_refresh->add_partial( 'blog_title', array(
		'selector'            => '.home-blog .title h6',
		'settings'            => 'blog_title',
		'render_callback'  => 'food_critic_blogs_blog_title_render_callback',
	
	) );
	
	// blog_subtitle
	$wp_customize->selective_refresh->add_partial( 'blog_subtitle', array(
		'selector'            => '.home-blog .title h2',
		'settings'            => 'blog_subtitle',
		'render_callback'  => 'food_critic_blogs_blog_subtitle_render_callback',
	
	) );
	
	// blog_description
	$wp_customize->selective_refresh->add_partial( 'blog_description', array(
		'selector'            => '.home-blog .title p',
		'settings'            => 'blog_description',
		'render_callback'  => 'food_critic_blogs_blog_description_render_callback',
	
	) );	
	}

add_action( 'customize_register', 'food_critic_blogs_blog_section_partials' );

// blog_title
function food_critic_blogs_blog_title_render_callback() {
	return get_theme_mod( 'blog_title' );
}

// blog_subtitle
function food_critic_blogs_blog_subtitle_render_callback() {
	return get_theme_mod( 'blog_subtitle' );
}

// service description
function food_critic_blogs_blog_description_render_callback() {
	return get_theme_mod( 'blog_description' );
}