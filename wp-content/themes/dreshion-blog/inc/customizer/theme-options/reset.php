<?php 
/**
	 * Reset all settings
	 */
	// Reset settings section
	$wp_customize->add_section(
		'dreshion_blog_reset_sections',
		array(
			'title' => esc_html__( 'Reset all', 'dreshion-blog' ),
			'description' => esc_html__( 'Reset all settings to default.', 'dreshion-blog' ),
			'panel' => 'dreshion_blog_general_panel',
		)
	);

	// Reset sortable order setting
	$wp_customize->add_setting(
		'dreshion_blog_reset_settings',
		array(
			'sanitize_callback' => 'dreshion_blog_sanitize_checkbox',
			'default' => false,
			'transport'	=> 'postMessage',
		)
	);

	$wp_customize->add_control(
		'dreshion_blog_reset_settings',
		array(
			'section'		=> 'dreshion_blog_reset_sections',
			'label'			=> esc_html__( 'Reset all settings?', 'dreshion-blog' ),
			'type'			=> 'checkbox',
		)
	);
 ?>