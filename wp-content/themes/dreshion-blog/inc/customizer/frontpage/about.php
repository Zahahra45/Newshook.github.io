<?php 
	/**
	 * Author Message section
	 */
	// Author Message section
	$wp_customize->add_section(
		'dreshion_blog_author',
		array(
			'title' => esc_html__( 'Author Message', 'dreshion-blog' ),
			'panel' => 'dreshion_blog_home_panel',
		)
	);

	// Fretured Post Section enable setting
	$wp_customize->add_setting(
		'dreshion_blog_author_section_enable',
		array(
			'sanitize_callback' => 'dreshion_blog_sanitize_checkbox',
			'default' => false,
		)
	);

	$wp_customize->add_control(
		'dreshion_blog_author_section_enable',
		array(
			'section'		=> 'dreshion_blog_author',
			'label'			=> esc_html__( 'Enable Author Message Section.', 'dreshion-blog' ),
			'type'			=> 'checkbox',
		)
	);

	// Author image setting
	$wp_customize->add_setting(
		'dreshion_blog_author_top_image',
		array(
			'sanitize_callback' => 'dreshion_blog_sanitize_image',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'dreshion_blog_author_top_image',
			array(
				'section'		=> 'dreshion_blog_author',
				'label'			=> esc_html__( 'Author Side Top Image:', 'dreshion-blog' ),
				'active_callback' => 'dreshion_blog_is_author_enable',
			)
		)
	);
	// Author image setting
	$wp_customize->add_setting(
		'dreshion_blog_author_bottom_image',
		array(
			'sanitize_callback' => 'dreshion_blog_sanitize_image',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'dreshion_blog_author_bottom_image',
			array(
				'section'		=> 'dreshion_blog_author',
				'label'			=> esc_html__( 'Author Side Bottom Image:', 'dreshion-blog' ),
				'active_callback' => 'dreshion_blog_is_author_enable',
			)
		)
	);

	// Author Message post setting
	$wp_customize->add_setting(
		'dreshion_blog_author_post',
		array(
			'sanitize_callback' => 'dreshion_blog_sanitize_dropdown_pages',
			'default' => 10,
		)
	);

	$wp_customize->add_control(
		'dreshion_blog_author_post',
		array(
			'section'		=> 'dreshion_blog_author',
			'label'			=> esc_html__( 'Post:', 'dreshion-blog' ),
			'active_callback' => 'dreshion_blog_is_author_enable',
			'type'			=> 'select',
			'choices'		=> dreshion_blog_get_post_choices(),
		)
	);
	?>