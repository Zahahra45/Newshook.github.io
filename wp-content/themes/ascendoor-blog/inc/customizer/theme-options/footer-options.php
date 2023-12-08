<?php
/**
 * Footer Options
 *
 * @package Ascendoor Blog
 */

$wp_customize->add_section(
	'ascendoor_blog_footer_options',
	array(
		'panel' => 'ascendoor_blog_theme_options',
		'title' => esc_html__( 'Footer Options', 'ascendoor-blog' ),
	)
);

// Footer Options - Copyright Text.
/* translators: 1: Year, 2: Site Title with home URL. */
$copyright_default = sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s', '1: Year, 2: Site Title with home URL', 'ascendoor-blog' ), '[the-year]', '[site-link]' );
$wp_customize->add_setting(
	'ascendoor_blog_footer_copyright_text',
	array(
		'default'           => $copyright_default,
		'sanitize_callback' => 'wp_kses_post',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control(
	'ascendoor_blog_footer_copyright_text',
	array(
		'label'    => esc_html__( 'Copyright Text', 'ascendoor-blog' ),
		'section'  => 'ascendoor_blog_footer_options',
		'settings' => 'ascendoor_blog_footer_copyright_text',
		'type'     => 'textarea',
	)
);

// Footer Options - Scroll Top.
$wp_customize->add_setting(
	'ascendoor_blog_scroll_top',
	array(
		'sanitize_callback' => 'ascendoor_blog_sanitize_switch',
		'default'           => true,
	)
);

$wp_customize->add_control(
	new Ascendoor_Blog_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ascendoor_blog_scroll_top',
		array(
			'label'   => esc_html__( 'Enable Scroll Top Button', 'ascendoor-blog' ),
			'section' => 'ascendoor_blog_footer_options',
		)
	)
);
