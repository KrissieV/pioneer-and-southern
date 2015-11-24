<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package HS-custom
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<!--<div class="container">
		<header class="section-header">
			<?php if ($post->post_parent) {
				$ancestors=get_post_ancestors($post->ID);
				$root=count($ancestors)-1;
				$parent = $ancestors[$root];
				echo '<h2 class="section-title">'.get_the_title( $parent ).'</h2>';
			} else {
				the_title( '<h2 class="section-title">', '</h2>' );
			} ?>
			
		</header><!-- .entry-header 
	</div><!-- .container -->
	
	<div class="wrapper crumbs">
		<div class="container">
			<div class="breadcrumbs">
				<?php wordpress_breadcrumbs(); ?>
			</div><!-- .breadcrumbs -->
		</div>
	</div>
<div class="container">
	<div class="section">
		<div class="col full">
	<div class="entry-content">
		
			<?php
	
			// check if the flexible content field has rows of data
			if( have_rows('content') ):
			
			     // loop through the rows of data
			    while ( have_rows('content') ) : the_row();
			
			        if( get_row_layout() == 'large_image_block' ): ?>
			
			        	<div class="large-image-block">
				        	<?php 
	
							$image = get_sub_field('image');
							
							if( !empty($image) ): ?>
							
								<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
							
							<?php endif; ?>
				        	<div class="image-typeography">
					        	<h1><?php the_sub_field('text_line_1'); ?><br/>
								<span><?php the_sub_field('text_line_2'); ?></span></h1>
							</div>
			        	</div>
			
			        <?php elseif( get_row_layout() == 'body_content_full_width' ): ?>
					<!-- is it using this? -->
			        	<?php the_sub_field('text');
			        	
			
			        elseif( get_row_layout() == '2_columns' ): 
	
						// check if the nested flexible content field has rows of data
						if( have_rows('column_1') ): ?>
							<div class="section no-marg"><div class="col half">
						    <?php // loop through the rows of data
						    while ( have_rows('column_1') ) : the_row();
						
						        if( get_row_layout() == 'image' ): 
	
									$image = get_sub_field('image');
							
									if( !empty($image) ): ?>
							
									<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
							
									<?php endif;
						
						        elseif( get_row_layout() == 'video' ): ?>
			
						        	<div class="embed-container">
						        		<?php the_sub_field('video'); ?>
						        	</div>
						
						        <?php elseif( get_row_layout() == 'text' ): 
						
						        	the_sub_field('text');
						
						        elseif( get_row_layout() == 'heading' ): ?>
						
						        	<h3><?php the_sub_field('heading_text'); ?></h3>
						
						        <?php endif;
						
						    endwhile; ?>
							</div><!-- .col.half -->
						<?php else :
						
						    // no layouts found
						
						endif;
						
						// check if the nested flexible content field has rows of data
						if( have_rows('column_2') ): ?>
							<div class="col half">
						    <?php // loop through the rows of data
						    while ( have_rows('column_2') ) : the_row();
						
						        if( get_row_layout() == 'image' ): 
	
									$image = get_sub_field('image');
							
									if( !empty($image) ): ?>
							
									<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
							
									<?php endif;
						
						        elseif( get_row_layout() == 'video' ): ?>
			
						        	<div class="embed-container">
						        		<?php the_sub_field('video'); ?>
						        	</div>
						
						        <?php elseif( get_row_layout() == 'text' ): 
						
						        	the_sub_field('text');
						
						        elseif( get_row_layout() == 'heading' ): ?>
						
						        	<h3><?php the_sub_field('heading_text'); ?></h3>
						
						        <?php endif;
						
						    endwhile; ?>
							</div><!-- .col.half --></div><!-- .section -->
						<?php else :
						
						    // no layouts found
						
						endif;
			        	
			
			        elseif( get_row_layout() == 'heading_block' ): ?>
			
			        	<h1><?php the_sub_field('large_heading'); ?></h1>
			        	<h3 class="subtitle"><?php the_sub_field('subheading'); ?></h3>
			
			        <?php elseif( get_row_layout() == 'video' ): ?>
			
			        	<div class="embed-container">
			        		<?php the_sub_field('video'); ?>
			        	</div>
			
			        <?php endif;
			
			    endwhile;
			
			else :
			
			    // no layouts found
			
			endif;
			
			?>
			
			<?php the_content(); ?>
		
	</div><!-- .entry-content -->
	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'honeystreet-custom' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
	</div>
		
	
	</div>
</div><!-- .container -->	
</article><!-- #post-## -->