<?php

// Author Info Widget.
require get_template_directory() . '/inc/widgets/info-author-widget.php';

// Trending Posts Widgets.
require get_template_directory() . '/inc/widgets/trending-posts-widget.php';

// Categories Widgets.
require get_template_directory() . '/inc/widgets/categories-widget.php';

// Social Icons Widget.
require get_template_directory() . '/inc/widgets/social-icons-widget.php';

/**
 * Register Widgets
 */
function ascendoor_blog_register_widgets() {

	register_widget( 'Ascendoor_Blog_Author_Info_Widget' );

	register_widget( 'Ascendoor_Blog_Trending_Posts_Widget' );

	register_widget( 'Ascendoor_Blog_Categories_Widget' );

	register_widget( 'Ascendoor_Blog_Social_Icons_Widget' );

}
add_action( 'widgets_init', 'ascendoor_blog_register_widgets' );
