<?php
/**
 * Metabox file
 *
 * @package Shadow Themes
 */

/**
 * Register meta box(es).
 */
function dreshion_blog_register_meta_boxes() {
    add_meta_box( 'dreshion-blog-select-sidebar', __( 'Sidebar position', 'dreshion-blog' ), 'dreshion_blog_display_metabox', array( 'post', 'page' ), 'side' );
}
add_action( 'add_meta_boxes', 'dreshion_blog_register_meta_boxes' );
 
/**
 * Meta box display callback.
 *
 * @param WP_Post $post Current post object.
 */
function dreshion_blog_display_metabox( $post ) {
    // Display code/markup goes here. Don't forget to include nonces!

    // Add a nonce field so we can check for it later.
    wp_nonce_field( 'dreshion_blog_select_sidebar_save_meta_box', 'dreshion_blog_select_sidebar_meta_box_nonce' );

    $dreshion_blog_sidebar_meta = get_post_meta( $post->ID, 'dreshion-blog-select-sidebar', true );
	$choices = array( 
			'right' => esc_html__( 'Right', 'dreshion-blog' ), 
			'no'    => esc_html__( 'No Sidebar', 'dreshion-blog' ), 
		);

		foreach ( $choices as $value => $name ) : ?>
	    	<p>
	    		<label>
					<input value="<?php echo esc_attr( $value ); ?>" <?php checked( $dreshion_blog_sidebar_meta, $value, true ); ?> name="dreshion-blog-select-sidebar" type="radio" />
					<?php echo esc_html( $name ); ?>
	    		</label>
			</p>	
		<?php endforeach; 

}
 
/**
 * Save meta box content.
 *
 * @param int $post_id Post ID
 */
function dreshion_blog_save_meta_box( $post_id ) {
    // Save logic goes here. Don't forget to include nonce checks!

    /*
     * We need to verify this came from our screen and with proper authorization,
     * because the save_post action can be triggered at other times.
     */

    // Check if our nonce is set.
    if ( ! isset( $_POST['dreshion-blog-select-sidebar'] ) ) {
        return;
    }

    // Verify that the nonce is valid.
    if ( ! wp_verify_nonce( sanitize_key( $_POST['dreshion_blog_select_sidebar_meta_box_nonce'] ), 'dreshion_blog_select_sidebar_save_meta_box' ) ) {
        return;
    }

    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    // Check the user's permissions.
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    /* OK, it's safe for us to save the data now. */
    
    // Make sure that it is set.
    if ( isset( $_POST['dreshion-blog-select-sidebar'] ) ) {
        // Sanitize user input.
        $dreshion_blog_sidebar_meta = sanitize_text_field( wp_unslash( $_POST['dreshion-blog-select-sidebar'] ) );
        // Update the meta field in the database.
        update_post_meta( $post_id, 'dreshion-blog-select-sidebar', $dreshion_blog_sidebar_meta );
    }
}
add_action( 'save_post', 'dreshion_blog_save_meta_box' );


add_action( 'add_meta_boxes', 'dreshion_blog_image_add_metabox' );
function dreshion_blog_image_add_metabox () {
    add_meta_box( 'dreshionimagediv', __( 'Second Featured Image ', 'dreshion-blog' ), 'dreshion_blog_image_metabox', 'post', 'side', 'low');
}

function dreshion_blog_image_metabox ( $post ) {
    global $content_width, $_wp_additional_image_sizes;

    $image_id = get_post_meta( $post->ID, '_dreshion_blog_image_id', true );

    $old_content_width = $content_width;
    $content_width = 254;

    if ( $image_id && get_post( $image_id ) ) {

        if ( ! isset( $_wp_additional_image_sizes['post-thumbnail'] ) ) {
            $thumbnail_html = wp_get_attachment_image( $image_id, array( $content_width, $content_width ) );
        } else {
            $thumbnail_html = wp_get_attachment_image( $image_id, 'post-thumbnail' );
        }

        if ( ! empty( $thumbnail_html ) ) {
            $content = $thumbnail_html;
            $content .= '<p class="hide-if-no-js"><a href="javascript:;" id="remove_dreshion_blog_image_button" >' . esc_html__( 'Remove Featured Image', 'dreshion-blog' ) . '</a></p>';
            $content .= '<input type="hidden" id="upload_dreshion_blog_image" name="_dreshion_blog_cover_image" value="' . esc_attr( $image_id ) . '" />';
        }

        $content_width = $old_content_width;
    } else {

        $content = '<img src="" style="width:' . esc_attr( $content_width ) . 'px;height:auto;border:0;display:none;" />';
        $content .= '<p class="hide-if-no-js"><a title="' . esc_attr__( 'Set Featured Image', 'dreshion-blog' ) . '" href="javascript:;" id="upload_dreshion_blog_image_button" id="set-dreshion-blog-image" data-uploader_title="' . esc_attr__( 'Choose an image', 'dreshion-blog' ) . '" data-uploader_button_text="' . esc_attr__( 'Set Featured Image', 'dreshion-blog' ) . '">' . esc_html__( 'Set Featured Image', 'dreshion-blog' ) . '</a></p>';
        $content .= '<input type="hidden" id="upload_dreshion_blog_image" name="_dreshion_blog_cover_image" value="" />';

    }

    echo $content;
}

add_action( 'save_post', 'dreshion_blog_image_save', 10, 1 );
function dreshion_blog_image_save ( $post_id ) {
    if( isset( $_POST['_dreshion_blog_cover_image'] ) ) {
        $image_id = (int) $_POST['_dreshion_blog_cover_image'];
        update_post_meta( $post_id, '_dreshion_blog_image_id', $image_id );
    }
}
/**
* Enqueue admin scripts for Image Widget
* @since Dreshion 1.0
**/
function dreshion_blog_image_upload_enqueue( $hook ) {

wp_enqueue_media();
wp_enqueue_script( 'dreshion-blog-image-upload-script', get_template_directory_uri() . '/assets/js/image-upload.js', array( 'jquery' ), true );
}

add_action( 'admin_enqueue_scripts', 'dreshion_blog_image_upload_enqueue' );