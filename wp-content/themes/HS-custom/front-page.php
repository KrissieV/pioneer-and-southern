<?php
/**
 * The home page template file.
 *
 * It is used to display the home page.
 
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package HS-custom
 */

?>
<!-- using front-page.php -->
<?php get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			
			<div class="container hero">
			<h1>Welcome to <?php bloginfo( 'name' ); ?></h1>
			<h4><?php bloginfo( 'description' ); ?></h4>
			</div><!-- .container.hero -->

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
			<div class="container">
				<div class="section">
					
					<div class="col third account-links">
						<h3>My Energy Account</h3>
						<?php if( have_rows('left_menu') ):
							echo '<ul>';
						    while ( have_rows('left_menu') ) : the_row(); 
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
					</div><!-- .col.third -->
					<div class="col third">
						<h3><a href="/about/news-releases/">Pioneer News</a></h3>
						
						<?php

						// The Query
						$the_query = new WP_Query(array('post_type' => 'post'));
						
						// The Loop
						if ( $the_query->have_posts() ) {
							echo '<ul class="news-list">';
							while ( $the_query->have_posts() ) {
								$the_query->the_post(); ?>
								<li>
								<?php if ( '' != get_the_post_thumbnail() ) {
							    	$article_thumb = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
									<div class="round thumb" style="background-image:url(<?php echo $article_thumb; ?>);"></div>
								<?php } else { ?>
								<?php }; ?>
									<span class="entry-date"><?php echo get_the_date(); ?></span>
									<h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
									<?php the_excerpt(); ?>
								</li>
							<?php }
							echo '</ul>';
						} else {
							// no posts found
						}
						/* Restore original Post Data */
						wp_reset_postdata(); ?>
					</div>
					<div class="col third">
						<?php the_field('right_content_box');?>
					</div>
				
				</div><!-- .section -->
			</div><!-- .container -->
			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>