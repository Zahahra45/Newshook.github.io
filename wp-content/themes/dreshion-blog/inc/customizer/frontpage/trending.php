<?php
/**
	 * Trending section
	 */
	// Trending section
	$wp_customize->add_section(
		'dreshion_blog_trending',
		array(
			'title' => esc_html__( 'Trending Section', 'dreshion-blog' ),
			'panel' => 'dreshion_blog_home_panel',
		)
	);

	// Trending Section enable setting
	$wp_customize->add_setting(
		'dreshion_blog_trending_section_enable',
		array(
			'sanitize_callback' => 'dreshion_blog_sanitize_checkbox',
			'default' => false,
		)
	);

	$wp_customize->add_control(
		'dreshion_blog_trending_section_enable',
		array(
			'section'		=> 'dreshion_blog_trending',
			'label'			=> esc_html__( 'Enable Trending Section.', 'dreshion-blog' ),
			'type'			=> 'checkbox',
		)
	);
		// Trending custom content setting
	$wp_customize->add_setting(
		'dreshion_blog_trending_section_title',
		array(
			'sanitize_callback' => 'sanitize_text_field',
			'default' => $default['dreshion_blog_trending_section_title'],
		)
	);

	$wp_customize->add_control(
		'dreshion_blog_trending_section_title',
		array(
			'section'		=> 'dreshion_blog_trending',
			'label'			=> esc_html__( 'Section Title ', 'dreshion-blog' ),
			'active_callback' => 'dreshion_blog_is_trending_enable',
			'type'			=> 'text'
		)
	);

	// Trending number setting
	$wp_customize->add_setting(
		'dreshion_blog_trending_num',
		array(
			'sanitize_callback' => 'dreshion_blog_sanitize_number_range',
			'default' => 3,
		)
	);

	$wp_customize->add_control(
		'dreshion_blog_trending_num',
		array(
			'section'		=> 'dreshion_blog_trending',
			'label'			=> esc_html__( 'Number of trending:', 'dreshion-blog' ),
			'description'			=> esc_html__( 'Min: 1 | Max: 6| Max: Unlimited(Pro)', 'dreshion-blog' ),
			'active_callback' => 'dreshion_blog_is_trending_enable',
			'type'			=> 'number',
			'input_attrs'	=> array( 'min' => 1, 'step'   => 1, 'max'   => 6 ),
		)
	);

	$trending_num = get_theme_mod( 'dreshion_blog_trending_num', 3 );
	for ( $i=1; $i <= $trending_num; $i++ ) { 

		// Trending post setting
		$wp_customize->add_setting(
			'dreshion_blog_trending_post_' . $i,
			array(
				'sanitize_callback' => 'dreshion_blog_sanitize_dropdown_pages',
			)
		);

		$wp_customize->add_control(
			'dreshion_blog_trending_post_' . $i,
			array(
				'section'		=> 'dreshion_blog_trending',
				'label'			=> esc_html__( 'Post ', 'dreshion-blog' ) . $i,
				'active_callback' => 'dreshion_blog_is_trending_enable',
				'type'			=> 'select',
				'choices'		=> dreshion_blog_get_post_choices(),
			)
		);
	}
?>