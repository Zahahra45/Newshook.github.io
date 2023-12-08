<?php
/**
 * Theme Options
 *
 * @package Ascendoor Blog
 */

$wp_customize->add_panel(
	'ascendoor_blog_theme_options',
	array(
		'title'    => esc_html__( 'Theme Options', 'ascendoor-blog' ),
		'priority' => 130,
	)
);

// Typography.
require get_template_directory() . '/inc/customizer/theme-options/typography.php';

// Excerpt.
require get_template_directory() . '/inc/customizer/theme-options/excerpt.php';

// Breadcrumb.
require get_template_directory() . '/inc/customizer/theme-options/breadcrumb.php';

// Readmore Button.
require get_template_directory() . '/inc/customizer/theme-options/readmore-button.php';

// Sidebar Position.
require get_template_directory() . '/inc/customizer/theme-options/sidebar-position.php';

// Post Options.
require get_template_directory() . '/inc/customizer/theme-options/post-options.php';

// Pagination.
require get_template_directory() . '/inc/customizer/theme-options/pagination.php';

// Footer Options.
require get_template_directory() . '/inc/customizer/theme-options/footer-options.php';
