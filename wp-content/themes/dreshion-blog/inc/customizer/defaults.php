<?php
/**
 * Shadow Themes Customizer
 *
 * @package Shadow Themes
 */

/**
 * Get all the default values of the theme mods.
 */
function dreshion_blog_get_default_mods() {
	$dreshion_blog_default_mods = array(
		// Sliders
		'dreshion_blog_slider_custom_title' => esc_html__( 'We carve design in most  possible beautiful way.', 'dreshion-blog'),
		'dreshion_blog_slider_custom_content' => esc_html__( 'Your time is limited, so don’t waste it living someone else’s life. Don’t be trapped by dogma – which is living with the results of other people’s thinking.', 'dreshion-blog'),
		'dreshion_blog_slider_custom_btn' => esc_html__( 'Know More', 'dreshion-blog' ),
		'dreshion_blog_slider_custom_subtitle' => esc_html__( 'Lorem Ipsum is simply dummy text.', 'dreshion-blog' ),
		'dreshion_blog_featured_slider_dot_enable'		=> true,
		'dreshion_blog_featured_slider_fade_enable'		=> false,
		'dreshion_blog_featured_slider_autoplay_enable'		=> true,
		'dreshion_blog_featured_slider_infinite_enable'		=> true,

		// Trending
		'dreshion_blog_trending_section_title' => esc_html__( 'The Art Of FASHION', 'dreshion-blog' ),
		'dreshion_blog_trending_custom_content' => esc_html__( 'Your time is limited, so don’t waste it living someone else’s life. Don’t be trapped by dogma – which is living with the results of other people’s thinking.', 'dreshion-blog' ),
		'dreshion_blog_trending_dot_enable'		=> true,
		'dreshion_blog_trending_fade_enable'		=> false,
		'dreshion_blog_trending_autoplay_enable'		=> true,
		'dreshion_blog_trending_infinite_enable'		=> true,



		// Recent posts
		'dreshion_blog_recent_posts_more' => esc_html__( 'See More', 'dreshion-blog' ),

		// Footer copyright
		'dreshion_blog_copyright_txt' => sprintf( esc_html__( 'Theme: %1$s by %2$s.', 'dreshion-blog' ), 'Dreshion', '<a href="' . esc_url( 'http://shadowthemes.com/' ) . '">Shadow Themes</a>' ),

		
	);

	return apply_filters( 'dreshion_blog_default_mods', $dreshion_blog_default_mods );
}