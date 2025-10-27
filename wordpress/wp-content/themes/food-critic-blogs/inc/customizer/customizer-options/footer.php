<?php

function food_critic_blogs_footer( $wp_customize ) {
	$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	// Footer Panel // 
	$wp_customize->add_panel( 
		'food_critic_blogs_footer_section', 
		array(
			'priority'      => 34,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Footer Options', 'food-critic-blogs'),
		) 
	);

	// Footer Widgets // 
	$wp_customize->add_section(
        'food_critic_blogs_footer_top',
        array(
            'title' 		=> __('Footer Widgets','food-critic-blogs'),
			'panel'  		=> 'food_critic_blogs_footer_section',
			'priority'      => 3,
		)
    );

    // Footer Widgets Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'food_critic_blogs_footer_widgets_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'food_critic_blogs_sanitize_checkbox',
			'capability' => 'edit_theme_options',
		) 
	);
	
	$wp_customize->add_control(
	'food_critic_blogs_footer_widgets_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Footer Widgets', 'food-critic-blogs' ),
			'section'     => 'food_critic_blogs_footer_top',
			'settings'    => 'food_critic_blogs_footer_widgets_setting',
			'type'        => 'checkbox'
		) 
	);

	// Footer Background Image Setting
	$wp_customize->add_setting('food_critic_blogs_footer_bg_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'food_critic_blogs_footer_bg_image',array(
	'label' => __('Footer Background Image','food-critic-blogs'),
	'section' => 'food_critic_blogs_footer_top'
	)));

	// Footer Background Image Opacity
	$wp_customize->add_setting('food_critic_blogs_footer_bg_image_opacity', array(
		'default'           => 100,
		'sanitize_callback' => 'absint',
		'capability'        => 'edit_theme_options',
	));

	$wp_customize->add_control('food_critic_blogs_footer_bg_image_opacity', array(
		'label'    => __('Footer Background Image Opacity (%)', 'food-critic-blogs'),
		'section'  => 'food_critic_blogs_footer_top',
		'type'     => 'range',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		),
	));

	// Footer Background Color Setting
    $wp_customize->add_setting('food_critic_blogs_footer_bg_color',array(
		'default' => '#151515',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'food_critic_blogs_footer_bg_color',array(
		'label' => esc_html__('Footer Background Color', 'food-critic-blogs'),
		'section' => 'food_critic_blogs_footer_top', // Adjust section if needed
		'settings' => 'food_critic_blogs_footer_bg_color',
	)));

	$wp_customize->add_setting( 'food_critic_blogs_upgrade_page_settings_3',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new Food_Critic_Blogs_Control_Upgrade(
        $wp_customize, 'food_critic_blogs_upgrade_page_settings_3',
            array(
                'priority'      => 200,
                'section'       => 'food_critic_blogs_footer_top',
                'settings'      => 'food_critic_blogs_upgrade_page_settings_3',
                'label'         => __( 'Food Critic Blogs Pro comes with additional features.', 'food-critic-blogs' ),
                'choices'       => array( __( '12+ Sections', 'food-critic-blogs' ), __( 'One Click Demo Importer', 'food-critic-blogs' ), __( 'Section Reordering Facility', 'food-critic-blogs' ),__( 'Advance Typography', 'food-critic-blogs' ),__( 'Easy Customization', 'food-critic-blogs' ),__( '24x7 Support', 'food-critic-blogs' ), )
            )
        )
    ); 

	// Footer Bottom // 
	$wp_customize->add_section(
        'food_critic_blogs_footer_bottom',
        array(
            'title' 		=> __('Footer Bottom','food-critic-blogs'),
			'panel'  		=> 'food_critic_blogs_footer_section',
			'priority'      => 3,
		)
    );
	
	// Footer Copyright Head
	$wp_customize->add_setting(
		'food_critic_blogs_footer_btm_copy_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'food_critic_blogs_sanitize_text',
			'priority'  => 3,
		)
	);

	// Site Title Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'food_critic_blogs_footer_copyright_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'food_critic_blogs_sanitize_checkbox',
			'capability' => 'edit_theme_options',
		) 
	);
	
	$wp_customize->add_control(
	'food_critic_blogs_footer_copyright_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Footer Copytight', 'food-critic-blogs' ),
			'section'     => 'food_critic_blogs_footer_bottom',
			'settings'    => 'food_critic_blogs_footer_copyright_setting',
			'type'        => 'checkbox'
		) 
	);
	
	// Footer Copyright 
	$wp_customize->add_setting(
    	'food_critic_blogs_footer_copyright',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 4,
		)
	);

	$wp_customize->add_control( 
		'food_critic_blogs_footer_copyright',
		array(
		    'label'   		=> __('Edit Copyright Text','food-critic-blogs'),
		    'section'		=> 'food_critic_blogs_footer_bottom',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)  
	);

	$wp_customize->add_setting( 'food_critic_blogs_copyright_alignment', array(
        'default'   => 'center',
        'sanitize_callback' => 'food_critic_blogs_sanitize_copyright_position',
    ));

    $wp_customize->add_control( 'food_critic_blogs_copyright_alignment', array(
        'label'    => __( 'Copyright Position', 'food-critic-blogs' ),
        'section'  => 'food_critic_blogs_footer_bottom',
        'settings' => 'food_critic_blogs_copyright_alignment',
        'type'     => 'radio',
        'choices'  => array(
            'right' => __( 'Right Align', 'food-critic-blogs' ),
            'left'  => __( 'Left Align', 'food-critic-blogs' ),
            'center'  => __( 'Center Align', 'food-critic-blogs' ),
        ),
    ));

	$wp_customize->add_setting( 'food_critic_blogs_upgrade_page_settings_4',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new Food_Critic_Blogs_Control_Upgrade(
        $wp_customize, 'food_critic_blogs_upgrade_page_settings_4',
            array(
                'priority'      => 200,
                'section'       => 'food_critic_blogs_footer_bottom',
                'settings'      => 'food_critic_blogs_upgrade_page_settings_4',
                'label'         => __( 'Food Critic Blogs Pro comes with additional features.', 'food-critic-blogs' ),
                'choices'       => array( __( '12+ Sections', 'food-critic-blogs' ), __( 'One Click Demo Importer', 'food-critic-blogs' ), __( 'Section Reordering Facility', 'food-critic-blogs' ),__( 'Advance Typography', 'food-critic-blogs' ),__( 'Easy Customization', 'food-critic-blogs' ),__( '24x7 Support', 'food-critic-blogs' ), )
            )
        )
    );
}
add_action( 'customize_register', 'food_critic_blogs_footer' );

// Footer selective refresh
function food_critic_blogs_footer_partials( $wp_customize ){
	// footer_copyright
	$wp_customize->selective_refresh->add_partial( 'footer_copyright', array(
		'selector'            => '.copy-right .copyright-text',
		'settings'            => 'footer_copyright',
		'render_callback'  => 'food_critic_blogs_footer_copyright_render_callback',
	) );
}
add_action( 'customize_register', 'food_critic_blogs_footer_partials' );

// copyright_content
function food_critic_blogs_footer_copyright_render_callback() {
	return get_theme_mod( 'footer_copyright' );
}