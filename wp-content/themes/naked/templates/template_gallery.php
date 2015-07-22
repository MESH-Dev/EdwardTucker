<?php 
/**
 * 	Template Name: Gallery - Work
 *
 *	This page template has a sidebar built into it, 
 * 	and can be used as a home page, in which case the title will not show up.
 *
*/
get_header(); // This fxn gets the header.php file and renders it ?>
<main class="page">
	<div id="primary" class="row-fluid">
		<div id="content" role="main" class="span8">
			

			<?php if ( have_posts() ) : 
			// Do we have any posts/pages in the databse that match our query?
			?>

				<?php while ( have_posts() ) : the_post(); 
				// If we have a page to show, start a loop that will display it
				?>

					<article class="post">

						<?php if (!is_front_page()) : // Only if this page is NOT being used as a home page, display the title ?>
							<!-- <h1 class='title'>
								<?php the_title(); // Display the page title ?>
							</h1> -->
						<?php endif; ?>
										
						<div class="the-content">
							<!-- Mockup containers -->
							<div class="container">
								<!-- As of 7/14/15, "Archive" will not be used -->
								<!-- Commenting this out, rather than deleting, for future dev -->
								<!-- <div class="archive-button">
									<p>
										<a href="#">Archives</a>
									</p>
								</div> -->

								<div class="gallery-gateway">

									<div class="over_white filter button">
										<i class="fa fa-fw fa-arrow-left pull-left"></i>
										<a href="#">Filter by industry</a>
									</div>

									<div class="over_white search-work button">
										<i class="fa fa-fw fa-search pull-left"></i>
										<a href="#">Search Work</a>
									</div>

								</div>

								<div class="project-tile">
									<div class="project-tile-overlay over_white">
										<h1><a href="http://localhost:8888/e-tucker/portfolio-of-work/marshallarts/">Marshall Arts Center</a></h1><!-- Custom field? -->
									</div>
									<div class="project-tile-content">
										<img src="<?php echo get_template_directory_uri(); ?>/img/project-tile-1.jpg"/>
									</div>
								</div>

								<div class="project-tile">
									<div class="project-tile-overlay over_white">
										<h1>Look at this</h1><!-- Custom field? -->
									</div>
									<div class="project-tile-content">
										<img src="<?php echo get_template_directory_uri(); ?>/img/project-tile-2.jpg"/>
									</div>
								</div>

								<div class="project-tile">
									<div class="project-tile-overlay over_white">
										<h1>Look at this</h1><!-- Custom field? -->
									</div>
									<div class="project-tile-content">
										<img src="<?php echo get_template_directory_uri(); ?>/img/project-tile-3.jpg"/>
									</div>
								</div>

								<div class="project-tile">
									<div class="project-tile-overlay over_white">
										<h1>Look at this</h1><!-- Custom field? -->
									</div>
									<div class="project-tile-content">
										<img src="<?php echo get_template_directory_uri(); ?>/img/project-tile-4.jpg"/>
									</div>
								</div>

								<div class="project-tile">
									<div class="project-tile-overlay over_white">
										<h1>Look at this</h1><!-- Custom field? -->
									</div>
									<div class="project-tile-overlay over_white">
										<h1>Look at this</h1><!-- Custom field? -->
									</div>
									<div class="project-tile-content">
										<img src="<?php echo get_template_directory_uri(); ?>/img/project-tile-4.jpg"/>
									</div>
								</div>

								<div class="project-tile">
									<div class="project-tile-overlay over_white">
										<h1>Look at this</h1><!-- Custom field? -->
									</div>
									<div class="project-tile-content">
										<img src="<?php echo get_template_directory_uri(); ?>/img/project-tile-3.jpg"/>
									</div>
								</div>

								<div class="project-tile">
									<div class="project-tile-overlay over_white">
										<h1>Look at this</h1><!-- Custom field? -->
									</div>
									<div class="project-tile-content">
										<img src="<?php echo get_template_directory_uri(); ?>/img/project-tile-2.jpg"/>
									</div>
								</div>

								<div class="project-tile">
									<div class="project-tile-overlay over_white">
										<h1>Look at this</h1><!-- Custom field? -->
									</div>
									<div class="project-tile-content">
										<img src="<?php echo get_template_directory_uri(); ?>/img/project-tile-1.jpg"/>
									</div>
								</div>

								<div class="project-tile">
									<div class="project-tile-overlay over_white">
										<h1>Look at this</h1><!-- Custom field? -->
									</div>
									<div class="project-tile-content">
										<img src="<?php echo get_template_directory_uri(); ?>/img/project-tile-2.jpg"/>
									</div>
								</div>

								<div class="project-tile">
									<div class="project-tile-overlay over_white">
										<h1>Look at this</h1> <!-- Custom field? -->
									</div>
									<div class="project-tile-content">
										<img src="<?php echo get_template_directory_uri(); ?>/img/project-tile-4.jpg"/>
									</div>
								</div>

								<div class="project-tile">
									<div class="project-tile-overlay over_white">
										<h1>Look at this</h1><!-- Custom field? -->
									</div>
									<div class="project-tile-content">
										<img src="<?php echo get_template_directory_uri(); ?>/img/project-tile-3.jpg"/>
									</div>
								</div>

								<div class="project-tile">
									<div class="project-tile-overlay over_white">
										<h1>Look at this</h1><!-- Custom field? -->
									</div>
									<div class="project-tile-content">
										<img src="<?php echo get_template_directory_uri(); ?>/img/project-tile-1.jpg"/>
									</div>
								</div>


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