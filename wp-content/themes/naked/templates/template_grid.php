<?php 
/**
 * 	Template Name: Grid Page
 *
 *	This page template has a sidebar built into it, 
 * 	and can be used as a home page, in which case the title will not show up.
 *
*/
get_header(); // This fxn gets the header.php file and renders it ?>
<main class="page page-grid">
	<div id="primary" class="row-fluid">
		<div id="content" role="main" class="span8">
			
			<?php if ( have_posts() ) : 
			// Do we have any posts/pages in the databse that match our query?
			?>

				<?php while ( have_posts() ) : the_post(); 
				// If we have a page to show, start a loop that will display it
				?>

					<article class="">

						<?php if (!is_front_page()) : // Only if this page is NOT being used as a home page, display the title ?>
							<!-- <h1 class='title'>
								<?php the_title(); // Display the page title ?>
							</h1> -->
						<?php endif; ?>
										
						<div class="">
							<!-- Mockup containers -->
							<div class="container">

								<?php  
								$row = get_field('grid_boxes');
								$row_count = count($row);
								//print_r($row_count);

								if (have_rows('grid_boxes') ):
								$ctr=0;
        						while (have_rows('grid_boxes')) : the_row();

        						//variables
        						$image = get_sub_field('image');
        						$imageURL = $image['sizes']['square'];
        						$link = get_sub_field('link');
        						$label = get_sub_field('label');
        						$rows = get_field('image');
        						$external_link = get_sub_field('external_link');
        						$target = '_self';
        						
        						$profile_class = "four-col";
        						
        						//print_r($image);
        						?>

        						<?php if ($row_count <= 4):
									$profile_class = 'two-col';

									elseif ($row_count < 9 && $row_count > 4):
									$profile_class = 'three-col';

									endif;?>
        						
									<article class="post project-tile <?php echo $profile_class ?> ">
										<div class="project-tile-overlay over_white">
											<h1 class="title">
												<?php if ($external_link == 'true'):
													$target = '_blank'; 
													endif;
													?>

												<a href="<?php echo $link ?>" target="<?php echo $target ?>" alt="Picture of <?php echo $label; ?>" title="Read more about <?php echo $label; ?>">
												
													<?php echo $label ?>
												</a>
											</h1>
										</div>
										<div class="project-tile-content">
											<img src="<?php echo $imageURL; ?>" />
										</div>
										<div class="meta clearfix"></div>
									</article>
								

								<?php $ctr++; endwhile; endif; ?>
								


							</div>
							
							<!-- ================= -->
							<?php the_content(); 
							// This call the main content of the page, the stuff in the main text box while composing.
							// This will wrap everything in paragraph tags
							?>
							
							<?php wp_link_pages(); // This will display pagination links, if applicable to the page ?>
						</div><!-- the-content -->
						
					</article>

				<?php endwhile; // OK, let's stop the page loop once we've displayed it ?>

			<?php else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) ?>
				
				<article class="post error">
					<h1 class="404">Nothing has been posted like that yet</h1>
				</article>

			<?php endif; // OK, I think that takes care of both scenarios (having a page or not having a page to show) ?>
		</div><!-- #content .site-content -->
		<!-- <div id="sidebar" role="sidebar" class="span4">
			<?php get_sidebar(); // This will display whatever we have written in the sidebar.php file, according to admin widget settings ?>
		</div> --><!-- #sidebar -->
	</div>
</main><!-- #primary .content-area -->
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>