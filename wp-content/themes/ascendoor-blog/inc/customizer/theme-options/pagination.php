<?php
/**
 * Pagination
 *
 * @package Ascendoor Blog
 */

$wp_customize->add_section(
	'ascendoor_blog_pagination',
	array(
		'panel' => 'ascendoor_blog_theme_options',
		'title' => esc_html__( 'Pagination', 'ascendoor-blog' ),
	)
);

// Pagination - Enable Pagination.
$wp_customize->add_setting(
	'ascendoor_blog_enable_pagination',
	array(
		'default'           => true,
		'sanitize_callback' => 'ascendoor_blog_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ascendoor_Blog_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ascendoor_blog_enable_pagination',
		array(
			'label'    => esc_html__( 'Enable Pagination', 'ascendoor-blog' ),
			'section'  => 'ascendoor_blog_pagination',
			'settings' => 'ascendoor_blog_enable_pagination',
			'type'     => 'checkbox',
		)
	)
);

// Pagination - Pagination Type.
$wp_customize->add_setting(
	'ascendoor_blog_pagination_type',
	array(
		'default'           => 'default',
		'sanitize_callback' => 'ascendoor_blog_sanitize_select',
	)
);

$wp_customize->add_control(
	'ascendoor_blog_pagination_type',
	array(
		'label'           => esc_html__( 'Pagination Type', 'ascendoor-blog' ),
		'section'         => 'ascendoor_blog_pagination',
		'settings'        => 'ascendoor_blog_pagination_type',
		'active_callback' => 'ascendoor_blog_is_pagination_enabled',
		'type'            => 'select',
		'choices'         => array(
			'default' => __( 'Default (Older/Newer)', 'ascendoor-blog' ),
			'numeric' => __( 'Numeric', 'ascendoor-blog' ),
		),
	)
);
