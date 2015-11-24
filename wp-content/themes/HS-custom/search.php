<?php
/**
 * The template for displaying search results pages.
 *
 * @package HS-custom
 */

?>
<!-- using search.php -->
<?php get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
<div class="container">
	<div class="section">
		<div class="col two-thirds">
		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				
				<h1 class="page-title"><?php printf( __( 'Displaying Results for: %s', 'honeystreet-custom' ), '' ); ?></h1><? get_search_form(); ?>
				
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'content', 'search' );
				?>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>
		</div>
		<div class="col third account-links">
			<h3>My Energy Account</h3>
						<?php if( have_rows('left_menu',4) ):
							echo '<ul>';
						    while ( have_rows('left_menu',4) ) : the_row(); 
							if( get_sub_field('link_externally') )
								{ ?>
								    <li class="<?php the_sub_field('icon'); ?>">
							        <a href="<?php the_sub_field('external_link'); ?>" target="_blank">
							        <?php the_sub_field('text'); ?>
							        </a>
							        </li>
								<?php }
								else
								{ ?>
								    <li class="<?php the_sub_field('icon'); ?>">
							        <a href="<?php the_sub_field('link'); ?>">
							        <?php the_sub_field('text'); ?>
							        </a>
							        </li>
								<?php } ?>
						        
						
						    <?php endwhile; 
							echo '</ul>';
						else :
						
						    // no rows found
						
						endif; ?>

		</div>
	</div>
</div>

		</main><!-- #main -->
	</section><!-- #primary -->


<?php get_footer(); ?>
