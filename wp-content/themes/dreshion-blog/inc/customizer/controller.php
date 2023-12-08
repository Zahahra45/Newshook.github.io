<?php
/**
 * Customizer custom controls
 */


if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return null;
}

class Dreshion_Blog_Customizer_Custom_Padding extends WP_Customize_Control {

	public $type = 'custom_padding';
	

	public function render_content() { 
			$label = $this->label ;
		?>
		
		<label class="customizer-bottom-top">
			<?php if ( ! empty( $label['main_label'] ) ) { ?>
				<span class="customize-control-title"><?php echo esc_html( $label['main_label'] ) ?></span>
			<?php } ?>
			<?php if ( !empty( $this->description ) ) { ?>
				<span class="description customize-control-description"><?php echo esc_html( $this->description ) ?></span>
			<?php } ?>
			<div>
				<div class="setting_top_padding">
					<?php echo esc_html( $label['setting_top_padding_label'] ) ?><br/>
					<input  type="number"  value="<?php echo ( $this->link('setting_top_padding') ) ?>" <?php echo ( $this->link('setting_top_padding') ) ?> />
				</div>
				<div class="setting_right_padding">
					<?php echo esc_html( $label['setting_right_padding_label'] ) ?><br/>
					<input  type="number"  value="<?php echo esc_attr( $this->value('setting_right_padding') ) ?>" <?php echo ( $this->link('setting_right_padding') ) ?> />
				</div>
				<div class="setting_bottom_padding">
					<?php echo esc_html( $label['setting_bottom_padding_label'] ) ?><br/>
					<input  type="number"  value="<?php echo esc_attr( $this->value('setting_bottom_padding') ) ?>" <?php echo ( $this->link('setting_bottom_padding') ) ?> />
				</div>
				<div class="setting_left_padding">
					<?php echo esc_html( $label['setting_left_padding_label'] ) ?><br/>
					<input  type="number"  value="<?php echo esc_attr( $this->value('setting_left_padding') ) ?>" <?php echo ( $this->link('setting_left_padding') ) ?> />
				</div>
				
			</div>
		</label>
		<?php 
			if ( isset( $_POST['reset'] ) ) {
				remove_theme_mod( $label['reset_1'] ); 
				remove_theme_mod( $label['reset_2'] );
		}				
	}
}
class Dreshion_Blog_Dropdown_Multiple_Chooser extends WP_Customize_Control{
    public $type = 'dropdown_multiple_chooser';

    public function render_content(){
        if ( empty( $this->choices ) )
                return;
        ?>
            <label>
                <span class="customize-control-title">
                    <?php echo esc_html( $this->label ); ?>
                </span>

                <?php if($this->description){ ?>
                <span class="description customize-control-description">
                    <?php echo wp_kses_post($this->description); ?>
                </span>
                <?php } ?>

                <select class="dreshion-blog-chosen-select" multiple <?php $this->link(); ?>>
                    <?php
                    foreach ( $this->choices as $value => $label )
                        echo '<option value="' . esc_attr( $value ) . '"' . selected( $this->value(), $value, false ) . '>' . esc_html( $label ) . '</option>';
                    ?>
                </select>
            </label>
        <?php
    }
}
class Dreshion_Blog_Range_Value_Control extends WP_Customize_Control {
  public $type = 'range-value';
  /**
   * Enqueue scripts/styles.
   *
   * @since 3.4.0
   */
  public function enqueue() {
    wp_enqueue_script( 'dreshion-blog-customizer-range', get_template_directory_uri() . '/assets/js/customizer-range.js', array( 'jquery' ), rand(), true );
  }
  /**
   * Render the control's content.
   *
   * @author soderlind
   * @version 1.2.0
   */
  public function render_content() {
    ?>
    <label>
      <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
      <div class="range-slider"  style="width:100%; display:flex;flex-direction: row;justify-content: flex-start;">
        <span  style="width:100%; flex: 1 0 0; vertical-align: middle;"><input class="range-slider__range" type="range" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->input_attrs(); $this->link(); ?>>
        <span class="range-slider__value">0</span></span>
      </div>
      <?php if ( ! empty( $this->description ) ) : ?>
      <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
      <?php endif; ?>
    </label>
    <?php
  }
}



class dreshion_blog_Multi_Input_Custom_Control extends WP_Customize_Control {
    /**
     * Control type
     *
     * @var string
     */
    public $type = 'multi-input';

    /**
     * Control button text.
     *
     * @var string
     */
    public $button_text;

    /**
     * Control method
     *
     * @since 1.0.0
     */
    public function render_content() {
        ?>
        <label class="customize_multi_input">
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <p><?php echo esc_html( $this->description ); ?></p>
            <input type="hidden" id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $this->value() ); ?>" class="customize_multi_value_field" <?php $this->link(); ?> />
            <div class="customize_multi_fields">
                <div class="set">
                    <input type="text" value="" class="customize_multi_single_field"/>
                    <span class="customize_multi_remove_field"><span class="dashicons dashicons-no-alt"></span></span>
                </div>
            </div>
            <a href="#" class="button button-primary customize_multi_add_field"><?php echo esc_html( $this->button_text ); ?></a>
        </label>
        <?php
    }
}