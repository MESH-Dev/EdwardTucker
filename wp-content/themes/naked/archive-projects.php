<?php
/**
 * The template for displaying the projects page.
 *  
 * 
 */

get_header(); // This fxn gets the header.php file and renders it ?>
	<div id="primary" class="row-fluid">
		<div id="content" role="main" class="span8 offset2">
			<?php 
				// the query

				 $args = array(
					'post_type' => 'projects',
					'posts_per_page' => -1,
					'meta_key'     => 'featured',
					'meta_value'     => '1',  //This refers to the checkbox 1=true, 0=false
					);
				$the_query = new WP_Query( $args ); 

				$count = $the_query->found_posts;
				$profile_class = "four-col";
				//echo '<h1 style="background:red;">' .$count . '</h1>';

				if ($count <= 4):
					$profile_class = 'two-col';

				elseif ($count <= 9 && $count > 4):
					$profile_class = 'three-col';

				endif;
				?>



			<?php if ( $the_query->have_posts() ) : 
			// Do we have any posts in the databse that match our query?
			// In the case of the home page, this will call for the most recent posts 
			?>
			<div class="container" id="project-gallery">

				<div class="gallery-gateway">

									<div class="over_white filter button">
										<div class="sprite r_arrow" style="background-image:url('<?php echo get_template_directory_uri("/"); ?>/img/icon_sprite.png')"></div>
										<a href="#">Filter by industry</a>
									</div>

									<div class="over_white search-work button">
										<div class="sprite search_i" style="background-image:url('<?php echo get_template_directory_uri("/"); ?>/img/icon_sprite.png')"></div>
										<a href="#">Search Work</a>
									</div>

				</div>

				 <aside class="projects-nav gallery over_white hide">
							
							<div class="sprite close" style="background-image:url('<?php echo get_template_directory_uri("/"); ?>/img/icon_sprite.png')"></div>
							<div class="title">Filter by Industry:</div>
							<ul>
							 <?php
						        $args = array(
						          'orderby' => 'name',
						          'order' => 'ASC'
						        );
						        $projectTypes = get_terms('project_type', $args);
						        foreach($projectTypes as $projectType) {
						          echo "<li data-filter='$projectType->slug'>$projectType->name</li>";
						        }
						        ?>
						        <li data-filter='*'>All Work</li>
						       <div class="search-text-link">Search Work <div class="sprite l_arrow" style="background-image:url('<?php echo get_template_directory_uri("/"); ?>/img/icon_sprite.png')"></div></div>
							</ul>
						</aside>

				<aside class="search search_form hide over_white">
					<div class="sprite close" style="background-image:url('<?php echo get_template_directory_uri("/"); ?>/img/icon_sprite.png')"></div>
					<form name="search" style="display:table-cell; vertical-align:middle;">
						<label for="s" class="for-sr"><h2 style="float:left; display:block;">Search Work</h2></label>
						<input type="search" value="" name="s"  placeholder="Search Work...">
					</form>
				</aside>
					<div id="loader" style="display:none;">
						<div class="loader-container animate-loader">
							<img src="<?php echo get_template_directory_uri("/"); ?>/img/eta-loader.png">
						</div>
					</div>
			

			

				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); 
				// If we have some posts to show, start a loop that will display each one the same way
				?>


				<?php if (have_rows ('project_gallery')): //Setup the panels between the top/bottom panels


								 $image = get_field('project_gallery'); //The top level field
						         $topImage = $image[0];
						         $firstrowimagefield = $topImage['project_images']; //The subrow (project_images)
						         $topImageURL = $firstrowimagefield['sizes']['square'];
						         $project_subtitle = get_field('project_subtitle');

								
								
							
					endif; ?>

					<a href="<?php the_permalink(); // Get the link to this post ?>" title="<?php the_title(); ?>">
					<article class="post project-tile hide <?php echo $profile_class; ?>">
						<div class="project-tile-overlay over_white">
							<h1 class="title">
								<!-- <a href="<?php the_permalink(); // Get the link to this post ?>" title="<?php the_title(); ?>"> -->
									<?php the_title(); // Show the title of the posts as a link ?>
								<!-- </a> -->
							</h1>
							<h2 class="sub-title">
								<!-- <a href="<?php the_permalink(); // Get the link to this post ?>" title="<?php the_title(); ?>"> -->
									<?php echo $project_subtitle; ?>
								<!-- </a> -->
							</h2>
						
						</div>
						<div class="project-tile-content">
							<img src="<?php echo $topImageURL; ?>" />
						</div>
						
		
						<div class="meta clearfix">
							<!-- <div class="category"><?php echo get_the_category_list(); // Display the categories this post belongs to, as links ?></div> -->
							<div class="tags"><?php echo get_the_tag_list( '| &nbsp;', '&nbsp;' ); // Display the tags this post has, as links separated by spaces and pipes ?></div>
						</div><!-- Meta -->
						
					</article>
				</a>

				<?php endwhile; // OK, let's stop the posts loop once we've exhausted our query/number of posts ?>
				</div>


			<?php else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) ?>
				
				<article class="post error" style="background:cyan">
					<h1 class="404">Your search did not produce any results!  Please choose a different search term.</h1>
				</article>

			<?php endif; // OK, I think that takes care of both scenarios (having posts or not having any posts) ?>
		</div><!-- #content .site-content -->
	</div><!-- #primary .content-area -->
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>