<?php
/**
 * The template for displaying any single post.
 *
 */

get_header(); // This fxn gets the header.php file and renders it ?>

	<?php 
		$page_background = get_field('page_background');
		$pg_bg_url=$page_background['sizes']['panel-fullwidth'];
		//print_r($pg_bg_url);
	?>

	<div class="page-bg" style="background-image:url('<?php echo $pg_bg_url; ?>');"></div>
	<div id="primary" class="row-fluid">
		<div id="content" role="main" class="span8 offset2 container">

			<?php if ( have_posts() ) : 
			// Do we have any posts in the databse that match our query?
			?>

				<?php while ( have_posts() ) : the_post(); 
				// If we have a post to show, start a loop that will display it
				?>
					<div class="blog-nav over_white">
						<div class="title"><a href="/news" title="See all news stories">The news</a></div>
						<?php wp_nav_menu( array( 'theme_location' => 'post_sidebar' ) ); ?>
					</div>

					<article class="post over_white o_container">
						<div class="o_container_inner">
						<div class="cat-list">
							<?php echo get_the_category_list ('&nbsp;|&nbsp;'); ?>
						</div>
						<h1 class="title"><?php the_title(); // Display the title of the post ?></h1>
						<div class="tags">
							<?php echo get_the_date(''); // Display the time published ?> 
							<?php echo get_the_tag_list('', '&nbsp;|&nbsp;' ); // Display the tags this post has, as links separated by spaces and pipes ?>
						</div>
						<!--<div class="post-meta">
							<?php //the_time('m.d.Y'); // Display the time it was published ?>
							<?php // the author(); Uncomment this and it will display the post author ?>
						
						</div>--><!--/post-meta -->
						
						<div class="the-content">
								
						<?php if(get_field('post_lead')): ?>

							<h2 class="lead"><?php echo the_field('post_lead'); ?></h2>

						<? endif; ?>
								
							<?php the_content(); 
							// This call the main content of the post, the stuff in the main text box while composing.
							// This will wrap everything in p tags
							?>
							<!-- Go to www.addthis.com/dashboard to customize your tools -->
								<div class="addthis_sharing_toolbox"></div>
							<?php wp_link_pages(); // This will display pagination links, if applicable to the post ?>
						</div><!-- the-content -->
						
						<div class="meta clearfix">
							<!-- <div class="category"><?php echo get_the_category_list(); // Display the categories this post belongs to, as links ?></div> -->
							<!-- <div class="tags"><?php echo get_the_tag_list( '| &nbsp;', '&nbsp;' ); // Display the tags this post has, as links separated by spaces and pipes ?></div> -->
						</div><!-- Meta -->
						</div>
					</article>

				<?php endwhile; // OK, let's stop the post loop once we've displayed it ?>
				
				<?php
					// If comments are open or we have at least one comment, load up the default comment template provided by Wordpress
					if ( comments_open() || '0' != get_comments_number() )
						comments_template( '', true );
				?>


			<?php else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) ?>
				
				<article class="post error">
					<h1 class="404">Your search did not produce any results</h1>
					<h2>
                  			Please use a different search term, or try something more specific.
                	</h2>
				</article>

			<?php endif; // OK, I think that takes care of both scenarios (having a post or not having a post to show) ?>

		</div><!-- #content .site-content -->
	</div><!-- #primary .content-area -->
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>
