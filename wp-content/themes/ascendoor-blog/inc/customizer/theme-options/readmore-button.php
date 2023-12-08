<?php
/**
 * Read More Button
 *
 * @package Ascendoor Blog
 */

$wp_customize->add_section(
	'ascendoor_blog_readmore_button_setting',
	array(
		'title' => esc_html__( 'Read More Button', 'ascendoor-blog' ),
		'panel' => 'ascendoor_blog_theme_options',
	)
);

// Read More Button - Button label.
$wp_customize->add_setting(
	'ascendoor_blog_readmore_button_label',
	array(
		'default'           => __( 'Read More', 'ascendoor-blog' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'ascendoor_blog_readmore_button_label',
	array(
		'label'    => esc_html__( 'Read More Button label', 'ascendoor-blog' ),
		'section'  => 'ascendoor_blog_readmore_button_setting',
		'settings' => 'ascendoor_blog_readmore_button_label',
		'type'     => 'text',
	)
);
