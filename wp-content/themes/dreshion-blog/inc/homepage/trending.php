<?php
/**
 * Template part for displaying front page trending.
 *
 * @package Shadow Themes
 */

/// Get default  mods value.
$trending_enable = get_theme_mod( 'dreshion_blog_trending_section_enable', false );

if ( false == $trending_enable ) {
    return;
}
$default = dreshion_blog_get_default_mods();
$header_font_size = get_theme_mod( 'dreshion_blog_trending_header_font_size');
$button_font_size = get_theme_mod( 'dreshion_blog_trending_button_font_size');
$trending_num = get_theme_mod( 'dreshion_blog_trending_num', 3 );
$section_title = get_theme_mod( 'dreshion_blog_trending_section_title', $default['dreshion_blog_trending_section_title'] ); 

?>
<div id="trending" class="page-section" >
	<div class="wrapper">
		<?php if (!empty($section_title)): ?>
			<div class="shadow-section-header">
				<h2 class="shadow-section-title"><?php echo esc_html($section_title) ?></h2>
			</div>
		<?php endif ?>
		<div class="trending-wrapper column-3">
		    <?php
	        $trending_id = array();
	        for ( $i=1; $i <= $trending_num; $i++ ) { 
	            $trending_id[] = get_theme_mod( "dreshion_blog_trending_post_" . $i );
	        }
	        $args = array(
	            'post_type' => 'post',
	            'post__in' => (array)$trending_id,   
                'orderby'   => 'post__in',
	            'posts_per_page' => $trending_num,
	            'ignore_sticky_posts' => true,
	        );
			    
			    $query = new WP_Query( $args );

			    $i = 1;
			    if ( $query->have_posts() ) :
			        while ( $query->have_posts() ) :
			            $query->the_post();
			            ?>
			            <article class="trending-container <?php echo has_post_thumbnail() ? 'has-post-thumbnail' : 'no-post-thumbnail' ; ?>" >

			            	<div class="trending-inner" style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');">
			                    <header class="shadow-entry-header">
			                        <h2 class="shadow-entry-title" style="font-size: <?php echo esc_attr($header_font_size); ?>px; " ><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
			                    </header>
			                </div>
		    	        </article>
			        <?php 
			        $i++;
			    	endwhile;    
			    endif;
			    wp_reset_postdata();
			?>
		</div><!-- #trending slider -->
	</div><!-- .wrapper-->
</div><!-- #trending -->