<?php
if ( ! get_theme_mod( 'ascendoor_blog_enable_banner_section', false ) ) {
	return;
}

$slider_content_ids      = $tile_posts_ids = array();
$slider_content_type     = get_theme_mod( 'ascendoor_blog_banner_slider_content_type', 'post' );
$tile_posts_content_type = get_theme_mod( 'ascendoor_blog_banner_tile_content_type', 'post' );

if ( $slider_content_type === 'post' ) {
	for ( $i = 1; $i <= 3; $i++ ) {
		$slider_content_ids[] = get_theme_mod( 'ascendoor_blog_banner_slider_content_post_' . $i );
	}
	$banner_slider_args = array(
		'post_type'           => 'post',
		'posts_per_page'      => absint( 3 ),
		'ignore_sticky_posts' => true,
	);
	if ( ! empty( array_filter( $slider_content_ids ) ) ) {
		$banner_slider_args['post__in'] = array_filter( $slider_content_ids );
		$banner_slider_args['orderby']  = 'post__in';
	} else {
		$banner_slider_args['orderby'] = 'date';
	}
} else {
	$cat_content_id     = get_theme_mod( 'ascendoor_blog_banner_slider_content_category' );
	$banner_slider_args = array(
		'cat'            => $cat_content_id,
		'posts_per_page' => absint( 3 ),
	);
}
$banner_slider_args = apply_filters( 'ascendoor_blog_banner_section_args', $banner_slider_args );

if ( $tile_posts_content_type === 'post' ) {
	for ( $i = 1; $i <= 4; $i++ ) {
		$tile_posts_ids[] = get_theme_mod( 'ascendoor_blog_banner_tile_content_post_' . $i );
	}
	$tile_posts_args = array(
		'post_type'           => 'post',
		'posts_per_page'      => absint( 4 ),
		'ignore_sticky_posts' => true,
	);
	if ( ! empty( array_filter( $tile_posts_ids ) ) ) {
		$tile_posts_args['post__in'] = array_filter( $tile_posts_ids );
		$tile_posts_args['orderby']  = 'post__in';
	} else {
		$tile_posts_args['orderby'] = 'date';
	}
} else {
	$cat_content_id  = get_theme_mod( 'ascendoor_blog_banner_tile_content_category' );
	$tile_posts_args = array(
		'cat'            => $cat_content_id,
		'posts_per_page' => absint( 4 ),
	);
}
$tile_posts_args = apply_filters( 'ascendoor_blog_banner_section_args', $tile_posts_args );

ascendoor_blog_render_banner_section( $banner_slider_args, $tile_posts_args );

/**
 * Render Banner Section.
 */
function ascendoor_blog_render_banner_section( $banner_slider_args, $tile_posts_args ) {
	$readmore_button = get_theme_mod( 'ascendoor_blog_readmore_button_label', __( 'Read More', 'ascendoor-blog' ) );
	?>

	<section id="ascendoor_blog_banner_section" class="banner-section banner-style-1">
		<?php
		if ( is_customize_preview() ) :
			ascendoor_blog_section_link( 'ascendoor_blog_banner_section' );
		endif;
		?>
		<div class="ascendoor-wrapper">
			<div class="banner-section-wrapper">
				<div class="slider-part">
					<?php
					$banner_query = new WP_Query( $banner_slider_args );
					if ( $banner_query->have_posts() ) :
						?>
						<div class="ascendoor-blog-slider-wrapper single-item banner-slider ascendoor-blog-carousel-slider-navigation">
							<?php
							while ( $banner_query->have_posts() ) :
								$banner_query->the_post();
								?>
								<div class="carousel-item">
									<div class="blog-post-single tile-design tile-style-1 <?php echo esc_attr( has_post_thumbnail() ? 'has-post-thumbnail' : '' ); ?>">
										<a class="post-thumbnail" href="<?php the_permalink(); ?>">
											<?php the_post_thumbnail( 'post-thumbnail' ); ?>
										</a>
										<div class="mag-post-category with-background">
											<?php ascendoor_blog_categories_list(); ?>
										</div>
										<h3 class="mag-post-title">
											<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										</h3>
										<div class="mag-post-meta">
											<span class="post-author">
												<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><i class="fas fa-user"></i><?php echo esc_html( get_the_author() ); ?></a>
											</span>
											<span class="post-date">
												<a href="<?php the_permalink(); ?>"><i class="far fa-clock"></i><?php echo esc_html( get_the_date() ); ?></a>
											</span>
											<span class="post-views">
												<i class="far fa-eye"></i>
												<?php echo getPostViews( get_the_ID() ); ?>
											</span>
										</div>
										<?php if ( ! has_post_thumbnail() ) { ?>
											<div class="mag-post-excerpt">
												<p><?php the_excerpt(); ?></p>
											</div>
											<div class="ascen-btn-read">
												<div class="ascen-readmore-btn">
													<a href="<?php the_permalink(); ?>"><?php echo esc_html( $readmore_button ); ?></a>
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
										<?php } ?>
									</div>
								</div>
								<?php
							endwhile;
							wp_reset_postdata();
							?>
						</div>
						<?php
					endif;
					?>
				</div>
				<?php
				$tile_query = new WP_Query( $tile_posts_args );
				if ( $tile_query->have_posts() ) :
					while ( $tile_query->have_posts() ) :
						$tile_query->the_post();
						?>
						<div class="blog-post-single <?php echo esc_attr( has_post_thumbnail() ? 'has-post-thumbnail' : '' ); ?> tile-design tile-style-1">
							<a class="post-thumbnail" href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail( 'post-thumbnail' ); ?>
							</a>
							<div class="mag-post-category">
								<?php ascendoor_blog_categories_list(); ?>
							</div>
							<h3 class="mag-post-title">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h3>
							<div class="mag-post-meta">
								<span class="post-author">
									<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><i class="fas fa-user"></i><?php echo esc_html( get_the_author() ); ?></a>
								</span>
								<span class="post-date">
									<a href="<?php the_permalink(); ?>"><i class="far fa-clock"></i><?php echo esc_html( get_the_date() ); ?></a>
								</span>
								<span class="post-views">
									<i class="far fa-eye"></i>
									<?php echo getPostViews( get_the_ID() ); ?>
								</span>
							</div>
							<?php if ( ! has_post_thumbnail() ) { ?>
								<div class="mag-post-excerpt">
									<p><?php the_excerpt(); ?></p>
								</div>
								<div class="ascen-btn-read">
									<div class="ascen-readmore-btn">
										<a href="<?php the_permalink(); ?>"><?php echo esc_html( $readmore_button ); ?></a>
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
							<?php } ?>
						</div>
						<?php
					endwhile;
					wp_reset_postdata();
				endif;
				?>
			</div>
		</div>
	</section>

	<?php
}
