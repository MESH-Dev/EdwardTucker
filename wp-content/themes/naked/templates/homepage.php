<?php 
/**
 * 	Template Name: Homepage-fullwidth
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
							<h1 class='title'>
								<?php the_title(); // Display the page title ?>
							</h1>
						<?php endif; ?>
										
						<div class="the-content">
							<?php 

								//Add image/greeting/callout to top(home) panel
								$top_image = get_field('top_panel_background');
								if ( !empty ($top_image)): ?>

							<div class="container home" id="home" style="background-image:url('<?php echo $top_image['url']?>')">
							<?php endif; ?>
								<aside class="greeting over_white">
									<h1><?php echo the_field('top_panel_greeting') ?><!-- <i class="fa fa-fw fa-long-arrow-right fa-small" style="font-size:smaller"></i> --></h1>
								</aside>
								<aside class="homepage-motto over_white hide">
									<h2>
									<?php echo the_field('top_panel_callout'); ?> 
									</h2>
									<!-- <div class="close"><i class="fa fa-fw fa-close"></i></div> -->
								</aside>
	
								<div class="down-container">
									<div class="down">
										<a href="#panel_1"><img src="<?php echo get_template_directory_uri('/'); ?>/img/arrow-down.png" /></a>
									</div>
								</div>

							</div>

							<?php if (have_rows ('additional_homepage_panels')): //Setup the panels between the top/bottom panels
								$ctr = 1; //counters always go in this part of the loop, otherwise they won't increment
							?>
							<?php while (have_rows ('additional_homepage_panels')) : the_row(); //query the entire (parent) repeater field
								

								//setup variables
						         //query sub_fields from the parent field - builds array with all image info
						         $imageArray = get_sub_field('panel_background');  
						         //Pull the alt information for the image from our array
						         $imageAlt = $imageArray['alt']; 
						         //returns the directory location (url) for the appropriate image, ->
						         //here the 'panel-fullwidth' size that we set up in our functions file
						         $imageURL = $imageArray['sizes']['panel-fullwidth']; 

								//Ref custom fields attached to this page
								$callout = get_sub_field('callout_text');
								$cta_text = get_sub_field('cta_link_text');
								$cta_link = get_sub_field('cta_link');
								$id = get_sub_field('cta_link');
							?>

							<div class="container fh" id="panel_<?php echo $ctr ?>" style="background-image:url('<?php echo $imageURL ?>')">
								
							</div>
							<div class="callout">
									<h2><?php echo $callout; ?></h2>
									<div class="callout-link"><a href="<?php echo $cta_link ?>"><?php echo $cta_text; ?></a></p></div>
								</div>
							
							<?php $ctr++; endwhile; ?>

							<?php else: ?>

							<?php endif; //end loop ?>

							<?php //setup the bottom panel

								$bottom_image = get_field('bottom_panel_background');
								if ( !empty ($bottom_image)):

							?>
							<div class="container fh " id="bottom-panel" style="background-image:url('<?php echo $bottom_image['url']?>')">

							<?php 
								else:
							?>
									<div class="warning"><h1>No image has been added to this field yet.  Please check your post </h1></div>
							<?php
								endif; 
							?>
								

							</div>
							<div class="callout final">
									<h2><?php echo the_field('bottom_panel_title')?></h2>
									<div class="center logos">
										<ul>
											<?php if (have_rows ('bottom_panel_links')): //setup the bottom panel link list loop ?>
											<?php while (have_rows ('bottom_panel_links')) : the_row(); 

												//var setup
												$bp_img = get_sub_field('bp_link_image');
												$bp_link = get_sub_field('bp_link');

											?>
											<li>
												<a href="<?php echo $bp_link?>"><img class="this_is_the_list_loop" src="<?php echo $bp_img['url']?>" /></a>

											</li>

											<?php endwhile; ?>
											<?php else: ?>
											<?php endif; ?>
											
										</ul>
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