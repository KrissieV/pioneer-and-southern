<?php
/**
 * The template for displaying all single posts.
 *
 * @package HS-custom
 */

?>
<!-- using single.php -->
<?php get_header(); ?>
<div class="wrapper crumbs">
		<div class="container">
			<div class="breadcrumbs">
				<div id="crumbs">
					<a href="/" class="home-icon">Home</a> &nbsp;>&nbsp; <a href="/about/news-releases">News Releases</a> &nbsp;>&nbsp;<span class="current"> <?php the_title(); ?></span>
				</div>
			</div><!-- .breadcrumbs -->
		</div>
	</div>
<div class="container">
	<div class="section">
		<div class="col three-fourths">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php the_post_navigation(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
		</div>
		<div class="col fourth">
		</div>
	</div>
</div>

<?php get_footer(); ?>
