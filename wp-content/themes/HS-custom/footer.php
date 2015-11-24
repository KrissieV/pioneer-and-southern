<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package HS-custom
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="wrapper footer-menu">
			<div class="container">
				<div class="section">
					<div class="col four-fifths">
						<?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
					</div>
					<div class="col fifth">
						<?php if ( get_theme_mod( 'honeystreet_footer_logo' ) ) : ?>
						<img src="<?php echo get_theme_mod( 'honeystreet_footer_logo' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" width=210>
						
						
						<p><strong><?php echo get_theme_mod( 'honeystreet_footer_text' ); ?></strong><br/>
						<span><?php echo get_theme_mod( 'honeystreet_footer_text_two' ); ?></span></p>
						<p><strong><?php echo get_theme_mod( 'honeystreet_footer_text_three' ); ?></strong><br/>
						<span><?php echo get_theme_mod( 'honeystreet_footer_text_four' ); ?></span></p>
					 
					<?php else : ?>
					               
					    <h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
											               
					<?php endif; ?>

					</div><!-- .col.fifth -->
				</div><!-- .section -->
				</div><!-- .container -->
		</div><!-- .wrapper -->
		
				<div class="touchstone">
					<img src="/wp-content/themes/HS-custom/images/logo-touchstone.png" alt="logo-touchstone" width="360" />
					<p>&copy; Pioneer Electric Cooperative, Inc.</p>
				</div><!-- .section -->
			
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
