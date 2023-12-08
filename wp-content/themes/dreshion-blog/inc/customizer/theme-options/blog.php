<?php 
/**
	 * Blog/Archive section 
	 */
	// Blog/Archive section 
	$wp_customize->add_section(
		'dreshion_blog_archive_settings',
		array(
			'title' => esc_html__( 'Archive/Blog', 'dreshion-blog' ),
			'description' => esc_html__( 'Settings for archive pages including blog page too.', 'dreshion-blog' ),
			'panel' => 'dreshion_blog_general_panel',
		)
	);

	// Global archive layout setting
	$wp_customize->add_setting(
		'dreshion_blog_archive_content_type',
		array(
			'sanitize_callback' => 'dreshion_blog_sanitize_select',
			'default' => 'excerpt',
		)
	);

	$wp_customize->add_control(
		'dreshion_blog_archive_content_type',
		array(
			'section'		=> 'dreshion_blog_archive_settings',
			'label'			=> esc_html__( 'Archive Content Type', 'dreshion-blog' ),
			'type'			=> 'radio',
			'choices'		=> array( 
				'excerpt' => esc_html__( 'Excerpt Content', 'dreshion-blog' ), 
				'full-content' => esc_html__( 'Full Content', 'dreshion-blog' ), 
			),
		)
	);

	// Archive excerpt setting
	$wp_customize->add_setting(
		'dreshion_blog_archive_excerpt',
		array(
			'sanitize_callback' => 'sanitize_text_field',
			'default' => esc_html__( 'View the post', 'dreshion-blog' ),
		)
	);

	$wp_customize->add_control(
		'dreshion_blog_archive_excerpt',
		array(
			'section'		=> 'dreshion_blog_archive_settings',
			'label'			=> esc_html__( 'Excerpt more text:', 'dreshion-blog' ),
		)
	);
	
	// Archive excerpt length setting
	$wp_customize->add_setting(
		'dreshion_blog_archive_excerpt_length',
		array(
			'sanitize_callback' => 'dreshion_blog_sanitize_number_range',
			'default' => 75,
		)
	);

	$wp_customize->add_control(
		'dreshion_blog_archive_excerpt_length',
		array(
			'section'		=> 'dreshion_blog_archive_settings',
			'label'			=> esc_html__( 'Excerpt more length:', 'dreshion-blog' ),
			'type'			=> 'number',
			'input_attrs'   => array( 'min' => 5 ),
		)
	);

	// Tag enable setting
	$wp_customize->add_setting(
		'dreshion_blog_enable_archive_tag',
		array(
			'sanitize_callback' => 'dreshion_blog_sanitize_checkbox',
			'default' => true,
		)
	);

	$wp_customize->add_control(
		'dreshion_blog_enable_archive_tag',
		array(
			'section'		=> 'dreshion_blog_archive_settings',
			'label'			=> esc_html__( 'Enable tags.', 'dreshion-blog' ),
			'type'			=> 'checkbox',
		)
	);


	// Featured image enable setting
	$wp_customize->add_setting(
		'dreshion_blog_enable_archive_featured_img',
		array(
			'sanitize_callback' => 'dreshion_blog_sanitize_checkbox',
			'default' => true,
		)
	);

	$wp_customize->add_control(
		'dreshion_blog_enable_archive_featured_img',
		array(
			'section'		=> 'dreshion_blog_archive_settings',
			'label'			=> esc_html__( 'Enable featured image.', 'dreshion-blog' ),
			'type'			=> 'checkbox',
		)
	);

 ?>