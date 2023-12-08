<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Ascendoor Blog
 */

get_header();
?>
<main id="primary" class="site-main">

	<?php

	if ( is_front_page() && is_home() ) {
		$latest_title    = get_theme_mod( 'ascendoor_blog_latest_posts_title', '' );
		$latest_subtitle = get_theme_mod( 'ascendoor_blog_latest_posts_subtitle', '' );
		if ( ! empty( $latest_title || $latest_subtitle ) ) :
			?>
			<div class="section-header">
				<h3 class="section-title"><?php echo esc_html( $latest_title ); ?></h3>
				<p class="section-subtitle"><?php echo esc_html( $latest_subtitle ); ?></p>
			</div>
			<?php
		endif;
	}

	if ( is_home() && ! is_front_page() ) {
		do_action( 'ascendoor_blog_breadcrumb' );
	}

	if ( have_posts() ) :

		if ( is_home() && ! is_front_page() ) :
			?>
			<header>
				<h1 class="page-title"><?php single_post_title(); ?></h1>
			</header>
			<?php
	endif;
		?>

	<div class="ascendoor-blog-archive-layout list-layout">
		<?php
		/* Start the Loop */
		while ( have_posts() ) :
			the_post();

				/*
				* Include the Post-Type-specific template for the content.
				* If you want to override this in a child theme, then include a file
				* called content-___.php (where ___ is the Post Type name) and that will be used instead.
				*/
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;
		?>
		</div>
		<?php
		do_action( 'ascendoor_blog_posts_pagination' );

	else :

		get_template_part( 'template-parts/content', 'none' );

	endif;
	?>

</main><!-- #main -->

<?php
if ( ascendoor_blog_is_sidebar_enabled() ) {
	get_sidebar();
}

get_footer();
