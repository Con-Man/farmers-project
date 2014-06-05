<?php
/**
 * Template Name: Button Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<div id="main-content" class="main-content">

<?php
	if ( is_front_page() && twentyfourteen_has_featured_posts() ) {
		// Include the featured content template.
		get_template_part( 'featured-content' );
	}
?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content button-page-margins" role="main">
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					// Include the page content template.
					get_template_part( 'content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				endwhile;


			?>
			
		<?php
 
			// check if the repeater field has rows of data
			if( have_rows('button') ):
			 
			 	// loop through the rows of data
			    while ( have_rows('button') ) : the_row();
			 
					// display the image for the button
					$button_image = get_sub_field('button-image');

					if(!empty($button_image)): ?>
						<div class='menu_button'>
							<img class="button_image" src="<?php echo $button_image['url']; ?>" alt="<?php echo $button_image['alt']; ?>" />

					<?php 

					endif;?>
						
						<!-- <div class="button_text"> -->
				         <!-- display a sub field value -->
				        <p class="button_name"><?php the_sub_field('button_name'); ?></p>

				       	</br>

				        <!-- display the blurb for the button -->
				       <p class="button_blurb"> <?php the_sub_field('button_blurb'); ?> </p>
						<!-- </div> -->


			        </div>

			        <?php
			 
			    endwhile;
			 
			else :
			 
			    // no rows found
			 
			endif;
 
		?>

		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- #main-content -->

<?php
// get_sidebar();
get_footer();
