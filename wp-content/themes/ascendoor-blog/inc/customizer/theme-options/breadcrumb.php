<?php
/**
 * Breadcrumb
 *
 * @package Ascendoor Blog
 */

$wp_customize->add_section(
	'ascendoor_blog_breadcrumb',
	array(
		'title' => esc_html__( 'Breadcrumb', 'ascendoor-blog' ),
		'panel' => 'ascendoor_blog_theme_options',
	)
);

// Breadcrumb - Enable Breadcrumb.
$wp_customize->add_setting(
	'ascendoor_blog_enable_breadcrumb',
	array(
		'sanitize_callback' => 'ascendoor_blog_sanitize_switch',
		'default'           => true,
	)
);

$wp_customize->add_control(
	new Ascendoor_Blog_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ascendoor_blog_enable_breadcrumb',
		array(
			'label'   => esc_html__( 'Enable Breadcrumb', 'ascendoor-blog' ),
			'section' => 'ascendoor_blog_breadcrumb',
		)
	)
);

// Breadcrumb - Separator.
$wp_customize->add_setting(
	'ascendoor_blog_breadcrumb_separator',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '/',
	)
);

$wp_customize->add_control(
	'ascendoor_blog_breadcrumb_separator',
	array(
		'label'           => esc_html__( 'Separator', 'ascendoor-blog' ),
		'active_callback' => 'ascendoor_blog_is_breadcrumb_enabled',
		'section'         => 'ascendoor_blog_breadcrumb',
	)
);
