<?php
/**
 * Sidebar Position
 *
 * @package Ascendoor Blog
 */

$wp_customize->add_section(
	'ascendoor_blog_sidebar_position',
	array(
		'title' => esc_html__( 'Sidebar Position', 'ascendoor-blog' ),
		'panel' => 'ascendoor_blog_theme_options',
	)
);

// Sidebar Position - Global Sidebar Position.
$wp_customize->add_setting(
	'ascendoor_blog_sidebar_position',
	array(
		'sanitize_callback' => 'ascendoor_blog_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'ascendoor_blog_sidebar_position',
	array(
		'label'   => esc_html__( 'Global Sidebar Position', 'ascendoor-blog' ),
		'section' => 'ascendoor_blog_sidebar_position',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'ascendoor-blog' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'ascendoor-blog' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'ascendoor-blog' ),
		),
	)
);

// Sidebar Position - Post Sidebar Position.
$wp_customize->add_setting(
	'ascendoor_blog_post_sidebar_position',
	array(
		'sanitize_callback' => 'ascendoor_blog_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'ascendoor_blog_post_sidebar_position',
	array(
		'label'   => esc_html__( 'Post Sidebar Position', 'ascendoor-blog' ),
		'section' => 'ascendoor_blog_sidebar_position',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'ascendoor-blog' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'ascendoor-blog' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'ascendoor-blog' ),
		),
	)
);

// Sidebar Position - Page Sidebar Position.
$wp_customize->add_setting(
	'ascendoor_blog_page_sidebar_position',
	array(
		'sanitize_callback' => 'ascendoor_blog_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'ascendoor_blog_page_sidebar_position',
	array(
		'label'   => esc_html__( 'Page Sidebar Position', 'ascendoor-blog' ),
		'section' => 'ascendoor_blog_sidebar_position',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'ascendoor-blog' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'ascendoor-blog' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'ascendoor-blog' ),
		),
	)
);
