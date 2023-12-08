<?php
/**
 * Typography
 *
 * @package Ascendoor Blog
 */

$wp_customize->add_section(
	'ascendoor_blog_typography',
	array(
		'panel' => 'ascendoor_blog_theme_options',
		'title' => esc_html__( 'Typography', 'ascendoor-blog' ),
	)
);

// Typography - Site Title Font.
$wp_customize->add_setting(
	'ascendoor_blog_site_title_font',
	array(
		'default'           => 'KoHo',
		'sanitize_callback' => 'ascendoor_blog_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'ascendoor_blog_site_title_font',
	array(
		'label'    => esc_html__( 'Site Title Font Family', 'ascendoor-blog' ),
		'section'  => 'ascendoor_blog_typography',
		'settings' => 'ascendoor_blog_site_title_font',
		'type'     => 'select',
		'choices'  => ascendoor_blog_get_all_google_font_families(),
	)
);

// Typography - Site Description Font.
$wp_customize->add_setting(
	'ascendoor_blog_site_description_font',
	array(
		'default'           => 'Comfortaa',
		'sanitize_callback' => 'ascendoor_blog_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'ascendoor_blog_site_description_font',
	array(
		'label'    => esc_html__( 'Site Description Font Family', 'ascendoor-blog' ),
		'section'  => 'ascendoor_blog_typography',
		'settings' => 'ascendoor_blog_site_description_font',
		'type'     => 'select',
		'choices'  => ascendoor_blog_get_all_google_font_families(),
	)
);

// Typography - Header Font.
$wp_customize->add_setting(
	'ascendoor_blog_header_font',
	array(
		'default'           => 'Poppins',
		'sanitize_callback' => 'ascendoor_blog_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'ascendoor_blog_header_font',
	array(
		'label'    => esc_html__( 'Header Font Family', 'ascendoor-blog' ),
		'section'  => 'ascendoor_blog_typography',
		'settings' => 'ascendoor_blog_header_font',
		'type'     => 'select',
		'choices'  => ascendoor_blog_get_all_google_font_families(),
	)
);

// Typography - Body Font.
$wp_customize->add_setting(
	'ascendoor_blog_body_font',
	array(
		'default'           => 'Inter',
		'sanitize_callback' => 'ascendoor_blog_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'ascendoor_blog_body_font',
	array(
		'label'    => esc_html__( 'Body Font Family', 'ascendoor-blog' ),
		'section'  => 'ascendoor_blog_typography',
		'settings' => 'ascendoor_blog_body_font',
		'type'     => 'select',
		'choices'  => ascendoor_blog_get_all_google_font_families(),
	)
);
