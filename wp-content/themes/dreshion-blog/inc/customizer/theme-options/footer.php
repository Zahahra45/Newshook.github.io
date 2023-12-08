<?php /**
	 *
	 *
	 * Footer copyright
	 *
	 *
	 */
	// Footer copyright
	$wp_customize->add_section(
		'dreshion_blog_footer_section',
		array(
			'title' => esc_html__( 'Footer', 'dreshion-blog' ),
			'priority' => 106,
			'panel' => 'dreshion_blog_general_panel',
		)
	);

	// Footer social menu enable setting
	$wp_customize->add_setting(
		'dreshion_blog_back_to_top_enable',
		array(
			'sanitize_callback' => 'dreshion_blog_sanitize_checkbox',
			'default' => true,
		)
	);

	$wp_customize->add_control(
		'dreshion_blog_back_to_top_enable',
		array(
			'section'		=> 'dreshion_blog_footer_section',
			'label'			=> esc_html__( 'Enable Back To Top.', 'dreshion-blog' ),
			'type'			=> 'checkbox',
		)
	);

	// Footer copyright setting
	$wp_customize->add_setting(
		'dreshion_blog_copyright_txt',
		array(
			'sanitize_callback' => 'dreshion_blog_sanitize_html',
			'default' => $default['dreshion_blog_copyright_txt'],
		)
	);

	$wp_customize->add_control(
		'dreshion_blog_copyright_txt',
		array(
			'section'		=> 'dreshion_blog_footer_section',
			'label'			=> esc_html__( 'Copyright text:', 'dreshion-blog' ),
			'type'			=> 'textarea',
			
		)
	);
 ?>