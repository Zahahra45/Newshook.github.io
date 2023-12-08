<?php 
	/**
	 * Single setting section 
	 */
	// Single setting section 
	$wp_customize->add_section(
		'dreshion_blog_single_settings',
		array(
			'title' => esc_html__( 'Single Posts', 'dreshion-blog' ),
			'description' => esc_html__( 'Settings for all single posts.', 'dreshion-blog' ),
			'panel' => 'dreshion_blog_general_panel',
		)
	);

	// Category enable setting
	$wp_customize->add_setting(
		'dreshion_blog_enable_single_category',
		array(
			'sanitize_callback' => 'dreshion_blog_sanitize_checkbox',
			'default' => true,
		)
	);

	$wp_customize->add_control(
		'dreshion_blog_enable_single_category',
		array(
			'section'		=> 'dreshion_blog_single_settings',
			'label'			=> esc_html__( 'Enable categories.', 'dreshion-blog' ),
			'type'			=> 'checkbox',
		)
	);

	// Date enable setting
	$wp_customize->add_setting(
		'dreshion_blog_enable_single_date',
		array(
			'sanitize_callback' => 'dreshion_blog_sanitize_checkbox',
			'default' => true,
		)
	);

	$wp_customize->add_control(
		'dreshion_blog_enable_single_date',
		array(
			'section'		=> 'dreshion_blog_single_settings',
			'label'			=> esc_html__( 'Enable Date.', 'dreshion-blog' ),
			'type'			=> 'checkbox',
		)
	);

	// Tag enable setting
	$wp_customize->add_setting(
		'dreshion_blog_enable_single_tag',
		array(
			'sanitize_callback' => 'dreshion_blog_sanitize_checkbox',
			'default' => true,
		)
	);

	$wp_customize->add_control(
		'dreshion_blog_enable_single_tag',
		array(
			'section'		=> 'dreshion_blog_single_settings',
			'label'			=> esc_html__( 'Enable tags.', 'dreshion-blog' ),
			'type'			=> 'checkbox',
		)
	);
?>