<?php 
/**
	 * Sidebar Layout
	 */
	// Sidebar Layout
	$wp_customize->add_section(
		'dreshion_blog_global_layout',
		array(
			'title' => esc_html__( 'Global & Sidebar Layout', 'dreshion-blog' ),
			'panel' => 'dreshion_blog_general_panel',
		)
	);

	// Sidebar archive layout setting
	$wp_customize->add_setting(
		'dreshion_blog_archive_sidebar',
		array(
			'sanitize_callback' => 'dreshion_blog_sanitize_select',
			'default' => 'right',
		)
	);

	$wp_customize->add_control(
		'dreshion_blog_archive_sidebar',
		array(
			'section'		=> 'dreshion_blog_global_layout',
			'label'			=> esc_html__( 'Archive Sidebar', 'dreshion-blog' ),
			'description'			=> esc_html__( 'This option works on all archive pages like: 404, search, date, category and so on.', 'dreshion-blog' ),
			'type'			=> 'radio',
			'choices'		=> array(  
				'right' => esc_html__( 'Right', 'dreshion-blog' ), 
				'no' => esc_html__( 'No Sidebar', 'dreshion-blog' ), 
			),
		)
	);

	// Blog layout setting
	$wp_customize->add_setting(
		'dreshion_blog_blog_sidebar',
		array(
			'sanitize_callback' => 'dreshion_blog_sanitize_select',
			'default' => 'right',
		)
	);

	$wp_customize->add_control(
		'dreshion_blog_blog_sidebar',
		array(
			'section'		=> 'dreshion_blog_global_layout',
			'label'			=> esc_html__( 'Blog Sidebar', 'dreshion-blog' ),
			'description'			=> esc_html__( 'This option works on blog and "Your latest posts"', 'dreshion-blog' ),
			'type'			=> 'radio',
			'choices'		=> array(  
				'right' => esc_html__( 'Right', 'dreshion-blog' ), 
				'no' => esc_html__( 'No Sidebar', 'dreshion-blog' ), 
			),
		)
	);

	// Sidebar page layout setting
	$wp_customize->add_setting(
		'dreshion_blog_global_page_layout',
		array(
			'sanitize_callback' => 'dreshion_blog_sanitize_select',
			'default' => 'right',
		)
	);

	$wp_customize->add_control(
		'dreshion_blog_global_page_layout',
		array(
			'section'		=> 'dreshion_blog_global_layout',
			'label'			=> esc_html__( 'Sidebar page sidebar', 'dreshion-blog' ),
			'description'			=> esc_html__( 'This option works only on single pages including "Posts page". This setting can be overridden for single page from the metabox too.', 'dreshion-blog' ),
			'type'			=> 'radio',
			'choices'		=> array(   
				'right' => esc_html__( 'Right', 'dreshion-blog' ), 
				'no' => esc_html__( 'No Sidebar', 'dreshion-blog' ), 
			),
		)
	);

	// Sidebar post layout setting
	$wp_customize->add_setting(
		'dreshion_blog_global_post_layout',
		array(
			'sanitize_callback' => 'dreshion_blog_sanitize_select',
			'default' => 'right',
		)
	);

	$wp_customize->add_control(
		'dreshion_blog_global_post_layout',
		array(
			'section'		=> 'dreshion_blog_global_layout',
			'label'			=> esc_html__( 'Sidebar post sidebar', 'dreshion-blog' ),
			'description'			=> esc_html__( 'This option works only on single posts. This setting can be overridden for single post from the metabox too.', 'dreshion-blog' ),
			'type'			=> 'radio',
			'choices'		=> array(  
				'right' => esc_html__( 'Right', 'dreshion-blog' ), 
				'no' => esc_html__( 'No Sidebar', 'dreshion-blog' ), 
			),
		)
	);
 ?>