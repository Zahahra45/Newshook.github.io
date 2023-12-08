<?php
/**
 * Template part for displaying front page slider.
 *
 * @package Shadow Themes
 */

/// Get default  mods value.
$slider_enable = get_theme_mod( 'dreshion_blog_featured_slider_section_enable', false );

if ( false == $slider_enable ) {
    return;
}

$header_font_size = get_theme_mod( 'dreshion_blog_slider_header_font_size');
$button_font_size = get_theme_mod( 'dreshion_blog_slider_button_font_size');
$slider_speed = get_theme_mod( 'dreshion_blog_slider_speed',600);
$slider_infinite = get_theme_mod('dreshion_blog_featured_slider_infinite_enable', true);
$slider_dot = get_theme_mod('dreshion_blog_featured_slider_dot_enable', true);
$slider_autoplay = get_theme_mod('dreshion_blog_featured_slider_autoplay_enable', true);
$slider_arrow = get_theme_mod('dreshion_blog_featured_slider_arrow_enable', true);
$slider_fade = get_theme_mod('dreshion_blog_featured_slider_fade_enable', false);
$slider_content = get_theme_mod('dreshion_blog_featured_slider_content_enable', false);
$slider_content_opacity = get_theme_mod( 'dreshion_blog_slider_content_opacity',0);
$slider_background_opacity = get_theme_mod( 'dreshion_blog_slider_image_opacity',0);
$slider_decoration_image = get_theme_mod( 'dreshion_blog_slider_decoration_image',0);
$slider = get_theme_mod( 'dreshion_blog_slider_content_type', 'cat' );
$excerpt_length = get_theme_mod( 'dreshion_blog_slider_secion_excerpt',20); 
$homepage_design = get_theme_mod( 'dreshion_blog_homepage_design','design-two'); 


$default = dreshion_blog_get_default_mods();
$slider_num = get_theme_mod( 'dreshion_blog_slider_num', 3 );
$slider_column = get_theme_mod( 'dreshion_blog_slider_column', 1 );
?>
<div id="featured-slider" class="<?php echo $slider_column==1 ? 'f-content-center': 'f-content-bottom'; ?>" 
	data-slick='{"slidesToShow": <?php echo esc_attr($slider_column); ?>, 
	"slidesToScroll": 1, 
	"infinite": <?php echo $slider_infinite ? 'true': 'false'; ?>, 
	"speed": <?php echo esc_attr($slider_speed); ?>, 
	"dots": <?php echo $slider_dot ? 'true': 'false'; ?>, 
	"arrows":<?php echo $slider_arrow ? 'true': 'false'; ?>, 
	"autoplay": <?php echo $slider_autoplay ? 'true': 'false'; ?>, 
	"draggable": true, "fade": <?php echo $slider_fade ? 'true': 'false'; ?> }'>
    	<?php

        $slider_id = array();
        for ( $i=1; $i <= 5; $i++ ) { 
            $slider_id[] = get_theme_mod( "dreshion_blog_slider_post_" . $i );
        }
        $args = array(
            'post_type' => 'post',
            'post__in' => (array)$slider_id,   
            'orderby'   => 'post__in',
            'posts_per_page' => 5,
            'ignore_sticky_posts' => true,
        );
    	    $query = new WP_Query( $args );

    	    $i = 1;
    	    if ( $query->have_posts() ) :
    	        while ( $query->have_posts() ) :
    	            $query->the_post();
    	            ?>
        	    	<?php
        	    		$second_image_id = get_post_meta( get_the_ID(), '_dreshion_blog_image_id', true );
						$second_image = wp_get_attachment_image_src( $second_image_id, "full", "", array( "class"=> "img-responsive" ) );
						$half_class='';
						if (!empty($second_image) && has_post_thumbnail()) {
						  	$half_class ='double-image';
						} else{
							$half_class ='single-image';
						} 
					?>
        	            <article class="slider-post half-image <?php echo $half_class; ?>">
        	            	<div class="half-featured-image ">
								<?php if (!empty($second_image)): ?>
	        	            		<div class="second-slider-featured-image" style="background-image: url('<?php echo esc_url( $second_image[0] ) ?>');">
	        	            			 <a href="<?php echo the_permalink();?>" class="post-thumbnail-link"></a>
	        	            		</div>
        	            		<?php endif ?>
        	            		<?php if (has_post_thumbnail()): ?>
	        	            		<div class="main-slider-featured-image" style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');">
	        	            			 <a href="<?php echo the_permalink();?>" class="post-thumbnail-link"></a>
	        	            		</div>
        	            		<?php endif ?>
        	            	</div>
			                <div class="half-content-wrapper">
			                	<div class="shadow-entry-meta">
			                		<?php dreshion_blog_cats(); ?>
			                	</div>
			                    <header class="shadow-entry-header">
			                    	<?php 
				                    	$slider_subtitle = get_theme_mod( 'dreshion_blog_slider_custom_subtitle_' . $i, $default['dreshion_blog_slider_custom_subtitle'] ); 
				                    ?>
			                    	<?php if (!empty($slider_subtitle)): ?>
				                    	<p class="shadow-entry-subtitle"><?php echo esc_html($slider_subtitle) ?></p>
				                    <?php endif; ?>
			                        <h2 class="shadow-entry-title" style="font-size: <?php echo esc_attr($header_font_size); ?>px; " ><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2> 
			                    </header>
			                    <?php if ($slider_content==true): ?>					                    
				                    <div class="shadow-entry-content">
			                        	<?php
                                            $excerpt = dreshion_blog_the_excerpt( $excerpt_length );
                                            echo wp_kses_post( wpautop( $excerpt ) );
                                        ?>
                                    </div>
                                <?php endif ?>
			                    <?php 
			                    	$read_more = get_theme_mod( 'dreshion_blog_slider_custom_btn_' . $i, $default['dreshion_blog_slider_custom_btn'] ); 
			                    ?>
		                    	<?php if ( ! empty( $read_more ) ) : ?>

				                    <a href="<?php the_permalink(); ?>" class="btn btn-fill" style="font-size: <?php echo esc_attr($button_font_size); ?>px; "><?php echo esc_html( $read_more ); ?>
				                    </a>
				                <?php endif; ?>
			                </div><!-- .featured-content-wrapper -->
	        	        </article>
	        	    
    	        <?php
    	        $i++;
    	    	endwhile;
    	    endif;
    	    wp_reset_postdata();
    	?>
</div><!-- #featured-slider -->