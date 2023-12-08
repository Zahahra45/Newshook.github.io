<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Shadow Themes
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function dreshion_blog_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

  // When  color scheme is light or dark.
  $menu_sticky = get_theme_mod( 'dreshion_blog_make_menu_sticky', false );
  if (true==$menu_sticky) {  
    $classes[] = 'menu-sticky'; 
  }

	// When  color scheme is light or dark.
	$text_hover = get_theme_mod( 'dreshion_blog_text_hover_type', 'hover-default' );
	$classes[] = esc_attr( $text_hover );

  // When  color scheme is light or dark.
  $btn_hover = get_theme_mod( 'dreshion_blog_btn_hover_type', 'btn-hover-default' );
  $classes[] = esc_attr( $btn_hover );
  $classes[] = 'archive-three';

	
	// When global archive layout is checked.
	if ( is_archive() || is_404() || is_search() ) {
		

    $archive_sidebar = get_theme_mod( 'dreshion_blog_archive_sidebar', 'right' ); 
		$classes[] = esc_attr( $archive_sidebar ) . '-sidebar';   

  } elseif ( dreshion_blog_is_frontpage_blog() || dreshion_blog_is_latest_posts() ) { // When global post sidebar is checked.
    $page_id = get_option( 'page_for_posts' );
      $dreshion_blog_page_sidebar_meta = get_post_meta( $page_id, 'dreshion-blog-select-sidebar', true);
      if ( ! empty( $dreshion_blog_page_sidebar_meta ) ) {
        $classes[] = esc_attr( $dreshion_blog_page_sidebar_meta ) . '-sidebar';
        } else {
        $blog_post_sidebar = get_theme_mod( 'dreshion_blog_blog_sidebar', 'right' ); 
        $classes[] = esc_attr( $blog_post_sidebar ) . '-sidebar';
      }
  } elseif ( is_single() ) { // When global post sidebar is checked.
    	$dreshion_blog_post_sidebar_meta = get_post_meta( get_the_ID(), 'dreshion-blog-select-sidebar', true );
    	if ( ! empty( $dreshion_blog_post_sidebar_meta ) ) {
			$classes[] = esc_attr( $dreshion_blog_post_sidebar_meta ) . '-sidebar';
    	} else {
			$global_post_sidebar = get_theme_mod( 'dreshion_blog_global_post_layout', 'no' ); 
			$classes[] = esc_attr( $global_post_sidebar ) . '-sidebar';
    	}
	} elseif ( dreshion_blog_is_frontpage_blog() || is_page() ) {
		if ( dreshion_blog_is_frontpage_blog() ) {
			$page_id = get_option( 'page_for_posts' );
		} else {
			$page_id = get_the_ID();
		}

    	$dreshion_blog_page_sidebar_meta = get_post_meta( $page_id, 'dreshion-blog-select-sidebar', true );
		if ( ! empty( $dreshion_blog_page_sidebar_meta ) ) {
			$classes[] = esc_attr( $dreshion_blog_page_sidebar_meta ) . '-sidebar';
		} else {
			$global_page_sidebar = get_theme_mod( 'dreshion_blog_global_page_layout', 'no' ); 
			$classes[] = esc_attr( $global_page_sidebar ) . '-sidebar';
		}
	}

	// Site layout classes
	$site_layout = get_theme_mod( 'dreshion_blog_site_layout', 'wide' );
	$classes[] = esc_attr( $site_layout ) . '-layout';


	return $classes;
}
add_filter( 'body_class', 'dreshion_blog_body_classes' );

function dreshion_blog_post_classes( $classes ) {
	if ( dreshion_blog_is_page_displays_posts() ) {
		// Search 'has-post-thumbnail' returned by default and remove it.
		$key = array_search( 'has-post-thumbnail', $classes );
		unset( $classes[ $key ] );
		
		$archive_img_enable = get_theme_mod( 'dreshion_blog_enable_archive_featured_img', true );

		if( has_post_thumbnail() && $archive_img_enable ) {
			$classes[] = 'has-post-thumbnail';
		} else {
			$classes[] = 'grid-item no-post-thumbnail';
		}
	}
  
	return $classes;
}
add_filter( 'post_class', 'dreshion_blog_post_classes' );

/**
 * Excerpt length
 * 
 * @since Shadow Themes 1.0.0
 * @return Excerpt length
 */
function dreshion_blog_excerpt_length( $length ){
	if ( is_admin() ) {
		return $length;
	}

	$length = get_theme_mod( 'dreshion_blog_archive_excerpt_length', 30 );
	return $length;
}
add_filter( 'excerpt_length', 'dreshion_blog_excerpt_length', 999 );

