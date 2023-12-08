<?php
/**
 * Front Page Options
 *
 * @package Ascendoor Blog
 */

$wp_customize->add_panel(
	'ascendoor_blog_front_page_options',
	array(
		'title'    => esc_html__( 'Front Page Options', 'ascendoor-blog' ),
		'priority' => 130,
	)
);

// Banner Section.
require get_template_directory() . '/inc/customizer/front-page-options/banner.php';

// Categories Section.
require get_template_directory() . '/inc/customizer/front-page-options/categories.php';
