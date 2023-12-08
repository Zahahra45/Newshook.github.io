<?php
/**
 * Shadow Themes Customizer
 *
 * @package Shadow Themes
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function dreshion_blog_customize_register( $wp_customize ) {
	/**
	 * Separator custom control
	 *
	 * @version 1.0.0
	 * @since  1.0.0
	 */
	class dreshion_blog_Separator_Custom_Control extends WP_Customize_Control {
		/**
		 * Control type
		 *
		 * @var string
		 */
		public $type = 'dreshion-blog-separator';
		/**
		 * Control method
		 *
		 * @since 1.0.0
		 */
		public function render_content() {
			?>
			<p><hr style="border-color: #222; opacity: 0.2;"></p>
			<?php
		}
	}

	/**
	 * The radio image customize control extends the WP_Customize_Control class.  This class allows
	 * developers to create a list of image radio inputs.
	 *
	 * Note, the `$choices` array is slightly different than normal and should be in the form of
	 * `array(
		 *	$value => array( 'color' => $color_value ),
		 *	$value => array( 'color' => $color_value ),
	 * )`
	 *
	 */

	/**
	 * Radio color customize control.
	 *
	 * @since  3.0.0
	 * @access public
	 */
	class Dreshion_Blog_Customize_Control_Radio_Color extends WP_Customize_Control {

		/**
		 * The type of customize control being rendered.
		 *
		 * @since  3.0.0
		 * @access public
		 * @var    string
		 */
		public $type = 'radio-color';

		/**
		 * Add custom parameters to pass to the JS via JSON.
		 *
		 * @since  3.0.0
		 * @access public
		 * @return void
		 */
		public function to_json() {
			parent::to_json();

			// We need to make sure we have the correct color URL.
			foreach ( $this->choices as $value => $args )
				$this->choices[ $value ]['color'] = esc_attr( $args['color'] );

			$this->json['choices'] = $this->choices;
			$this->json['link']    = $this->get_link();
			$this->json['value']   = $this->value();
			$this->json['id']      = $this->id;
		}

		/**
		 * Don't render the content via PHP.  This control is handled with a JS template.
		 *
		 * @since  4.0.0
		 * @access public
		 * @return bool
		 */
		protected function render_content() {}

		/**
		 * Underscore JS template to handle the control's output.
		 *
		 * @since  3.0.0
		 * @access public
		 * @return void
		 */
		public function content_template() { ?>

			<# if ( ! data.choices ) {
				return;
			} #>

			<# if ( data.label ) { #>
				<span class="customize-control-title">{{ data.label }}</span>
			<# } #>

			<# if ( data.description ) { #>
				<span class="description customize-control-description">{{{ data.description }}}</span>
			<# } #>

			<# _.each( data.choices, function( args, choice ) { #>
				<label>
					<input type="radio" value="{{ choice }}" name="_customize-{{ data.type }}-{{ data.id }}" {{{ data.link }}} <# if ( choice === data.value ) { #> checked="checked" <# } #> />

					<span class="screen-reader-text">{{ args.label }}</span>
					
					<# if ( 'custom' != choice ) { #>
						<span class="color-value" style="background-color: {{ args.color }}"></span>
					<# } else { #>
						<span class="color-value custom-color-value"></span>
					<# } #>
				</label>
			<# } ) #>
		<?php }
	}

	$wp_customize->register_control_type( 'Dreshion_Blog_Customize_Control_Radio_Color'       );

	/**
 * Upsell customizer section.
 *
 * @since  1.0.0
 * @access public
 */
class Dreshion_Blog_Customize_Section_Upsell extends WP_Customize_Section {

    /**
     * The type of customize section being rendered.
     *
     * @since  1.0.0
     * @access public
     * @var    string
     */
    public $type = 'dreshion-blog-upsell';

    /**
     * Custom button text to output.
     *
     * @since  1.0.0
     * @access public
     * @var    string
     */
    public $pro_text = '';

    /**
     * Custom pro button URL.
     *
     * @since  1.0.0
     * @access public
     * @var    string
     */
    public $pro_url = '';

