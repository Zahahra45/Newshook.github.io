<?php
/**
	 * Slider section
	 */
	// Slider section
	$wp_customize->add_section(
		'dreshion_blog_slider',
		array(
			'title' => esc_html__( 'Banner Slider', 'dreshion-blog' ),
			'panel' => 'dreshion_blog_home_panel',
		)
	);

	// Slider Section enable setting
	$wp_customize->add_setting(
		'dreshion_blog_featured_slider_section_enable',
		array(
			'sanitize_callback' => 'dreshion_blog_sanitize_checkbox',
			'default' => false,
		)
	);

	$wp_customize->add_control(
		'dreshion_blog_featured_slider_section_enable',
		array(
			'section'		=> 'dreshion_blog_slider',
			'label'			=> esc_html__( 'Enable Featured Slider Section.', 'dreshion-blog' ),
			'type'			=> 'checkbox',
		)
	);

// Slider number setting
	$wp_customize->add_setting(
		'dreshion_blog_slider_secion_excerpt',
		array(
			'sanitize_callback' => 'dreshion_blog_sanitize_number_range',
			'default' => 20,
			'transport'	=> 'postMessage',
		)
	);

	$wp_customize->add_control(
		'dreshion_blog_slider_secion_excerpt',
		array(
			'section'		=> 'dreshion_blog_slider',
			'label'			=> esc_html__( 'Excerpt Length', 'dreshion-blog' ),
			'description'			=> esc_html__( 'Min: 0 | Max: 300', 'dreshion-blog' ),
			'active_callback' => 'dreshion_blog_is_featured_slider_enable',
			'type'			=> 'number',
			'input_attrs'	=> array( 'min' => 0, 'max' => 300 ),
		)
	);

	// Slider Dot enable setting
	$wp_customize->add_setting(
		'dreshion_blog_featured_slider_dot_enable',
		array(
			'sanitize_callback' => 'dreshion_blog_sanitize_checkbox',
			'default' => true,
		)
	);

	$wp_customize->add_control(
		'dreshion_blog_featured_slider_dot_enable',
		array(
			'section'		=> 'dreshion_blog_slider',
			'label'			=> esc_html__( 'Enable Featured Slider Dot.', 'dreshion-blog' ),
			'type'			=> 'checkbox',
			'active_callback' => 'dreshion_blog_is_featured_slider_enable',
		)
	);

	// Slider Infinite Enable setting
	$wp_customize->add_setting(
		'dreshion_blog_featured_slider_arrow_enable',
		array(
			'sanitize_callback' => 'dreshion_blog_sanitize_checkbox',
			'default' => true,
		)
	);

	$wp_customize->add_control(
		'dreshion_blog_featured_slider_arrow_enable',
		array(
			'section'		=> 'dreshion_blog_slider',
			'label'			=> esc_html__( 'Enable Featured Slider Arrow.', 'dreshion-blog' ),
			'type'			=> 'checkbox',
			'active_callback' => 'dreshion_blog_is_featured_slider_enable',
		)
	);

	for ( $i=1; $i <= 5; $i++ ) { 

		// Slider custom name setting
		$wp_customize->add_setting(
			'dreshion_blog_slider_custom_subtitle_' . $i,
			array(
				'sanitize_callback' => 'sanitize_text_field',
				'default' => $default['dreshion_blog_slider_custom_subtitle'],
			)
		);

		$wp_customize->add_control(
			'dreshion_blog_slider_custom_subtitle_' . $i,
			array(
				'section'		=> 'dreshion_blog_slider',
				'label'			=> esc_html__( 'Sub Title', 'dreshion-blog' ) . $i,
				'active_callback' => 'dreshion_blog_is_featured_slider_enable'
			)
		);

		// Slider custom name setting
		$wp_customize->add_setting(
			'dreshion_blog_slider_custom_btn_' . $i,
			array(
				'sanitize_callback' => 'sanitize_text_field',
				'default' => $default['dreshion_blog_slider_custom_btn'],
			)
		);

		$wp_customize->add_control(
			'dreshion_blog_slider_custom_btn_' . $i,
			array(
				'section'		=> 'dreshion_blog_slider',
				'label'			=> esc_html__( 'Button text ', 'dreshion-blog' ) . $i,
				'active_callback' => 'dreshion_blog_is_featured_slider_enable'
			)
		);


		// Slider post setting
		$wp_customize->add_setting(
			'dreshion_blog_slider_post_' . $i,
			array(
				'sanitize_callback' => 'dreshion_blog_sanitize_dropdown_pages',
			)
		);

		$wp_customize->add_control(
			'dreshion_blog_slider_post_' . $i,
			array(
				'section'		=> 'dreshion_blog_slider',
				'label'			=> esc_html__( 'Post ', 'dreshion-blog' ) . $i,
				'active_callback' => 'dreshion_blog_is_featured_slider_enable',
				'type'			=> 'select',
				'choices'		=> dreshion_blog_get_post_choices(),
			)
		);
		
		// Slider custom separator setting
		$wp_customize->add_setting(
			'dreshion_blog_slider_custom_separator_' . $i,
			array(
				'sanitize_callback' => 'dreshion_blog_sanitize_html',
			)
		);

		$wp_customize->add_control(
			new dreshion_blog_Separator_Custom_Control( 
			$wp_customize,
			'dreshion_blog_slider_custom_separator_' . $i,
				array(
					'section'		=> 'dreshion_blog_slider',
					'active_callback' => 'dreshion_blog_is_featured_slider_enable',
					'type'			=> 'dreshion-blog-separator',
				)
			)
		);
	}
?>