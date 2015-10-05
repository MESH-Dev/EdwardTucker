<?php

//enqueue scripts and styles *use production assets. Dev assets are located in assets/css and assets/js
function loadup_scripts() {
	//wp_enqueue_script( 'theme-js', get_template_directory_uri().'/js/mesh.js', array('jquery'), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'loadup_scripts' );

// Add Thumbnail Theme Support
add_theme_support('post-thumbnails');
add_image_size('panel-fullwidth', 1800, 1200, true);

add_image_size('large', 700, '', true); // Large Thumbnail
add_image_size('medium', 250, '', true); // Medium Thumbnail
add_image_size('small', 120, '', true); // Small Thumbnail
add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');
add_image_size('square', 500, 500, true);

//Register WP Menus
register_nav_menus(
    array(
        'main_nav' => 'Header and breadcrumb trail heirarchy',
        'social_nav' => 'Social menu used throughout'
    )
);

// Register Widget Area for the Sidebar
register_sidebar( array(
    'name' => __( 'Primary Widget Area', 'Sidebar' ),
    'id' => 'primary-widget-area',
    'description' => __( 'The primary widget area', 'Sidebar' ),
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
) );

//disable code editors
add_theme_support('html5');
add_theme_support('automatic-feed-links');

//Security and header clean-ups
remove_action( 'wp_head', 'wlwmanifest_link');
remove_action( 'wp_head', 'rsd_link');
remove_action( 'wp_head', 'index_rel_link' ); // index link
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // prev link
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // start link
remove_action( 'wp_head', 'wp_generator'); // remove WP version from header
remove_action( 'wp_head','wp_shortlink_wp_head');

// Register Navigation Menus
function blog_menu() {

  $locations = array(
    'post_sidebar' => __( 'Menu for blog posts', 'text_domain' ),
  );
  register_nav_menus( $locations );

}

// Hook into the 'init' action
add_action( 'init', 'blog_menu' );

/**
 * Add custom taxonomies
 *
 * Additional custom taxonomies can be defined here
 * http://codex.wordpress.org/Function_Reference/register_taxonomy
 */
// function add_custom_taxonomies() {
//   // Add new "Project Type" taxonomy to Posts
//   register_taxonomy('project', 'post', array(
//     // Hierarchical taxonomy (like categories)
//     'hierarchical' => true,
//     // This array of options controls the labels displayed in the WordPress Admin UI
//     'labels' => array(
//       'name' => _x( 'Project Types', 'taxonomy general name' ),
//       'singular_name' => _x( 'Project Type', 'taxonomy singular name' ),
//       'search_items' =>  __( 'Search Project Types' ),
//       'all_items' => __( 'All Project Types' ),
//       'parent_item' => __( 'Parent Location' ),
//       'parent_item_colon' => __( 'Parent Type:' ),
//       'edit_item' => __( 'Edit Project Type' ),
//       'update_item' => __( 'Update Project Type' ),
//       'add_new_item' => __( 'Add New Project Type' ),
//       'new_item_name' => __( 'New Project Type Name' ),
//       'menu_name' => __( 'Projects' ),
//     ),
//     // Control the slugs used for this taxonomy
//     'rewrite' => array(
//       'slug' => 'projects', // This controls the base slug that will display before each term
//       'with_front' => false, // Don't display the category base before "/projects/"
//       'hierarchical' => true // This will allow URL's like "/projects/boston/cambridge/"
//     ),
//   ));
// }
// add_action( 'init', 'add_custom_taxonomies', 0 );

// Register Custom Post Type


// //Add specific CSS class by filter

// function my_class_names( $classes ) {
// 	// add 'class-name' to the $classes array
// 	$classes[] = 'projects';
// 	// return the $classes array
// 	return $classes;
// }

// add_filter( 'body_class', 'my_class_names' );

//Page Slug Body Class
function add_slug_body_class( $classes ) {
global $post;
if ( isset( $post ) ) {
$classes[] = $post->post_type . '-' . $post->post_name;
}
return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );

//Add class of current-page-ancestor to Custom Post Types
function remove_parent($var)
{
if ($var == 'current_page_parent' || $var == 'current-menu-item' || $var == 'current-page-ancestor') { return false; }
return true;
}

function tg_add_class_to_menu($classes){
  // Add custom post type name
  if (is_singular('post') || is_category('')){
    
    $classes = array_filter($classes, "remove_parent");

  // Need to add menu item number
  if (in_array('menu-item-340', $classes)) $classes[] = 'current-page-ancestor';
  }

return $classes;
}

if (!is_admin()) { add_filter('nav_menu_css_class', 'tg_add_class_to_menu'); }




//Add ajax functionality to pages, all not just in admin
add_action('wp_head','pluginname_ajaxurl');
function pluginname_ajaxurl() {
?>
<script type="text/javascript">
var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
</script>
<?php
}

add_action('wp_ajax_get_projects', 'get_projects');  
add_action('wp_ajax_nopriv_get_projects', 'get_projects');  //_nopriv_ allows access for both signed in users, and not

function get_projects(){

  $post_slug = $_POST['projectType'];
  $query = $_POST['query']; //*
  //$query = $_POST('query');
 
 //Make the search exlusive to entries or clicking the filter
 if ($post_slug == '*'): //All posts?
      $args = array(
      'post_type' => 'projects',
      'posts_per_page' => -1
      
      );
 elseif ($post_slug != ''): //Using the filter
      $args = array(
      'post_type' => 'projects',
      'posts_per_page' => -1,
      //'s' => $query, //This is an 'and', so the query is effectively stopping here, if not commented out
      'tax_query' => array(
        array(
          'taxonomy' => 'project_type',
          'field'    => 'slug',
          'terms'    => $post_slug
          
          ),
        ),
      );
else:  //If the search is used
      $args = array(
      'post_type' => 'projects',
      'posts_per_page' => -1,
      's' => $query
      //
          
         // ),
        //),
      );
endif;
        // the query
      
        $the_query = new WP_Query( $args ); 

        $count = $the_query->found_posts;
        $profile_class = 'four-col';
        //echo $count;

        //echo '<h1>' . $count . '</h1>';

        if ($count <= 4):
          $profile_class = 'two-col';

        elseif ($count < 9 && $count > 4):
          $profile_class = 'three-col';

        endif;

       if ( $the_query->have_posts() ) : 
      // Do we have any posts in the databse that match our query?
      // In the case of the home page, this will call for the most recent posts 
      

        //echo '<div class="container '.$profile_class .'" id="project-gallery">';

         while ( $the_query->have_posts() ) : $the_query->the_post(); //We set up $the_query on line 144
        // If we have some posts to show, start a loop that will display each one the same way
        
        

         if (have_rows ('project_gallery')): //Setup the panels between the top/bottom panels

               //Setup variables
               $image = get_field('project_gallery'); //The top level field
               $topImage = $image[0];
               $firstrowimagefield = $topImage['project_images']; //The subrow (project_images)
               $topImageURL = $firstrowimagefield['sizes']['square'];
               $permalink = get_permalink();
               $title = get_the_title();
               $project_subtitle = get_field('project_subtitle');
              
          endif; 

          echo '<a href="' . $permalink . '" title="' . $title .'">
                <article class="post project-tile ' . $profile_class .'">
                <div class="project-tile-overlay over_white">
                  <h1 class="title">
                    
                      ' . $title . '
                    
                  </h1>
                  <h2 class="subtitle">' . $project_subtitle . '</h2>

                </div>
                <div class="project-tile-content">
                  <img src="' .$topImageURL . '" />
                </div>
                </article>
                </a>';

         endwhile; 

       else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) 
        
        echo '<article class="post error">
                <h1 class="404">
                  Nothing has been posted like that yet
                </h1>
              </article>';

       endif; // OK, I think that takes care of both scenarios (having posts or not having any posts) 

       die();//if this isn't included, you will get funky characters at the end of your query results.

}


