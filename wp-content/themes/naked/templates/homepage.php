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
							<!-- <h1 class='title'>
								<?php the_title(); // Display the page title ?>
							</h1> -->
						<?php endif; ?>
										
						<div class="the-content">
							<?php 

								//Add image/greeting/callout to top(home) panel
								//$top_image = get_field('top_panel_background');
								//$top_image_url = $top_image['sizes']['panel-fullwidth'];

								$ctr_bi=0;
								$bg_array[0]='http://localhost:8888/e-tucker/wp-content/uploads/2015/07/e_tucker_background_3.png';
								$bg_array[1]='http://localhost:8888/e-tucker/wp-content/uploads/2015/07/e_tucker_background_2.png';

								
								$top_background = get_sub_field('top_panel_background_n');
								$top_panel = get_field('top_panel_background');
								$top_background_urls = $top_background['sizes']['panel-fullwidth'];
								$first_panel_background = $top_background_urls[0];
								$top_panel_one = get_field('top_panel_background');
								$top_panel_one_url = $top_panel_one['sizes']['panel-fullwidth'];
								$top_panel_two = get_field('top_panel_background_two');
								$top_panel_two_url = $top_panel_two['sizes']['panel-fullwidth'];
								$top_panel_three = get_field('top_panel_background_three');
								$top_panel_three_url = $top_panel_three['sizes']['panel-fullwidth'];
								//var_dump($top_background_urls);
								//if ( !empty ($top_image)): ?>

							<aside class="greeting over_white">
									<script>
										var ctr = 0;
										$(function(){
										      $(".special-words").typed({
										      	
										        strings: ["<?php echo the_field('special_word_one'); ?>", "<?php echo the_field('special_word_two'); ?>", "<?php echo the_field('special_word_three'); ?>"],
										        typeSpeed: 150,
										        backSpeed: 150,
										        backDelay: 500,
										        loopCount: true,
										        showCursor: false,
										        loop: true,
										        onStringTyped:

										        function(){
										        	
										        	var background = ['<?php echo $top_panel_two_url ?>','<?php echo $top_panel_three_url ?>', '<?php echo $top_panel_one_url ?>' 
										        	]
										        	
										        	//console.log(ctr);
										        	//console.log(this.arrayPos);
										        	
										        	
										        	//$('#home').css({backgroundImage:'url("' + background[ctr] + '")'});
										        	$('#home').delay(800).fadeTo(600, 0.1, function() 
										        		{ $(this).css('background-image', 'url(' + background[ctr] + ')'); }).fadeTo(800, 1); 
										        		$('.greeting').css({opacity:1});

										        	//alert("Done");
										  

										        	ctr++

										        	if (ctr > 2){
										        		ctr=0
										        	}
										        }
										      });
										  });
										</script>
									<h1><?php echo the_field('top_panel_greeting') ?><br/>

										<span class="special-words"></span><!-- <i class="fa fa-fw fa-long-arrow-right fa-small" style="font-size:smaller"></i> --></h1>
								</aside>

							<div class="container home" id="home" style="background-blend-mode: multiply; background-image:url('<?php echo $top_panel_one_url; ?>'); 
									"><!-- transition: background 0.5s ease-in-out; -->
							<?php //endwhile; endif; ?>

								<!-- <aside class="homepage-motto over_white hide">
									<h2>
										
									<?php //echo the_field('top_panel_callout'); ?> 
									</h2>
									 <div class="close"><i class="fa fa-fw fa-close"></i></div> 
								</aside> -->
	
								<div class="down-container">
									<div class="down">
										<a href="#panel_1"><img alt="Down arrow - click here to proceed to the next section of this page" src="<?php echo get_template_directory_uri('/'); ?>/img/arrow-down.png" /></a>
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
								$cta_external = get_sub_field('cta_external');
								$cta_target = "_self";
								$arrows = "";

								if ($cta_external == 'true'):
									$cta_target = '_blank'; 
									endif;

								// if(!empty ($cta_link)):
								// 	$arrows = "&nbsp;&raquo;&raquo;";
								// 	endif;


							?>
							<?php if ($ctr == 1) :?>
							
							<div class="callout">
									<h2><?php echo $callout; ?></h2>
									<div class="callout-link">
										<p>
											<?php if(!empty ($cta_link)):
												$arrows = "&nbsp;&raquo;&raquo;";
												echo '<a href="' . $cta_link .'" target="'. $cta_target .'">';
											endif;?>
											<!-- <a href="<?php //echo $cta_link ?>" target="<?php //echo $cta_target;?>"> -->
												<?php echo $cta_text; ?><?php echo $arrows; ?>
											<?php if(!empty ($cta_link)):
											echo '</a>';
											endif;
											?>
										</p>
									</div>
								</div>
							<div class="container fh" id="panel_<?php echo $ctr ?>" style="background-image:url('<?php echo $imageURL ?>')">
								
							</div>
							<!--New Staff container-->
							<div class="callout staff">
								<?php 
								$p_callout = get_field('principles_callout');?>
								
								<h2><?php echo $p_callout; ?></h2>
								<div class="container_mesh">
									<!-- <div class="row"> -->
							
								
								<?php
								if (have_rows ('staff_list')): 
									$ctr_s = 0;
									while(have_rows('staff_list')) : the_row();
									$ctr_s++;
									$p_img = get_sub_field('image');
									$p_img_url = $p_img['sizes']['square'];
									$p_name = get_sub_field('name');
									$p_title = get_sub_field('title');
									$p_link = get_sub_field('link');
									$p_external = get_sub_field('p_external');
									$p_target = "_self";

									if ($p_external == 'true'):
										$p_target = '_blank'; 
										endif;
													

								?>
								<?php if ($ctr_s%3 == 1){echo '<div class="row">';}?>
									<a href="<?php echo $p_link; ?>" target="<?php echo $p_target; ?>">
										<div class="four columns staff-list">
											<div class="staff-container">
												<img alt="Picture of <?php echo $p_name; ?>" src="<?php echo $p_img_url; ?>">
												<h2 class="p_name"><?php echo $p_name ?></h2>
												<h3 class="p_title"><?php echo $p_title ?></h3>
											</div>
										</div>
									</a>
								<?php if ($ctr_s%3 == 0 ){echo '</div>';}?>
							<?php endwhile; endif; ?>
							<!-- </div> -->
							<?php  if ($ctr_s%3 == 1) : ?>
      		 					</div><!--This is the final div-->

      						<?php endif;?>
      						<?php 
      							$ps_text = get_field('ps_cta_text');
      							$ps_link = get_field('ps_cta_link');
      						?>
      						<!-- <div class="callout-link"><a href="<?php //echo $ps_link ?>"><?php //echo $ps_text; ?>&nbsp;&raquo;&raquo;</a></p></div> -->
						</div>
					</div>
					<!--End Staff Container-->
							
							
							<?php else :?>

							<div class="container fh" id="panel_<?php echo $ctr ?>" style="background-image:url('<?php echo $imageURL ?>')">
								
							</div>

							<div class="callout">
									<h2><?php echo $callout; ?></h2>
									<div class="callout-link">
										<p>
											<?php if(!empty ($cta_link)):
												$arrows = "&nbsp;&raquo;&raquo;";
												echo '<a href="' . $cta_link .'" target="'. $cta_target .'">';
											endif;?>
												<?php echo $cta_text; ?><?php echo $arrows; ?>
											<?php if(!empty ($cta_link)):
												echo '</a>';
											endif; ?>
										</p>
									</div>
								</div>

							<?php endif; ?>

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
									<div class="warning"><h2>No image has been added to this field yet.  Please check your post </h2></div>
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
												$bp_img_url = $bp_img['sizes']['panel-fullwidth'];
												$bp_link = get_sub_field('bp_link');
												$bpl_external = get_sub_field('bpl_external');
												$bpl_target = "_self";

											?>

											<?php if ($bpl_external == 'true'):
													$bpl_target = '_blank'; 
													endif;
													?>
											<li>
												<a href="<?php echo $bp_link?>" target="<?php echo $bpl_target ?>"><img alt="Click here to visit <?php echo $bp_link;?>" src="<?php echo $bp_img_url; ?>" /></a>

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