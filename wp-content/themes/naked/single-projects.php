<?php
/**
 * The template for displaying any single post.
 *
 */

get_header(); // This fxn gets the header.php file and renders it ?>
	<div id="primary" class="row-fluid">
		<div id="content" role="main" class="span8 offset2">

			<?php if ( have_posts() ) : 
			// Do we have any posts in the databse that match our query?
			?>

				<?php while ( have_posts() ) : the_post(); 
				// If we have a post to show, start a loop that will display it
				?>

					<?php if (have_rows ('project_gallery')): //Setup the panels between the top/bottom panels
					 
								//setup variables


								 $image = get_field('project_gallery');
						         $topImage = $image[0];
						         $firstrowimagefield = $topImage['project_images'];
						         $topImageURL = $firstrowimagefield['sizes']['panel-fullwidth'];
						         $award = get_field('award_winning');
						         $award_link = get_field('award_link');
								 
								 $award_display = 'none';
								
							?>
					<?php endif; ?>
					<div class="container home" id="home" style="background-image:url('<?php echo $topImageURL ?>')">

						<article class="post project-intro my-page">
						<aside class="projects-nav single over_white">
							<div class="sprite r_arrow" style="background-image:url('<?php echo get_template_directory_uri("/"); ?>/img/icon_sprite.png')"></div>
							<!-- <i class="fa fa-fw fa-arrow-left pull-right" style="padding-left:.5em;"></i> -->
						
							<a href="<?php echo site_url(); ?>/projects"> Back To All Work</a>
						</aside>
						
						<aside class="project-overview over_white hide">
						<div class="back">
							<div class="sprite r_arrow alignLeft" style="background-image:url('<?php echo get_template_directory_uri("/"); ?>/img/icon_sprite.png')"></div>
							<a href="<?php echo site_url(); ?>/projects">Back To All Work</a> <!--<?php wp_get_referer(); ?>-->
							
						</div>
						<h1 class="title"><?php the_title(); // Display the title of the post ?></h1>
						<?php $project_subtitle = get_field('project_subtitle')?>
						<h2 class="subtitle"><?php echo $project_subtitle ?></h2>
						<div class="tags"><?php echo get_field('supp_info'); ?></div>
						
						<div class="the-content">
							<?php the_content(); 
							// This call the main content of the post, the stuff in the main text box while composing.
							// This will wrap everything in p tags
							?>
							
							<?php wp_link_pages(); // This will display pagination links, if applicable to the post ?>
								<?php if (!empty ($award_link)):?>
								<a href="<?php echo $award_link ?>" target="_blank" > 

								<?php else: endif; ?>

								<?php if ($award == 'true'): 
								$award_display = 'block'; 
								endif;?>
							<!-- <a href="<?php //echo $award_link ?>" target="_blank" style="display:<?php //echo $award_display ?>"> -->
								<div class="acheivement" style="display:<?php echo $award_display ?>">
										<img src="<?php echo get_template_directory_uri("/"); ?>/img/award-winning.png">
											<!-- <p>Award Winning</p> -->
								</div>
							<?php if (!empty ($award_link)): ?> 
								</a> <?php endif; ?>

						</div><!-- the-content -->
						
						<div class="meta clearfix">
							<!-- <div class="category"><?php echo get_the_category_list(); // Display the categories this post belongs to, as links ?></div> -->
							<div class="tags"><?php echo get_the_tag_list( '| &nbsp;', '&nbsp;' ); // Display the tags this post has, as links separated by spaces and pipes ?></div>
						</div><!-- Meta -->
						
						<!--Hide until we know exactly how this is going to work-->
						<!-- <div class="acheivement">
							<p>Award Winning</p>
						</div> -->
						</aside>

					</article>
				</div>

					<?php if (have_rows ('project_gallery')): //Setup the panels between the top/bottom panels
						$ctr = 1;
					?>
							<?php while (have_rows ('project_gallery')) : the_row(); 
								

								if ($ctr == 1) :
									$ctr++;
									continue;
									endif;
									//setup variables
						         $imageArray = get_sub_field('project_images');
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

					<!-- </div> -->


				<?php endwhile; // OK, let's stop the post loop once we've displayed it ?>
				
				<?php
					// If comments are open or we have at least one comment, load up the default comment template provided by Wordpress
					if ( comments_open() || '0' != get_comments_number() )
						comments_template( '', true );
				?>


			<?php else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) ?>
				
				<article class="post error project">
					<h1 class="404">Nothing has been posted like that yet</h1>
				</article>

			<?php endif; // OK, I think that takes care of both scenarios (having a post or not having a post to show) ?>

		</div><!-- #content .site-content -->
	</div><!-- #primary .content-area -->
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>