if ( ! function_exists( 'dreshion_blog_the_excerpt' ) ) :

  /**
   * Generate excerpt.
   *
   * @since 1.0.0
   *
   * @param int     $length Excerpt length in words.
   * @param WP_Post $post_obj WP_Post instance (Optional).
   * @return string Excerpt.
   */
  function dreshion_blog_the_excerpt( $length = 0, $post_obj = null ) {

    global $post;

    if ( is_null( $post_obj ) ) {
      $post_obj = $post;
    }

    $length = absint( $length );

    if ( 0 === $length ) {
      return;
    }

    $source_content = $post_obj->post_content;

    if ( ! empty( $post_obj->post_excerpt ) ) {
      $source_content = $post_obj->post_excerpt;
    }

    $source_content = preg_replace( '`\[[^\]]*\]`', '', $source_content );
    $trimmed_content = wp_trim_words( $source_content, $length, '&hellip;' );
    return $trimmed_content;

  }

endif;

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function dreshion_blog_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'dreshion_blog_pingback_header' );

/**
 * Get an array of post id and title.
 * 
 */
function dreshion_blog_get_post_choices() {
	$choices = array( '' => esc_html__( '--Select Post--', 'dreshion-blog' ) );
	$args = array( 'numberposts' => -1, );
	$posts = get_posts( $args );

	foreach ( $posts as $post ) {
		$id = $post->ID;
		$title = $post->post_title;
		$choices[ $id ] = $title;
	}

	return $choices;
}

/**
 * List of category for category choices.
 * @return Array Array of post ids and name.
 */
function dreshion_blog_category_choices() {
    $tax_args = array(
        'hierarchical' => 0,
        'taxonomy'     => 'category',
    );
    $taxonomies = get_categories( $tax_args );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'dreshion-blog' );
    foreach ( $taxonomies as $tax ) {
        $choices[ $tax->term_id ] = $tax->name;
    }
    return  $choices;
}

if( !function_exists( 'dreshion_blog_get_page_choices' ) ) :
  /*
   * Function to get pages
   */
  function dreshion_blog_get_page_choices() {

    $pages  =  get_pages();
    $page_list = array();
    $page_list[0] = esc_html__( '--Select Page--', 'dreshion-blog' );

    foreach( $pages as $page ){
      $page_list[ $page->ID ] = $page->post_title;
    }

    return $page_list;

  }
endif;

/**
 * Get an array of cat id and title.
 * 
 */

if( !function_exists( 'dreshion_blog_get_post_cat_choices' ) ) :
  /*
   * Function to get categories
   */
  function dreshion_blog_get_post_cat_choices() {
    $categories = get_terms( 'category' );
    $choices = array('' => esc_html__( '--Select Category--', 'dreshion-blog' ));

    foreach( $categories as $category ) {
      $choices[$category->term_id] = $category->name;
    }

    return $choices;
  }
endif;


/**
 * Checks to see if we're on the homepage or not.
 */
function dreshion_blog_is_frontpage() {
	return ( is_front_page() && ! is_home() );
}

/**
 * Checks to see if Static Front Page is set to "Your latest posts".
 */
function dreshion_blog_is_latest_posts() {
	return ( is_front_page() && is_home() );
}

/**
 * Checks to see if Static Front Page is set to "Posts page".
 */
function dreshion_blog_is_frontpage_blog() {
	return ( is_home() && ! is_front_page() );
}

/**
 * Checks to see if the current page displays any kind of post listing.
 */
function dreshion_blog_is_page_displays_posts() {
	return ( dreshion_blog_is_frontpage_blog() || is_search() || is_archive() || dreshion_blog_is_latest_posts() );
}

/**
 * Shows a breadcrumb for all types of pages.  This is a wrapper function for the Breadcrumb_Trail class,
 * which should be used in theme templates.
 *
 * @since  1.0.0
 * @access public
 * @param  array $args Arguments to pass to Breadcrumb_Trail.
 * @return void
 */
function dreshion_blog_breadcrumb( $args = array() ) {
	$breadcrumb = apply_filters( 'breadcrumb_trail_object', null, $args );

	if ( ! is_object( $breadcrumb ) )
		$breadcrumb = new Breadcrumb_Trail( $args );

	return $breadcrumb->trail();
}

/**
 * Pagination in archive/blog/search pages.
 */
function dreshion_blog_posts_pagination() { 
	$archive_pagination = get_theme_mod( 'dreshion_blog_archive_pagination_type', 'older_newer' );
	if ( 'disable' === $archive_pagination ) {
		return;
	}
	if ( 'numeric' === $archive_pagination ) {
		the_posts_pagination( array(
            'prev_text'          => dreshion_blog_get_icon_svg( 'menu_icon_up' ),
            'next_text'          => dreshion_blog_get_icon_svg( 'menu_icon_up' ),
        ) );
	} elseif ( 'older_newer' === $archive_pagination ) {
        the_posts_navigation( array(
            'prev_text'          => dreshion_blog_get_icon_svg( 'menu_icon_up' ) . '<span>'. esc_html__( 'Older', 'dreshion-blog' ) .'</span>',
            'next_text'          => '<span>'. esc_html__( 'Newer', 'dreshion-blog' ) .'</span>' . dreshion_blog_get_icon_svg( 'menu_icon_up' ),
        )  );
	}
}



// Add auto p to the palces where get_the_excerpt is being called.
add_filter( 'get_the_excerpt', 'wpautop' );

 