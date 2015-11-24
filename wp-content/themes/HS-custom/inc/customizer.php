<?php
/**
 * HS-custom Theme Customizer
 *
 * @package HS-custom
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function honeystreet_custom_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'honeystreet_custom_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function honeystreet_custom_customize_preview_js() {
	wp_enqueue_script( 'honeystreet_custom_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'honeystreet_custom_customize_preview_js' );


/**
 * Create Custom Theme Options
 */
function honeystreet_customize_register( $wp_customize ) {
    // Add setting for logo uploader
    $wp_customize->add_setting( 'honeystreet_logo' ); 
         
    // Add control for logo uploader (actual uploader)
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'honeystreet_logo', array(
        'label'    => __( 'Upload Logo for Header (replaces text)', 'honeystreet' ),
        'section'  => 'title_tagline',
        'settings' => 'honeystreet_logo',
    ) ) );
    
    // Add Footer Section
    $wp_customize->add_section('honeystreet_footer', array(
        'title'    => __('Footer', 'honeystreet'),
        'description' => '',
        'priority' => 120,
    ));
    
    // Add setting for footer logo
    $wp_customize->add_setting( 'honeystreet_footer_logo' );
         
    // Add control for footer logo uploader (actual uploader)
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'honeystreet_footer_logo', array(
        'label'    => __( 'Upload Logo for Footer (replaces text)', 'honeystreet' ),
        'section'  => 'honeystreet_footer',
        'settings' => 'honeystreet_footer_logo',
    ) ) );
    
    // Add setting for footer text line 1
    $wp_customize->add_setting('honeystreet_footer_text', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
    ));
    
	// Add control for footer text line 1
    $wp_customize->add_control('honeystreet_footer_text', array(
        'label'      => __('Footer Text Line 1', 'honeystreet'),
        'section'    => 'honeystreet_footer',
        'settings'   => 'honeystreet_footer_text',
    ));
    
    // Add setting for footer text line 2
    $wp_customize->add_setting('honeystreet_footer_text_two', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
    ));
    
	// Add control for footer text line 2
    $wp_customize->add_control('honeystreet_footer_text_two', array(
        'label'      => __('Footer Text Line 2', 'honeystreet'),
        'section'    => 'honeystreet_footer',
        'settings'   => 'honeystreet_footer_text_two',
    ));
    
    // Add setting for footer text line 3
    $wp_customize->add_setting('honeystreet_footer_text_three', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
    ));
    
	// Add control for footer text line 3
    $wp_customize->add_control('honeystreet_footer_text_three', array(
        'label'      => __('Footer Text Line 3', 'honeystreet'),
        'section'    => 'honeystreet_footer',
        'settings'   => 'honeystreet_footer_text_three',
    ));
    
    // Add setting for footer text line 4
    $wp_customize->add_setting('honeystreet_footer_text_four', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
    ));
    
	// Add control for footer text line 4
    $wp_customize->add_control('honeystreet_footer_text_four', array(
        'label'      => __('Footer Text Line 4', 'honeystreet'),
        'section'    => 'honeystreet_footer',
        'settings'   => 'honeystreet_footer_text_four',
    ));
    
    
    }
add_action( 'customize_register', 'honeystreet_customize_register' );