// function codex_custom_init() {
//     $args = array(
//       'public' => true,
//       'label'  => 'Project'
//     );
//     register_post_type( 'projects', $args );
// }
// add_action( 'init', 'codex_custom_init' );

/*-----------------------------------------------------------------------------------*/
/* Enqueue Styles and Scripts
/*-----------------------------------------------------------------------------------*/

function naked_scripts()  { 

	// get the theme directory style.css and link to it in the header
	//wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css', '10000', 'all' );
	wp_enqueue_style( 'naked-style', get_template_directory_uri() . '/css/main.css', '10000', 'all' );

	wp_enqueue_style( 'sidr-style', get_template_directory_uri() . '/css/jquery.sidr.dark.css', '10000', 'all' );
	
	wp_enqueue_style( 'font-awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css', NAKED_VERSION, true );	
	wp_enqueue_style( 'animate', '//cdnjs.cloudflare.com/ajax/libs/animate.css/3.3.0/animate.min.css', NAKED_VERSION, true );	

  wp_enqueue_style( 'avenir', '//fast.fonts.net/cssapi/8a47c8ec-ad52-403a-b207-fd4a74468402.css'); 

	wp_enqueue_script( 'naked-fitvid', '//ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js', array( 'jquery' ), NAKED_VERSION, true );		
	wp_enqueue_script( 'easing', '//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js', array( 'jquery' ), NAKED_VERSION, true );

  wp_enqueue_script( 'avenir', 'http://fast.fonts.net/jsapi/8a47c8ec-ad52-403a-b207-fd4a74468402.js' );

	wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), NAKED_VERSION, true );

	wp_enqueue_script( 'parallax', get_template_directory_uri() . '/js/jquery.parallax-1.1.3.js', array( 'jquery' ), NAKED_VERSION, true );
	wp_enqueue_script( 'ST', get_template_directory_uri() . '/js/jquery.localscroll-1.2.7-min.js', array( 'jquery' ), NAKED_VERSION, true );
	wp_enqueue_script( 'localS', get_template_directory_uri() . '/js/jquery.scrollTo-1.4.2-min.js', array( 'jquery' ), NAKED_VERSION, true );
	wp_enqueue_script( 'sidr', get_template_directory_uri() . '/js/jquery.sidr.min.js', array( 'jquery' ), NAKED_VERSION, true );


	// add fitvid
	//wp_enqueue_script( 'naked-fitvid', get_template_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ), NAKED_VERSION, true );
	
	// add theme scripts
	//wp_enqueue_script( 'naked', get_template_directory_uri() . '/js/theme.min.js', array(), NAKED_VERSION, true );
  
}
add_action( 'wp_enqueue_scripts', 'naked_scripts' ); // Register this fxn and allow Wordpress to call it automatcally in the header