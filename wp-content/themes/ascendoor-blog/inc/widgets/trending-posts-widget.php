<?php
if ( ! class_exists( 'Ascendoor_Blog_Trending_Posts_Widget' ) ) {
	/**
	 * Adds Ascendoor_Blog_Trending_Posts_Widget Widget.
	 */
	class Ascendoor_Blog_Trending_Posts_Widget extends WP_Widget {


		/**
		 * Register widget with WordPress.
		 */
		public function __construct() {
			$ascendoor_blog_trending_posts_widget_ops = array(
				'classname'   => 'ascendoor-widget ascendoor-blog-trending-carousel-section',
				'description' => __( 'Retrive Trending Posts Widgets', 'ascendoor-blog' ),
			);
			parent::__construct(
				'ascendoor_blog_trending_posts_carousel_widget',
				__( 'Ascendoor Trending Posts Widget', 'ascendoor-blog' ),
				$ascendoor_blog_trending_posts_widget_ops
			);
		}

		/**
		 * Front-end display of widget.
		 *
		 * @see WP_Widget::widget()
		 *
		 * @param array $args     Widget arguments.
		 * @param array $instance Saved values from database.
		 */
		public function widget( $args, $instance ) {
			if ( ! isset( $args['widget_id'] ) ) {
				$args['widget_id'] = $this->id;
			}
			$trending_posts_title    = ( ! empty( $instance['title'] ) ) ? ( $instance['title'] ) : '';
			$trending_posts_title    = apply_filters( 'widget_title', $trending_posts_title, $instance, $this->id_base );
			$trending_posts_offset   = isset( $instance['offset'] ) ? absint( $instance['offset'] ) : '';
			$trending_posts_category = isset( $instance['category'] ) ? absint( $instance['category'] ) : '';

			echo $args['before_widget'];
			if ( ! empty( $trending_posts_title ) ) { ?>
				<div class="section-header">
					<?php
					echo $args['before_title'] . esc_html( $trending_posts_title ) . $args['after_title'];
					?>
				</div>
			<?php } ?>
			<div class="ascendoor-blog-section-body">
				<div class="ascendoor-blog-trending-carousel-section-wrapper trending-carousel">
					<?php
					$trending_posts_widgets_args = array(
						'post_type'      => 'post',
						'posts_per_page' => absint( 5 ),
						'offset'         => absint( $trending_posts_offset ),
						'cat'            => absint( $trending_posts_category ),
					);

					$query = new WP_Query( $trending_posts_widgets_args );
					if ( $query->have_posts() ) :
						$i = 1;
						while ( $query->have_posts() ) :
							$query->the_post();
							?>
							<div class="carousel-item">
								<div class="blog-post-single <?php echo esc_attr( has_post_thumbnail() ? 'has-post-thumbnail' : '' ); ?> small-list-design">
									<div class="blog-img">
										<a class="post-thumbnail" href="<?php the_permalink(); ?>">
											<?php the_post_thumbnail(); ?>
										</a>
										<span class="count-no"><?php echo absint( $i ); ?></span>
									</div>
									<div class="blog-detail">
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
										</div>
									</div>
								</div>
							</div>
							<?php
							$i++;
						endwhile;
						wp_reset_postdata();
					endif;
					?>
				</div>
			</div>
			<?php
			echo $args['after_widget'];
		}

		/**
		 * Back-end widget form.
		 *
		 * @see WP_Widget::form()
		 *
		 * @param array $instance Previously saved values from database.
		 */
		public function form( $instance ) {
			$trending_posts_title    = isset( $instance['title'] ) ? ( $instance['title'] ) : '';
			$trending_posts_offset   = isset( $instance['offset'] ) ? absint( $instance['offset'] ) : '';
			$trending_posts_category = isset( $instance['category'] ) ? absint( $instance['category'] ) : '';
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Section Title:', 'ascendoor-blog' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $trending_posts_title ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'offset' ) ); ?>"><?php esc_html_e( 'Number of posts to displace or pass over:', 'ascendoor-blog' ); ?></label>
				<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'offset' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'offset' ) ); ?>" type="number" step="1" min="0" value="<?php echo absint( $trending_posts_offset ); ?>" size="3" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>"><?php esc_html_e( 'Select the category to show posts:', 'ascendoor-blog' ); ?></label>
				<select id="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'category' ) ); ?>" class="widefat" style="width:100%;">
					<?php
					$categories = ascendoor_blog_get_post_cat_choices();
					foreach ( $categories as $category => $value ) {
						?>
						<option value="<?php echo absint( $category ); ?>" <?php selected( $trending_posts_category, $category ); ?>><?php echo esc_html( $value ); ?></option>
						<?php
					}
					?>
				</select>
			</p>
			<?php
		}

		/**
		 * Sanitize widget form values as they are saved.
		 *
		 * @see WP_Widget::update()
		 *
		 * @param array $new_instance Values just sent to be saved.
		 * @param array $old_instance Previously saved values from database.
		 *
		 * @return array Updated safe values to be saved.
		 */
		public function update( $new_instance, $old_instance ) {
			$instance             = $old_instance;
			$instance['title']    = sanitize_text_field( $new_instance['title'] );
			$instance['offset']   = (int) $new_instance['offset'];
			$instance['category'] = (int) $new_instance['category'];
			return $instance;
		}
	}
}
