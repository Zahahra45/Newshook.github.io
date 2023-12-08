<?php 
	/**
	 * General settings
	 */
	// General settings
	$wp_customize->add_section(
		'dreshion_blog_general_section',
		array(
			'title' => esc_html__( 'General', 'dreshion-blog' ),
			'panel' => 'dreshion_blog_general_panel',
		)
	);
 

	// Breadcrumb enable setting
	$wp_customize->add_setting(
		'dreshion_blog_breadcrumb_enable',
		array(
			'sanitize_callback' => 'dreshion_blog_sanitize_checkbox',
			'default' => true,
		)
	);

	$wp_customize->add_control(
		'dreshion_blog_breadcrumb_enable',
		array(
			'section'		=> 'dreshion_blog_general_section',
			'label'			=> esc_html__( 'Enable breadcrumb.', 'dreshion-blog' ),
			'type'			=> 'checkbox',
		)
	);


?>