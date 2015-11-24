<?php
/**
 * @package WordPress
 * @subpackage HS-custom
 * Template Name: Full-width Layout
 */
 ?>
<!-- using template-fullwidth.php -->
<?php get_header(); ?>

	<div id="primary" class="content-area sub-page">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page-fullwidth' ); ?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>
