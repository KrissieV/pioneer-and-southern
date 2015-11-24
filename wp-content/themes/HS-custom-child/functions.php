<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css', array('honeystreet-grid') );
    wp_enqueue_script('southern-js', get_stylesheet_directory_uri() . '/js/southern.js', array('jquery'), null, true);

}

/**
 * Add styles/classes to the "Styles" drop-down
 */
// Callback function to filter the MCE settings
function hs_mce_before_init_insert_formats( $init_array ) {  
	// Define the style_formats array
	$style_formats = array(  
		// Each array child is a format with it's own settings
		array(  
			'title' => 'button',  
			'inline' => 'span',  
			'classes' => 'button',
		),
		array(  
			'title' => 'small',  
			'inline' => 'span',  
			'classes' => 'small',
		),  
		array(  
			'title' => 'callout',  
			'block' => 'blockquote', 
			'classes' => 'callout', 
		),
		array(  
			'title' => 'Southern Button',  
			'block' => 'span', 
			'classes' => 'southern-button', 
		),
		
	);  
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode( $style_formats );  
	
	return $init_array;  
  
} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'hs_mce_before_init_insert_formats', 10 );