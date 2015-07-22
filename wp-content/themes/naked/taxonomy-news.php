<?php
/**
 * The template for displaying the home/index page.
 * This template will also be called in any case where the Wordpress engine 
 * doesn't know which template to use (e.g. 404 error)
 */

get_header(); // This fxn gets the header.php file and renders it ?>
	<div id="primary" class="row-fluid">
		<div id="content" role="main" class="span8 offset2">
			<?php 
				// the query

				 $args = array(
					'post_type' => 'projects',
					'post_per_page' => -1,
					'meta_key'     => 'featured',
					'meta_value'     => '1',
					);
				$the_query = new WP_Query( $args ); 

				$count = $the_query->found_posts;
				$profile_class = "four-col";
				//echo '<h1 style="background:red;">' .$count . '</h1>';

				if ($count <= 4):
					$profile_class = 'two-col';

				elseif ($count < 9 && $count > 4):
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
										<i class="fa fa-fw fa-arrow-left pull-left"></i>
										<a href="#">Filter by industry</a>
									</div>

									<div class="over_white search-work button">
										<i class="fa fa-fw fa-search pull-left"></i>
										<a href="#">Search Work</a>
									</div>

				</div>

				 <aside class="projects-nav over_white desktop-only" style="position:absolute; z-index:305;">
							
							<strong>Filter by Industry:</strong>
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
						       <li>Search</li>
							</ul>
						</aside>
					<div id="loader" style="display:none;">Loading...</div>
			<!--<?php query_posts($query_string . '&posts_per_page=-1' );?>-->

			

				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); 
				// If we have some posts to show, start a loop that will display each one the same way
				?>


				<?php if (have_rows ('project_gallery')): //Setup the panels between the top/bottom panels


								 $image = get_field('project_gallery'); //The top level field
						         $topImage = $image[0];
						         $firstrowimagefield = $topImage['project_images']; //The subrow (project_images)
						         $topImageURL = $firstrowimagefield['sizes']['square'];

								
								
							
					endif; ?>


					<article class="post project-tile <?php echo $profile_class; ?>">
						<div class="project-tile-overlay over_white">
							<h1 class="title">
								<a href="<?php the_permalink(); // Get the link to this post ?>" title="<?php the_title(); ?>">
									<?php the_title(); // Show the title of the posts as a link ?>
								</a>
							</h1>
						</div>
						<div class="project-tile-content">
							<img src="<?php echo $topImageURL; ?>" />
						</div>
						
		
						<div class="meta clearfix">
							<!-- <div class="category"><?php echo get_the_category_list(); // Display the categories this post belongs to, as links ?></div> -->
							<div class="tags"><?php echo get_the_tag_list( '| &nbsp;', '&nbsp;' ); // Display the tags this post has, as links separated by spaces and pipes ?></div>
						</div><!-- Meta -->
						
					</article>

				<?php endwhile; // OK, let's stop the posts loop once we've exhausted our query/number of posts ?>
				</div>


			<?php else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) ?>
				
				<article class="post error" style="background:cyan">
					<h1 class="404">Nothing has been posted like that yet</h1>
				</article>

			<?php endif; // OK, I think that takes care of both scenarios (having posts or not having any posts) ?>
		</div><!-- #content .site-content -->
	</div><!-- #primary .content-area -->
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>