    /**
     * Add custom parameters to pass to the JS via JSON.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function json() {
        $json = parent::json();

        $json['pro_text'] = $this->pro_text;
        $json['pro_url']  = esc_url( $this->pro_url );

        return $json;
    }

    /**
     * Outputs the Underscore.js template.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    protected function render_template() { ?>

        <li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">

            <h3 class="accordion-section-title">
                {{ data.title }}

                <# if ( data.pro_text && data.pro_url ) { #>
                    <a href="{{ data.pro_url }}" class="button button-primary alignright" target="_blank">{{ data.pro_text }}</a>
                <# } #>
            </h3>
        </li>
    <?php }
}

	$default = dreshion_blog_get_default_mods();

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	// Register custom section types.
	$wp_customize->register_section_type( 'Dreshion_Blog_Customize_Section_Upsell' );
	$wp_customize->add_section(
		new Dreshion_Blog_Customize_Section_Upsell(
			$wp_customize,
			'theme_upsell',
			array(
				'title'    => esc_html__( 'Dreshion Blog Pro', 'dreshion-blog' ),
				'pro_text' => esc_html__( 'Buy Pro', 'dreshion-blog' ),
				'pro_url'  => 'http://www.shadowthemes.com/downloads/dreshion-blog-pro/',
				'priority'  => 1,
			)
		)
	);

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'dreshion_blog_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'dreshion_blog_customize_partial_blogdescription',
		) );
	}

	/**
	 *
	 * 
	 * Header panel
	 *
	 * 
	 */
	// Header panel
	$wp_customize->add_panel(
		'dreshion_blog_header_panel',
		array(
			'title' => esc_html__( 'Header', 'dreshion-blog' ),
			'priority' => 100
		)
	);
	$wp_customize->get_section( 'header_image' )->panel         = 'dreshion_blog_header_panel';

	// Header text display setting
	$wp_customize->add_setting(	
		'dreshion_blog_header_text_display',
		array(
			'sanitize_callback' => 'dreshion_blog_sanitize_checkbox',
			'default' => true,
			'transport'	=> 'postMessage',
		)
	);

	$wp_customize->add_control(
		'dreshion_blog_header_text_display',
		array(
			'section'		=> 'title_tagline',
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Display Site Title and Tagline', 'dreshion-blog' ),
		)
	);


	/**
	 *
	 * 
	 * Color panel
	 *
	 * 
	 */

	// Header panel
	$wp_customize->add_panel(
		'dreshion_blog_color_panel',
		array(
			'title' => esc_html__( 'Color Options', 'dreshion-blog' ),
			'priority' => 100,
		)
	);

