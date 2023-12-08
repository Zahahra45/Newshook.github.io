<?php
/**
 * Excerpt
 *
 * @package Ascendoor Blog
 */

$wp_customize->add_section(
	'ascendoor_blog_excerpt_options',
	array(
		'panel' => 'ascendoor_blog_theme_options',
		'title' => esc_html__( 'Excerpt', 'ascendoor-blog' ),
	)
);

// Excerpt - Excerpt Length.
$wp_customize->add_setting(
	'ascendoor_blog_excerpt_length',
	array(
		'default'           => 20,
		'sanitize_callback' => 'ascendoor_blog_sanitize_number_range',
		'validate_callback' => 'ascendoor_blog_validate_excerpt_length',
	)
);

$wp_customize->add_control(
	'ascendoor_blog_excerpt_length',
	array(
		'label'       => esc_html__( 'Excerpt Length (no. of words)', 'ascendoor-blog' ),
		'description' => esc_html__( 'Note: Min 1 & Max 100. Please input the valid number and save. Then refresh the page to see the change.', 'ascendoor-blog' ),
		'section'     => 'ascendoor_blog_excerpt_options',
		'settings'    => 'ascendoor_blog_excerpt_length',
		'type'        => 'number',
		'input_attrs' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
		),
	)
);
