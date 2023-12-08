<?php /**
	 * Single pages setting section 
	 */
	// Single pages setting section 
	$wp_customize->add_section(
		'dreshion_blog_single_page_settings',
		array(
			'title' => esc_html__( 'Single Pages', 'dreshion-blog' ),
			'description' => esc_html__( 'Settings for all single pages.', 'dreshion-blog' ),
			'panel' => 'dreshion_blog_general_panel',
		)
	);

	// Author enable setting
	$wp_customize->add_setting(
		'dreshion_blog_enable_single_page_author',
		array(
			'sanitize_callback' => 'dreshion_blog_sanitize_checkbox',
			'default' => false,
		)
	);

	$wp_customize->add_control(
		'dreshion_blog_enable_single_page_author',
		array(
			'section'		=> 'dreshion_blog_single_page_settings',
			'label'			=> esc_html__( 'Enable Page Author.', 'dreshion-blog' ),
			'type'			=> 'checkbox',
		)
	);


	// Pagination enable setting
	$wp_customize->add_setting(
		'dreshion_blog_enable_single_page_pagination',
		array(
			'sanitize_callback' => 'dreshion_blog_sanitize_checkbox',
			'default' => false,
		)
	);

	$wp_customize->add_control(
		'dreshion_blog_enable_single_page_pagination',
		array(
			'section'		=> 'dreshion_blog_single_page_settings',
			'label'			=> esc_html__( 'Enable pagination.', 'dreshion-blog' ),
			'type'			=> 'checkbox',
		)
	);
?>