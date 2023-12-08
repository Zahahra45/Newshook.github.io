<?php

/**
 * Active Callbacks
 *
 * @package Ascendoor Blog
 */

// Theme Options.
function ascendoor_blog_is_pagination_enabled( $control ) {
	return ( $control->manager->get_setting( 'ascendoor_blog_enable_pagination' )->value() );
}
function ascendoor_blog_is_breadcrumb_enabled( $control ) {
	return ( $control->manager->get_setting( 'ascendoor_blog_enable_breadcrumb' )->value() );
}

// Check if static home page is enabled.
function ascendoor_blog_is_static_homepage_enabled( $control ) {
	return ( 'page' === $control->manager->get_setting( 'show_on_front' )->value() );
}

// Banner Slider Section.
function ascendoor_blog_is_banner_slider_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'ascendoor_blog_enable_banner_section' )->value() );
}
function ascendoor_blog_is_banner_slider_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'ascendoor_blog_banner_slider_content_type' )->value();
	return ( ascendoor_blog_is_banner_slider_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function ascendoor_blog_is_banner_slider_section_and_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'ascendoor_blog_banner_slider_content_type' )->value();
	return ( ascendoor_blog_is_banner_slider_section_enabled( $control ) && ( 'category' === $content_type ) );
}

// Banner Section - Banner Tile Posts.
function ascendoor_blog_is_banner_tile_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'ascendoor_blog_banner_tile_content_type' )->value();
	return ( ascendoor_blog_is_banner_slider_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function ascendoor_blog_is_banner_tile_section_and_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'ascendoor_blog_banner_tile_content_type' )->value();
	return ( ascendoor_blog_is_banner_slider_section_enabled( $control ) && ( 'category' === $content_type ) );
}

// Categories Section
function ascendoor_blog_is_categories_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'ascendoor_blog_enable_categories_section' )->value() );
}
