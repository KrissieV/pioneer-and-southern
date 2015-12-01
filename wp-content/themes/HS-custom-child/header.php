<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package HS-custom
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href="http://southernpioneer.net/favicon.ico" rel="icon" type="image/x-icon" />
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	
	
	

<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'honeystreet-custom' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		
		<nav id="utility-navigation" class="utility-navigation" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'utility','container' => false ) ); ?>
			
			<ul><li class="search-toggle">
				<a class="search-btn">Search</a>
				<div class="search-box hide"><?php get_search_form(); ?></div>
			</li></ul>
		</nav>
		
		<div class="wrapper nav">
		<div class="container">
			<div class="container">
				<div class="container">
			<div class="section">
				<div class="site-branding col fifth">
					<?php if ( get_theme_mod( 'honeystreet_logo' ) ) : ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" id="site-logo" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
							<?php if (is_front_page()) { ?>
								<img src="<?php echo get_theme_mod( 'honeystreet_logo' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" class="desktop-logo">
								<img src="<?php echo get_theme_mod( 'honeystreet_footer_logo' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" class="mobile-logo" width=210>
							<?php } else { ?>
								<img src="<?php echo get_theme_mod( 'honeystreet_footer_logo' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" width=210>
							<?php } ?>
			 			</a>
					 
					<?php else : ?>
					               
					    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
					               
					<?php endif; ?>
			
				
				</div><!-- .site-branding -->
			
				<nav id="site-navigation" class="main-navigation col four-fifths" role="navigation">
					<button class="menu-toggle" aria-controls="menu" aria-expanded="false"><?php _e( 'Primary Menu', 'honeystreet-custom' ); ?></button>
					<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
				</nav><!-- #site-navigation -->
			</div><!-- .section -->
			</div><!-- .container -->
			</div><!-- .container -->
		</div><!-- .container -->
		</div><!-- .wrapper.nav -->
		
	</header><!-- #masthead -->
	
	<?php if(is_page()) { ?>
	<?php if ($post->post_parent) {
			$ancestors=get_post_ancestors($post->ID);
			$root=count($ancestors)-1;
			$parent = $ancestors[$root];
			$url = wp_get_attachment_url( get_post_thumbnail_id($parent) ); 
			$mobileurl = get_field('mobile_feature_image',$parent);?>
			<style>
				.background-image {
					background-image: url(<?php echo $mobileurl['url']; ?>);
				}
				@media only screen and (min-width:769px) {
					.background-image {background-image: url(<?php echo $url; ?>);}
				}
			</style>
			<div class="background-image"></div>
		<?php } else {
			if ( '' != get_the_post_thumbnail() ) {
	    	$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
	    	$mobileurl = get_field('mobile_feature_image'); ?>
	    	<style>
				.background-image {
					background-image: url(<?php echo $mobileurl['url']; ?>);
				}
				@media only screen and (min-width:769px) {
					.background-image {background-image: url(<?php echo $url; ?>);}
				}
			</style>
			<div class="background-image"></div>
			<?php } else { ?>
			<?php };
		} 
		} else if(is_home() || is_single()) {
			$url = wp_get_attachment_url( get_post_thumbnail_id(161) ); 
			$mobileurl = get_field('mobile_feature_image',161);?>
			<style>
				.background-image {
					background-image: url(<?php echo $mobileurl['url']; ?>);
				}
				@media only screen and (min-width:769px) {
					.background-image {background-image: url(<?php echo $url; ?>);}
				}
			</style>
			<div class="background-image"></div>

		<?php };
		?>

	<div id="content" class="site-content">
