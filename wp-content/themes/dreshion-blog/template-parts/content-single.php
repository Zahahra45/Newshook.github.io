<?php
/**
 * Template part for displaying content  in post.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Shadow Themes
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'hentry' ); ?>>
	<?php 
		$single_image_enable = get_theme_mod( 'dreshion_blog_enable_single_image', true );
		$second_image_enable = get_theme_mod( 'dreshion_blog_enable_single_second_image', true );
		$second_image_id = get_post_meta( get_the_ID(), '_dreshion_blog_image_id', true );
		$second_image_url = wp_get_attachment_image_src( $second_image_id, "dreshion-blog-archive-two", "", array( "class"=> "img-responsive" ) );
		$class='';
		if ($single_image_enable && $second_image_enable && !empty($second_image_url) && !empty(has_post_thumbnail())) {
			$class='double-image';
			$first_image = get_the_post_thumbnail_url(get_the_ID(), 'dreshion-blog-archive-two');
			$second_image = wp_get_attachment_image_src( $second_image_id, "dreshion-blog-archive-two", "", array( "class"=> "img-responsive" ) );
		} else{
			$class='single-image';
			$first_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
			$second_image = wp_get_attachment_image_src( $second_image_id, "full", "", array( "class"=> "img-responsive" ) );
		}
	 ?>
	<div class="featured-image <?php echo $class; ?> ">
        <?php if ( $single_image_enable && !empty(has_post_thumbnail())) { ?>
        	<img src="<?php echo esc_url($first_image); ?>">
    	<?php }
        if (!empty($second_image_url) && ($second_image_enable==true)): ?>
			<img src="<?php echo $second_image[0]; ?>" width="<?php echo $second_image[1]; ?>" height="<?php echo $second_image[2]; ?>">
		<?php endif ?>
	</div><!-- .featured-post-image -->
	<div class="shadow-entry-container">
	    <div class="shadow-entry-content">
	        <?php
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'dreshion-blog' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'dreshion-blog' ),
				'after'  => '</div>',
			) );
			?>
	    </div><!-- .shadow-entry-content -->
	    <div class="entry-meta">
		    <?php 
			    $single_author_enable = get_theme_mod( 'dreshion_blog_enable_single_author', true );
			    if ( $single_author_enable ) {
			    	dreshion_blog_post_author(); 
			    }
			    $single_date_enable = get_theme_mod( 'dreshion_blog_enable_single_date', true );
				if ( $single_date_enable ) {
					dreshion_blog_posted_on();
				}
				$single_category_enable = get_theme_mod( 'dreshion_blog_enable_single_category', true );
			    $single_tag_enable = get_theme_mod( 'dreshion_blog_enable_single_tag', true ); 
			    if ( $single_category_enable ) {
			    	dreshion_blog_cats();
			    }
			    if ( $single_tag_enable  ) {
			    	dreshion_blog_tags();
			    }
		    ?>
		</div><!-- .entry-meta -->
	</div><!-- .shadow-entry-container -->
</article><!-- #post-<?php the_ID(); ?> -->
