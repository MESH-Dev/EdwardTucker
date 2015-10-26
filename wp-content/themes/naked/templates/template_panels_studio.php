<?php 
/**
 * 	Template Name: Studio page - Individual
 *
 *	This page template has a sidebar built into it, 
 * 	and can be used as a home page, in which case the title will not show up.
 *
*/
get_header(); // This fxn gets the header.php file and renders it ?>
<main class="page single-panel">
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

						<?php if (have_rows ('background_images')): //Setup the panels between the top/bottom panels
					 
								//setup variables


								 $image = get_field('background_images');
						         $topImage = $image[0];
						         $firstrowimagefield = $topImage['image'];
						         $topImageURL = $firstrowimagefield['sizes']['panel-fullwidth'];
						         //var_dump($topImageURL);
								
								
							?>
						<?php endif; ?>
										
						<div class="">
							<!-- Mockup containers -->
							<div class="container home" style="background-image:url('<?php echo $topImageURL; ?>')">
								<div class="project-intro"><h1><?php $topImageURL; ?></h1>
								<aside class="projects-nav single over_white">
							<div class="sprite r_arrow" style="background-image:url('<?php echo get_template_directory_uri("/"); ?>/img/icon_sprite.png')"></div>
							<!-- <i class="fa fa-fw fa-arrow-left pull-right" style="padding-left:.5em;"></i> -->
						
							<a href="<?php echo site_url(); ?>/studio"> Back To Our Studio</a>
						</aside>
						
						<aside class="project-overview over_white hide">
						<div class="back">
							<div class="sprite r_arrow alignLeft" style="background-image:url('<?php echo get_template_directory_uri("/"); ?>/img/icon_sprite.png')"></div>
							<a href="<?php echo site_url(); ?>/studio">Back To Our Studio</a> <!--<?php wp_get_referer(); ?>-->
							
						</div>
						<h1 class="title"><?php the_title(); // Display the title of the post ?></h1>
						<div class="the-content">
							<?php the_content(); 
							// This call the main content of the post, the stuff in the main text box while composing.
							// This will wrap everything in p tags
							?>
							
							
							<?php wp_link_pages(); // This will display pagination links, if applicable to the post ?>
						</div><!-- the-content -->
									
						</aside>
								</div>
							</div>

							<?php if (have_rows ('background_images')): //Setup the panels between the top/bottom panels
									$ctr = 1;
								?>
							<?php while (have_rows ('background_images')) : the_row(); 
								

								if ($ctr == 1) :
									$ctr++;
									continue;
									endif;
									//setup variables
						         $imageArray = get_sub_field('image');
						         $imageAlt = $imageArray['alt'];
						         $imageURL = $imageArray['sizes']['panel-fullwidth'];

								
								
							?>

							<div class="container fh" id="panel_<?php echo $ctr ?>" style="background-image:url('<?php echo $imageURL ?>')">
								<!-- <div class="callout">
									<h2><?php echo $callout; ?></h2>
									<div class="callout-link"><a href="<?php echo $cta_link ?>"><?php echo $cta_text; ?></a></p></div>
								</div> -->
							</div>
							
							<?php $ctr++; endwhile; ?>

							<?php else: ?>

							<?php endif; //end loop ?>

							

							</div>
							<!-- ================= -->
							<?php //the_content(); 
							// This call the main content of the page, the stuff in the main text box while composing.
							// This will wrap everything in paragraph tags
							?>
							
							<?php //wp_link_pages(); // This will display pagination links, if applicable to the page ?>
						</div><!-- the-content -->
						
					</article>

				<?php endwhile; // OK, let's stop the page loop once we've displayed it ?>

			<?php else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) ?>
				
				<article class="post error">
					<h1 class="404">Your search did not produce any results</h1>
					<h2>
                  			Please use a different search term, or try something more specific.
                	</h2>
				</article>

			<?php endif; // OK, I think that takes care of both scenarios (having a page or not having a page to show) ?>
		</div><!-- #content .site-content -->
		<!-- <div id="sidebar" role="sidebar" class="span4">
			<?php get_sidebar(); // This will display whatever we have written in the sidebar.php file, according to admin widget settings ?>
		</div> --><!-- #sidebar -->
	</div>
</main><!-- #primary .content-area -->
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>