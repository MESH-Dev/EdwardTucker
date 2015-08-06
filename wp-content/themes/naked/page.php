<?php
/**
 * The template for displaying any single page.
 * ie default
 */

get_header(); // This fxn gets the header.php file and renders it ?>
	<div class="page-bg" style="background:url('<?php echo get_template_directory_uri("/"); ?>/img/e_tucker_background_1.jpg'); background-repeat:no-repeat; background-position:center center; background-size:cover; background-attachment:fixed;width: 100%;height: 100%;position: fixed;"></div>
	<div id="primary" class="row-fluid">
		<div id="content" role="main" class="span8 offset2 container default" >

			<!--Loop -->
			<?php if ( have_posts() ) : 
			// Do we have any posts/pages in the databse that match our query?
			?>

				<?php while ( have_posts() ) : the_post(); 
				// If we have a page to show, start a loop that will display it
				?>

					<article class="post">
						
						<div class="the-content over_white">

							<h2 class="title"><?php the_title(); // Display the title of the page ?></h2>

							<?php the_content(); 
							// This call the main content of the page, the stuff in the main text box while composing.
							// This will wrap everything in p tags
							?>
							
							<?php wp_link_pages(); // This will display pagination links, if applicable to the page ?>
						</div><!-- the-content -->
						
					</article>

				<?php endwhile; // OK, let's stop the page loop once we've displayed it ?>

			<?php else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) ?>
			<!-- End loop -->		
				<article class="post error">
					<h1 class="404">Nothing posted yet</h1>
				</article>

			<?php endif; // OK, I think that takes care of both scenarios (having a page or not having a page to show) ?>

		</div><!-- #content .site-content -->
	</div><!-- #primary .content-area -->
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>