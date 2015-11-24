<?php
/**
 * HS-custom functions and definitions
 *
 * @package HS-custom
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'honeystreet_custom_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function honeystreet_custom_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on HS-custom, use a find and replace
	 * to change 'honeystreet-custom' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'honeystreet-custom', get_template_directory() . '/languages' );
	
	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style('css/editor-style.css');

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in several location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'honeystreet-custom' ),
		'utility' => __( 'Utility Menu', 'honeystreet-custom' ),
		'footer' => __( 'Footer Menu', 'honeystreet-custom' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	//add_theme_support( 'post-formats', array(
	//	'aside', 'image', 'video', 'quote', 'link',
	//) );

	// Set up the WordPress core custom background feature.
	//add_theme_support( 'custom-background', apply_filters( 'honeystreet_custom_custom_background_args', array(
	//	'default-color' => 'ffffff',
	//	'default-image' => '',
	//) ) );
}
endif; // honeystreet_custom_setup
add_action( 'after_setup_theme', 'honeystreet_custom_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function honeystreet_custom_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'honeystreet-custom' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'honeystreet_custom_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function honeystreet_custom_scripts() {
	wp_enqueue_style( 'honeystreet-custom-style', get_stylesheet_uri(), array('honeystreet-grid') );
	wp_enqueue_style( 'honeystreet-base', get_template_directory_uri() . '/css/base.css' );
	wp_enqueue_style( 'honeystreet-grid', get_template_directory_uri() . '/css/grid.css', array('honeystreet-base') );

	wp_enqueue_script( 'honeystreet-custom-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'honeystreet-custom-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	
	// Typekit Kit ID udg5rjf
	wp_enqueue_script( 'honeystreet-custom-typekit', '//use.typekit.net/udg5rjf.js', array('jquery') );
	wp_enqueue_script( 'typekit', get_template_directory_uri() . '/js/typekit.js', array('jquery','honeystreet-custom-typekit') );
	
	// Honeystreet Custom JS UI Scripts - loaded into footer
	wp_enqueue_script( 'honeystreet-js', get_template_directory_uri() . '/js/honeystreet.js', array('jquery'), '1.0.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'honeystreet_custom_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';



/**
 * Create Top Level Page and remove default 'Hello World' and 'Sample Page'.
 */
 
if (isset($_GET['activated']) && is_admin()){
        $new_page_title = 'Home';
        $new_page_content = 'This is the page content';
        $new_page_template = ''; //ex. template-custom.php. Leave blank if you don't want a custom page template.
        //don't change the code bellow, unless you know what you're doing
        $page_check = get_page_by_title($new_page_title);
        $new_page = array(
                'post_type' => 'page',
                'post_title' => $new_page_title,
                'post_content' => $new_page_content,
                'post_status' => 'publish',
                'post_author' => 1,
        );
        if(!isset($page_check->ID)){
                $new_page_id = wp_insert_post($new_page);
                if(!empty($new_page_template)){
                        update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
                }
        }
       
        $homeSet = get_page_by_title( 'Home' );
        update_option( 'page_on_front', $homeSet->ID );
        update_option( 'show_on_front', 'page' );
		
		wp_delete_post(1);
        wp_delete_post(2);
}

/**
 * Add "Styles" drop-down
 */
add_filter( 'mce_buttons_2', 'tuts_mce_editor_buttons' );
 
function tuts_mce_editor_buttons( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}
 
/**
 * Add styles/classes to the "Styles" drop-down
 */
// Callback function to filter the MCE settings
function my_mce_before_init_insert_formats( $init_array ) {  
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
			'title' => 'Pioneer Button',  
			'block' => 'span', 
			'classes' => 'pioneer-button', 
		),
		
	);  
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode( $style_formats );  
	
	return $init_array;  
  
} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats', 1 ); 

/**
 * Custom Excerpts
 */
function custom_excerpt_length( $length ) {
	return 18;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
function new_excerpt_more( $more ) {
	return ' ...';
}
add_filter('excerpt_more', 'new_excerpt_more');

/**
 * Breadcrumb navigation Function.
 */
function wordpress_breadcrumbs() {
  $delimiter = '&nbsp;>&nbsp;';
  $currentBefore = '<span class="current">';
  $currentAfter = '</span>';
  if ( !is_front_page() || is_paged() ) {
    echo '<div id="crumbs">';
    global $post;
    if ( is_home() ){
	    echo '<a href="/" class="home-icon">Home</a> &nbsp;>&nbsp; ';
		echo $currentBefore;
		echo 'News Releases';
		echo $currentAfter;	}
	elseif ( is_single() ){
		//
		}
	elseif ( is_page() && !$post->post_parent ) {
		echo '<a href="/" class="home-icon">Home</a> &nbsp;>&nbsp; ';
		echo $currentBefore;
		the_title();
		echo $currentAfter; }
	elseif ( is_page() && $post->post_parent ) {
	  echo '<a href="/" class="home-icon">Home</a> &nbsp;>&nbsp; ';
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
	      if ($parent_id === 236 || $parent_id === 234 || $parent_id === 334 || $parent_id === 238 || $parent_id === 192 || $parent_id === 194 || $parent_id === 198 || $parent_id === 196) {
		      $page = get_page($parent_id);
		  $breadcrumbs[] = '<span>' . get_the_title($page->ID) . '</span>';
		  $parent_id  = $page->post_parent; 
		     } else {
			     $page = get_page($parent_id);
		  $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
		  $parent_id  = $page->post_parent;
		     }
	      
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
      echo $currentBefore;
	  the_title_attribute();
      echo $currentAfter;
    }
    echo '</div>';
  }
}
/**
 * Create ACF Options Page
 *
 */
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Sidebar Widget Settings',
		'menu_title'	=> 'Sidebar Widgets',
		'menu_slug' 	=> 'sidebar-widgets',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
}
/**
 * Create Excerpt from ACF Flexible Content Fields
 */
function custom_field_excerpt() {
	global $post;
	$text = '';
	if (have_rows('content')):
		while ( have_rows('content') ) : the_row();
			if( get_row_layout() == 'body_content_full_width' ):
				$text .= get_sub_field('text');
			endif;
			if( get_row_layout() == '2_columns' ):
				if( have_rows('column_1') ): 
					while ( have_rows('column_1') ) : the_row();
						if( get_row_layout() == 'text' ):
							$text .= get_sub_field('text');
						endif;
					endwhile;
				elseif( have_rows('column_2') ): 
					while ( have_rows('column_2') ) : the_row();
						if( get_row_layout() == 'text' ):
							$text .= get_sub_field('text');
						endif;
					endwhile;
				endif;
			endif;
		endwhile;		
	endif;
	
	if ( '' != $text ) {
		$text = strip_shortcodes( $text );
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]>', $text);
		$excerpt_length = 35; // 50 words
		$excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
		$text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
	}
	return apply_filters('the_excerpt', $text);
}