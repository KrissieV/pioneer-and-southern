<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package HS-custom
 */

?>
<!-- using 404.php -->
<?php get_header(); ?>
<div class="container">
	<div class="section">
		<div class="col two-thirds">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'honeystreet-custom' ); ?></h1>
					
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links to the right (or below on mobile) or do a search?', 'honeystreet-custom' ); ?></p>
					<p> &nbsp; </p>
					<div class="content-search-box">
						<h3>What are you trying to find?</h3>
						<?php get_search_form(); ?>
					</div>

					

					

					
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->
		</div>
		<div class="col third account-links">
			<h3>My Energy Account</h3>
						<?php if( have_rows('left_menu',39) ):
							echo '<ul>';
						    while ( have_rows('left_menu',39) ) : the_row(); 
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

<?php get_footer(); ?>
