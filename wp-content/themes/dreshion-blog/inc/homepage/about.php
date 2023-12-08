<?php

    // Get default  mods value.
    $default = dreshion_blog_get_default_mods();

    /// Get default  mods value.
    $author_section_enable = get_theme_mod( 'dreshion_blog_author_section_enable', false );

    if ( false == $author_section_enable ) {
        return;
    }
    $excerpt_length = get_theme_mod( 'dreshion_blog_author_secion_excerpt',50);
    $author_message = get_theme_mod( 'dreshion_blog_author_content_type');
    $top_img_url = get_theme_mod( 'dreshion_blog_author_top_image' );
    $bottom_img_url = get_theme_mod( 'dreshion_blog_author_bottom_image' );
    $side_image_layout = get_theme_mod( 'dreshion_blog_author_side_image_layout', 'normal' );

    // Query if the content type is either post or page.
    $author_section_id = get_theme_mod( 'dreshion_blog_author_post',10 );
    $query = new WP_Query( array( 'post_type' => 'post', 'p' => absint( $author_section_id ) ) );
    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
            $query->the_post(); ?>
            <div id="message" class="page-section" >
                <div class="wrapper">
                    <div class="shadow-section-content column-3">
                        <header class="shadow-entry-header">
                            <h2 class="shadow-entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        </header> 
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="author-thumbnail <?php echo esc_attr($side_image_layout); ?>">
                                <div class="top-author-image">
                                    <img src="<?php echo esc_url( $top_img_url );?>">
                                </div>
                                <div class="main-author-image">
                                    <img src="<?php the_post_thumbnail_url('full'); ?>">
                                </div>
                                <div class="bottom-author-image">
                                    <img src="<?php echo esc_url( $bottom_img_url );?>">
                                </div>
                            </div><!-- .author-thumbnail -->
                        <?php endif; ?>  
                        <div class="shadow-entry-content">
                            <?php
                                $excerpt = dreshion_blog_the_excerpt( $excerpt_length );
                                echo wp_kses_post( wpautop( $excerpt ) );
                            ?>
                            <div class="separator"></div>
                            <div class="share-message">
                                <?php
                                    wp_nav_menu( array(
                                        'theme_location' => 'social',
                                        'container'     => 'div',
                                        'container_class' => 'social-menu',
                                        'menu_class'     => 'social-icons',
                                        'fallback_cb'   => false,
                                        'link_before'    => '<span class="screen-reader-text">',
                                        'link_after'     => '</span>' . dreshion_blog_get_icon_svg( 'link' ),
                                        'depth'          => 1,
                                    ) ); 
                                ?>
                            </div><!-- .share-message -->
                        </div><!-- .shadow-entry-content -->
                        
                    </div><!-- .shadow-section-content -->
                </div>
            </div>
            <?php   
        }
    }
    wp_reset_postdata();


            