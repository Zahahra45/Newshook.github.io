<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Ascendoor Blog
 */

$archive_classes = implode( ' ', array( 'blog-post-single list-design list-style-2' ) );
$button_label    = get_theme_mod( 'ascendoor_blog_readmore_button_label', __( 'Read More', 'ascendoor-blog' ) );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( esc_attr( $archive_classes ) ); ?>>
	<?php if ( has_post_thumbnail() ) { ?>
		<div class="blog-img">
		<?php } ?>
		<?php ascendoor_blog_post_thumbnail(); ?>
		<?php if ( has_post_thumbnail() ) { ?>
		</div>
	<?php } ?>
	<?php if ( has_post_thumbnail() ) { ?>
		<div class="blog-details">
		<?php } ?>
		<div class="mag-post-category">
			<?php ascendoor_blog_categories_list(); ?>
		</div>
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title mag-post-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title mag-post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		?>
		<div class="mag-post-meta">
			<?php
			ascendoor_blog_posted_by();
			ascendoor_blog_posted_on();
			?>
			<span class="post-views">
				<i class="far fa-eye"></i>
				<?php echo getPostViews( get_the_ID() ); ?>
			</span>
		</div>
		<div class="mag-post-excerpt">
			<?php the_excerpt(); ?>
		</div>
		<div class="ascen-btn-read">
			<div class="ascen-readmore-btn">
				<a href="<?php the_permalink(); ?>"><?php echo esc_html( $button_label ); ?></a>
			</div>
			<div class="ascen-min-read">
				<i class="far fa-clock"></i>
				<span>
					<?php
					echo ascendoor_blog_reading_time( get_the_content() );
					echo esc_html__( ' min read', 'ascendoor-blog' );
					?>
				</span>
			</div>
		</div>
		<?php if ( has_post_thumbnail() ) { ?>
		</div>
	<?php } ?>
</article><!-- #post-<?php the_ID(); ?> -->