	//$wp_customize->get_section( 'colors' )->panel         = 'dreshion_blog_color_panel';	
	// Header title color setting
	$wp_customize->add_setting(	
		'dreshion_blog_header_title_color',
		array(
			'sanitize_callback' => 'dreshion_blog_sanitize_hex_color',
			'default' => '#cf3140',
			'transport'	=> 'postMessage',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control( 
		$wp_customize,
			'dreshion_blog_header_title_color',
			array(
				'section'		=> 'colors',
				'label'			=> esc_html__( 'Site title Color:', 'dreshion-blog' ),
			)
		)
	);

	// Header tagline color setting
	$wp_customize->add_setting(	
		'dreshion_blog_header_tagline',
		array(
			'sanitize_callback' => 'dreshion_blog_sanitize_hex_color',
			'default' => '#929292',
			'transport'	=> 'postMessage',
		)
	);


	$wp_customize->add_control(
		new WP_Customize_Color_Control( 
		$wp_customize,
			'dreshion_blog_header_tagline',
			array(
				'section'		=> 'colors',
				'label'			=> esc_html__( 'Site tagline Color:', 'dreshion-blog' ),
			)
		)
	);

	$wp_customize->add_setting(	
		'dreshion_blog_custom_color_scheme',
		array(
			'sanitize_callback' => 'dreshion_blog_sanitize_hex_color',
			'default' => '#db613b',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control( 
		$wp_customize,
			'dreshion_blog_custom_color_scheme',
			array(
				'section'		=> 'colors',
				'label'			=> esc_html__( 'Theme Color:', 'dreshion-blog' ),
			)
		)
	);

	// Site setting
	$wp_customize->add_setting(
		'dreshion_blog_theme_lite_dark_layout',
		array(
			'sanitize_callback' => 'dreshion_blog_sanitize_select',
			'default'			=> 'lite-layout',
		)
	);

	$wp_customize->add_control(
		'dreshion_blog_theme_lite_dark_layout',
		array(
			'section'		=> 'colors',
			'label'			=> esc_html__( 'Theme Layout', 'dreshion-blog' ),
			'type'			=> 'radio',
			'choices'		=> array( 
				'dark-layout' => esc_html__( 'Dark', 'dreshion-blog' ), 
				'lite-layout' => esc_html__( 'Lite', 'dreshion-blog' ),
			)
		)

	);
	

	/**
	 *
	 * 
	 * Home sections panel
	 *
	 * 
	 */

	// Home sections panel
	$wp_customize->add_panel(
		'dreshion_blog_home_panel',
		array(
			'title' => esc_html__( 'Homepage Sections', 'dreshion-blog' ),
			'priority' => 105
		)
	);

	//$wp_customize->get_section( 'static_front_page' )->panel         = 'dreshion_blog_home_panel';

	// Homepage sort section
	$wp_customize->add_section(
		'dreshion_blog_homepage_section_sort',
		array(
			'title' => esc_html__( 'Sort sections', 'dreshion-blog' ),
			'panel' => 'dreshion_blog_home_panel',
		)
	);

	

	// Your latest posts title setting
	$wp_customize->add_setting(	
		'dreshion_blog_your_latest_posts_title',
		array(
			'sanitize_callback' => 'sanitize_text_field',
			'default' => esc_html__( 'Blogs', 'dreshion-blog' ),
			'transport'	=> 'postMessage',
		)
	);

	$wp_customize->add_control(
		'dreshion_blog_your_latest_posts_title',
		array(
			'section'		=> 'static_front_page',
			'label'			=> esc_html__( 'Title:', 'dreshion-blog' ),
			'active_callback' => 'dreshion_blog_is_latest_posts'
		)
	);

	$wp_customize->selective_refresh->add_partial( 
		'dreshion_blog_your_latest_posts_title', 
		array(
	        'selector'            => '.home.blog #page-header .page-title',
			'render_callback'     => 'dreshion_blog_your_latest_posts_partial_title',
    	) 
    );

    require get_parent_theme_file_path('/inc/customizer/frontpage/slider.php');

    require get_parent_theme_file_path('/inc/customizer/frontpage/about.php');

    require get_parent_theme_file_path('/inc/customizer/theme-options/blog.php');

    require get_parent_theme_file_path('/inc/customizer/theme-options/general.php');

    require get_parent_theme_file_path('/inc/customizer/theme-options/layout.php');

    require get_parent_theme_file_path('/inc/customizer/theme-options/single-post.php');

    require get_parent_theme_file_path('/inc/customizer/theme-options/single-page.php');

    require get_parent_theme_file_path('/inc/customizer/theme-options/footer.php');

    require get_parent_theme_file_path('/inc/customizer/theme-options/reset.php');

	/**
	 *
	 * General settings panel
	 * 
	 */
	// General settings panel
	$wp_customize->add_panel(
		'dreshion_blog_general_panel',
		array(
			'title' => esc_html__( 'Theme Option Settings', 'dreshion-blog' ),
			'priority' => 107
		)
	);


	$wp_customize->get_section( 'custom_css' )->panel         = 'dreshion_blog_home_panel';

	$wp_customize->add_panel(
		'dreshion_blog_background_image_panel',
		array(
			'title' => esc_html__( 'Background Image', 'dreshion-blog' ),
			'priority' => 101
		)
	);

}
add_action( 'customize_register', 'dreshion_blog_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function dreshion_blog_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function dreshion_blog_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function dreshion_blog_customize_preview_js() {
	wp_enqueue_script( 'dreshion-blog-customizer', get_theme_file_uri( '/assets/js/customizer.js' ), array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'dreshion_blog_customize_preview_js' );

/**
 * Binds JS handlers for Customizer controls.
 */
function dreshion_blog_customize_control_js() {


	wp_enqueue_style( 'dreshion-blog-customize-style', get_theme_file_uri( '/assets/css/customize-controls.css' ), array(), '20151215' );

	wp_enqueue_script( 'dreshion-blog-customize-control', get_theme_file_uri( '/assets/js/customize-control.js' ), array( 'jquery', 'customize-controls' ), '20151215', true );
	$localized_data = array( 
		'refresh_msg' => esc_html__( 'Refresh the page after Save and Publish.', 'dreshion-blog' ),
		'reset_msg' => esc_html__( 'Warning!!! This will reset all the settings. Refresh the page after Save and Publish to reset all.', 'dreshion-blog' ),
	);

	wp_localize_script( 'dreshion-blog-customize-control', 'localized_data', $localized_data );
}
add_action( 'customize_controls_enqueue_scripts', 'dreshion_blog_customize_control_js' );

/**
 * Selective refresh.
 */

/**
 * Selective refresh for footer copyright.
 */
function dreshion_blog_copyright_partial() {
	return wp_kses_post( get_theme_mod( 'dreshion_blog_copyright_txt' ) );
}

/**
 * Selective refresh for your latest posts title.
 */
function dreshion_blog_your_latest_posts_partial_title() {
	return esc_html( get_theme_mod( 'dreshion_blog_your_latest_posts_title' ) );
}

require get_parent_theme_file_path('/inc/customizer/controller.php');