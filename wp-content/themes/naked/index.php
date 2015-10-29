<?php
/**
 * The template for displaying the home/index page.
 * This template will also be called in any case where the Wordpress engine 
 * doesn't know which template to use (e.g. 404 error)
 */

get_header(); // This fxn gets the header.php file and renders it ?>


						<?php 

							//[get_option('page_for_posts')] -- this is needed since we are using a "static"
							//page for news posts.
							$page_background = get_field('page_background', get_option('page_for_posts'));
							$pg_bg_url=$page_background['sizes']['panel-fullwidth'];
							//var_dump($pg_bg_url);
						?>

<div class="page-bg" style="background-image:url('<?php echo $pg_bg_url; ?>');"></div>
	<div id="primary" class="row-fluid">
		<aside class="search news_search_form hide over_white">
					<div class="sprite close" style="background-image:url('<?php echo get_template_directory_uri("/"); ?>/img/icon_sprite.png')"></div>
					<!-- <form name="search" style="display:table-cell; vertical-align:middle;">
						<label for="s"><h2 style="float:left; display:block;">Search</h2></label>
						<input type="text" value="" name="s"  placeholder="Type to search"> -->
						<?php get_search_form(); ?>
					<!-- </form> -->
		</aside>
		<div class="blog-nav over_white">
			<div class="title"><a title="Return to the News archive" href="<?php echo site_url(); ?>/news">The news</a></div>
			<?php wp_nav_menu( array( 'theme_location' => 'post_sidebar' ) ); ?>
			<div class="search-news-container">
				<a href="#" class="search-news button">Search News ></a>
			</div>
		</div>
		<div id="content" role="main" class="span8 offset2 container over_white o_container blog" >
			<h2>News</h2>
			<div class="o_container_inner">
			<!--<?php get_search_form(); ?>-->
			<?php if ( have_posts() ) : 
			// Do we have any posts in the databse that match our query?
			// In the case of the home page, this will call for the most recent posts 
			?>

				<?php while ( have_posts() ) : the_post(); 
				// If we have some posts to show, start a loop that will display each one the same way
				?>
					

					<article class="post excerpt">
						
						<div class="cat-list">
							<?php echo get_the_category_list ('&nbsp;|&nbsp;'); ?>
						</div>

						<h3 class="title">
							<a href="<?php the_permalink(); // Get the link to this post ?>" title="<?php the_title(); ?>">
								<?php the_title(); // Show the title of the posts as a link ?>
							</a>
						</h3>
						<div class="tags">
							<?php echo get_the_date(''); // Display the time published ?> 
							<?php echo get_the_tag_list('', '&nbsp;|&nbsp;' ); // Display the tags this post has, as links separated by spaces and pipes ?>	
						</div>
						<!-- <div class="tags">
							<?php the_date(''); // Display the time published ?> 
							<?php //echo get_the_tag_list('', '&nbsp;|&nbsp;' ); // Display the tags this post has, as links separated by spaces and pipes ?>
							
							<?php //echo 'Posted In'.get_the_category_list(); ?>
						</div> -->
					
					<?php if(get_field('post_lead')): ?>

						<h4 class="lead"><?php echo the_field('post_lead'); ?></h4>

					<? endif; ?>

						<div class="post-meta">
							<?php //the_time('m/d/Y'); // Display the time published ?> 
							<?php if( comments_open() ) : // If we have comments open on this post, display a link and count of them ?>
								<span class="comments-link">
									<?php comments_popup_link( __( 'Comment', 'break' ), __( '1 Comment', 'break' ), __( '% Comments', 'break' ) ); 
									// Display the comment count with the applicable pluralization
									?>
								</span>
							<?php endif; ?>
						
						</div><!--/post-meta -->
						
						<div class="the-content">
							

							<?php the_excerpt( 'Continue...' ); 
							// This call the main content of the post, the stuff in the main text box while composing.
							// This will wrap everything in p tags and show a link as 'Continue...' where/if the
							// author inserted a <!-- more --> link in the post body
							?>
							
							<?php wp_link_pages(); // This will display pagination links, if applicable to the post ?>
							<!-- <p><a href="<?php //echo get_permalink(); ?>"> Read More...</a></p> -->
						</div><!-- the-content -->
						
						<div class="meta clearfix">
							<!-- <div class="category"><?php //echo get_the_category_list(); // Display the categories this post belongs to, as links ?></div> -->
							<!-- <div class="tags"><?php //echo get_the_tag_list( '| &nbsp;', '&nbsp;&nbsp;' ); // Display the tags this post has, as links separated by spaces and pipes ?></div> -->
						</div><!-- Meta -->
						
					</article>


				<?php endwhile; // OK, let's stop the posts loop once we've exhausted our query/number of posts ?>
				
				<!-- pagintation -->
				<div id="pagination" class="clearfix">
					<div class="past-page"><?php previous_posts_link( '&laquo;&laquo;&nbsp;newer' ); // Display a link to  newer posts, if there are any, with the text 'newer' ?></div>
					<div class="next-page"><?php next_posts_link( 'older&nbsp;&raquo;&raquo;' ); // Display a link to  older posts, if there are any, with the text 'older' ?></div>
				</div><!-- pagination -->


			<?php else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) ?>
				
				<article class="post error">
					<h1 class="404">Your search did not produce any results</h1>
					<h2>
                  			Please use a different search term, or try something more specific.
                	</h2>
				</article>

			<?php endif; // OK, I think that takes care of both scenarios (having posts or not having any posts) ?>
			</div><!-- o_container_inner -->
		</div><!-- #content .site-content -->
	</div><!-- #primary .content-area -->
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>