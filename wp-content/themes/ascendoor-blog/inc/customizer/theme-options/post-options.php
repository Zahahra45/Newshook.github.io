<?php
/**
 * Post Options
 *
 * @package Ascendoor Blog
 */

$wp_customize->add_section(
	'ascendoor_blog_post_options',
	array(
		'title' => esc_html__( 'Post Options', 'ascendoor-blog' ),
		'panel' => 'ascendoor_blog_theme_options',
	)
);

// Post Options - Hide Date.
$wp_customize->add_setting(
	'ascendoor_blog_post_hide_date',
	array(
		'default'           => false,
		'sanitize_callback' => 'ascendoor_blog_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ascendoor_Blog_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ascendoor_blog_post_hide_date',
		array(
			'label'   => esc_html__( 'Hide Date', 'ascendoor-blog' ),
			'section' => 'ascendoor_blog_post_options',
		)
	)
);

// Post Options - Hide Author.
$wp_customize->add_setting(
	'ascendoor_blog_post_hide_author',
	array(
		'default'           => false,
		'sanitize_callback' => 'ascendoor_blog_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ascendoor_Blog_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ascendoor_blog_post_hide_author',
		array(
			'label'   => esc_html__( 'Hide Author', 'ascendoor-blog' ),
			'section' => 'ascendoor_blog_post_options',
		)
	)
);

// Post Options - Hide Category.
$wp_customize->add_setting(
	'ascendoor_blog_post_hide_category',
	array(
		'default'           => false,
		'sanitize_callback' => 'ascendoor_blog_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ascendoor_Blog_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ascendoor_blog_post_hide_category',
		array(
			'label'   => esc_html__( 'Hide Category', 'ascendoor-blog' ),
			'section' => 'ascendoor_blog_post_options',
		)
	)
);

// Post Options - Hide Tag.
$wp_customize->add_setting(
	'ascendoor_blog_post_hide_tags',
	array(
		'default'           => false,
		'sanitize_callback' => 'ascendoor_blog_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ascendoor_Blog_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ascendoor_blog_post_hide_tags',
		array(
			'label'   => esc_html__( 'Hide Tag', 'ascendoor-blog' ),
			'section' => 'ascendoor_blog_post_options',
		)
	)
);

// Post Options - Related Post Label.
$wp_customize->add_setting(
	'ascendoor_blog_post_related_post_label',
	array(
		'default'           => __( 'Related Posts', 'ascendoor-blog' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'ascendoor_blog_post_related_post_label',
	array(
		'label'    => esc_html__( 'Related Posts Label', 'ascendoor-blog' ),
		'section'  => 'ascendoor_blog_post_options',
		'settings' => 'ascendoor_blog_post_related_post_label',
		'type'     => 'text',
	)
);


