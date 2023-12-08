<?php
/**
 * Banner Section
 *
 * @package Ascendoor Blog
 */

$wp_customize->add_section(
	'ascendoor_blog_banner_section',
	array(
		'panel' => 'ascendoor_blog_front_page_options',
		'title' => esc_html__( 'Banner Section', 'ascendoor-blog' ),
	)
);

// Banner Section - Enable Section.
$wp_customize->add_setting(
	'ascendoor_blog_enable_banner_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'ascendoor_blog_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ascendoor_Blog_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ascendoor_blog_enable_banner_section',
		array(
			'label'    => esc_html__( 'Enable Banner Section', 'ascendoor-blog' ),
			'section'  => 'ascendoor_blog_banner_section',
			'settings' => 'ascendoor_blog_enable_banner_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'ascendoor_blog_enable_banner_section',
		array(
			'selector' => '#ascendoor_blog_banner_section .section-link',
			'settings' => 'ascendoor_blog_enable_banner_section',
		)
	);
}

// Banner Section - Banner Slider Content Type.
$wp_customize->add_setting(
	'ascendoor_blog_banner_slider_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'ascendoor_blog_sanitize_select',
	)
);

$wp_customize->add_control(
	'ascendoor_blog_banner_slider_content_type',
	array(
		'label'           => esc_html__( 'Select Content Type', 'ascendoor-blog' ),
		'section'         => 'ascendoor_blog_banner_section',
		'settings'        => 'ascendoor_blog_banner_slider_content_type',
		'type'            => 'select',
		'active_callback' => 'ascendoor_blog_is_banner_slider_section_enabled',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'ascendoor-blog' ),
			'category' => esc_html__( 'Category', 'ascendoor-blog' ),
		),
	)
);

for ( $i = 1; $i <= 3; $i++ ) {
	// Banner Section - Select Banner Post.
	$wp_customize->add_setting(
		'ascendoor_blog_banner_slider_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'ascendoor_blog_banner_slider_content_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Post %d', 'ascendoor-blog' ), $i ),
			'section'         => 'ascendoor_blog_banner_section',
			'settings'        => 'ascendoor_blog_banner_slider_content_post_' . $i,
			'active_callback' => 'ascendoor_blog_is_banner_slider_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => ascendoor_blog_get_post_choices(),
		)
	);

}

// Banner Section - Select Banner Category.
$wp_customize->add_setting(
	'ascendoor_blog_banner_slider_content_category',
	array(
		'sanitize_callback' => 'ascendoor_blog_sanitize_select',
	)
);

$wp_customize->add_control(
	'ascendoor_blog_banner_slider_content_category',
	array(
		'label'           => esc_html__( 'Select Category', 'ascendoor-blog' ),
		'section'         => 'ascendoor_blog_banner_section',
		'settings'        => 'ascendoor_blog_banner_slider_content_category',
		'active_callback' => 'ascendoor_blog_is_banner_slider_section_and_content_type_category_enabled',
		'type'            => 'select',
		'choices'         => ascendoor_blog_get_post_cat_choices(),
	)
);

// Banner Section - Horizontal Line.
$wp_customize->add_setting(
	'ascendoor_blog_banner_horizontal_line',
	array(
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Ascendoor_Blog_Customize_Horizontal_Line(
		$wp_customize,
		'ascendoor_blog_banner_horizontal_line',
		array(
			'section'         => 'ascendoor_blog_banner_section',
			'settings'        => 'ascendoor_blog_banner_horizontal_line',
			'active_callback' => 'ascendoor_blog_is_banner_slider_section_enabled',
			'type'            => 'hr',
		)
	)
);

// Banner Section - Banner Tile Content Type.
$wp_customize->add_setting(
	'ascendoor_blog_banner_tile_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'ascendoor_blog_sanitize_select',
	)
);

$wp_customize->add_control(
	'ascendoor_blog_banner_tile_content_type',
	array(
		'label'           => esc_html__( 'Select Content Type', 'ascendoor-blog' ),
		'section'         => 'ascendoor_blog_banner_section',
		'settings'        => 'ascendoor_blog_banner_tile_content_type',
		'type'            => 'select',
		'active_callback' => 'ascendoor_blog_is_banner_slider_section_enabled',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'ascendoor-blog' ),
			'category' => esc_html__( 'Category', 'ascendoor-blog' ),
		),
	)
);

for ( $i = 1; $i <= 4; $i++ ) {
	// Banner Section - Select Banner Tile Post.
	$wp_customize->add_setting(
		'ascendoor_blog_banner_tile_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'ascendoor_blog_banner_tile_content_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Post %d', 'ascendoor-blog' ), $i ),
			'section'         => 'ascendoor_blog_banner_section',
			'settings'        => 'ascendoor_blog_banner_tile_content_post_' . $i,
			'active_callback' => 'ascendoor_blog_is_banner_tile_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => ascendoor_blog_get_post_choices(),
		)
	);

}

// Banner Section - Select Banner Category.
$wp_customize->add_setting(
	'ascendoor_blog_banner_tile_content_category',
	array(
		'sanitize_callback' => 'ascendoor_blog_sanitize_select',
	)
);

$wp_customize->add_control(
	'ascendoor_blog_banner_tile_content_category',
	array(
		'label'           => esc_html__( 'Select Category', 'ascendoor-blog' ),
		'section'         => 'ascendoor_blog_banner_section',
		'settings'        => 'ascendoor_blog_banner_tile_content_category',
		'active_callback' => 'ascendoor_blog_is_banner_tile_section_and_content_type_category_enabled',
		'type'            => 'select',
		'choices'         => ascendoor_blog_get_post_cat_choices(),
	)
);
