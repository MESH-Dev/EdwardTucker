<?php 
/**
 * 	Template Name: Project page - Individual
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
							<div class="container home" style="background-image:url('<?php echo get_template_directory_uri('/'); ?>/img/e_tucker_background_1.png')">
								<div class="title">
								<aside class="projects-nav over_white">
									<i class="fa fa-fw fa-arrow-left pull-right" style="padding-left:.5em;"></i>
									<a href="#">Back To All Work</a> 
								</aside>
								<aside class="project-overview over_white">
									<h1>Marshall Arts Center</h1>
									<p>TYPE, Date, other tags<br>
										Body Copy: Marshall Arts Center Marshall Arts Center Marshall Arts Center Marshall Arts Center 
										Marshall Arts Center Marshall Arts Center. Marshall Arts Center. Marshall Arts Center Marshall 
										Arts Center Marshall Arts Center Marshall Arts Center Marshall Arts Center Marshall Arts Center. 
										Marshall Arts Center. Marshall Arts Center Marshall Arts Center Marshall Arts Center Marshall Arts 
										Center Marshall Arts Center Marshall Arts Center. Marshall Arts Center. This project has won X, Y, Z.</p>
									<div class="acheivement">
										<p>Award Winning</p>
									</div>
								</aside>
								</div>
							</div>
							<div class="container fh red">
								<div class="callout">
									<h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
									Vestibulum pretium leo libero, at euismod dui aliquet id. Aenean molestie consectetur lorem, vitae gravida felis tempor.</h2>
								</div>
							</div>
							<div class="container fh blue">
								<div class="callout">
									<h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
									Vestibulum pretium leo libero, at euismod dui aliquet id. Aenean molestie consectetur lorem, vitae gravida felis tempor.</h2>
								</div>
							</div>
							<div class="container fh green">
								<div class="callout">
									<h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
									Vestibulum pretium leo libero, at euismod dui aliquet id. Aenean molestie consectetur lorem, vitae gravida felis tempor.</h2>
									<div class="center logos">
										<ul>
											<li><img src="<?php echo get_template_directory_uri("/"); ?>/img/footer-logos_mockup.png" /></li>
											<li><img src="<?php echo get_template_directory_uri("/"); ?>/img/footer-logos_mockup.png" /></li>
											<li><img src="<?php echo get_template_directory_uri("/"); ?>/img/footer-logos_mockup.png" /></li>
											<li><img src="<?php echo get_template_directory_uri("/"); ?>/img/footer-logos_mockup.png" /></li>
											<li><img src="<?php echo get_template_directory_uri("/"); ?>/img/footer-logos_mockup.png" /></li>
											<li><img src="<?php echo get_template_directory_uri("/"); ?>/img/footer-logos_mockup.png" /></li>
											<li><img src="<?php echo get_template_directory_uri("/"); ?>/img/footer-logos_mockup.png" /></li>
											<li><img src="<?php echo get_template_directory_uri("/"); ?>/img/footer-logos_mockup.png" /></li>
										</ul>
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