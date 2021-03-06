<?php
	/*-----------------------------------------------------------------------------------*/
	/* This template will be called by all other template files to begin 
	/* rendering the page and display the header/nav
	/*-----------------------------------------------------------------------------------*/
?>
<!DOCTYPE html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>
	<?php bloginfo('name'); // show the blog name, from settings ?> | 
	<?php is_front_page() ? bloginfo('description') : wp_title(''); // if we're on the home page, show the description, from the site's settings - otherwise, show the title of the post or page ?>
</title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link type="text/css" rel="stylesheet" href="http://fast.fonts.net/cssapi/8a47c8ec-ad52-403a-b207-fd4a74468402.css"/>
<?php // We are loading our theme directory style.css by queuing scripts in our functions.php file, 
	// so if you want to load other stylesheets,
	// I would load them with an @import call in your style.css
?>

<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); 
// This fxn allows plugins, and Wordpress itself, to insert themselves/scripts/css/files
// (right here) into the head of your website. 
// Removing this fxn call will disable all kinds of plugins and Wordpress default insertions. 
// Move it if you like, but I would keep it around.
?>

</head>

<body 
	<?php body_class(); 
	// This will display a class specific to whatever is being loaded by Wordpress
	// i.e. on a home page, it will return [class="home"]
	// on a single post, it will return [class="single postid-{ID}"]
	// and the list goes on. Look it up if you want more.
	?>
>

<header id="masthead" class="site-header" role="banner">
	<div class=" center">
	
		<!-- <nav role="navigation" class="site-navigation main-navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); // Display the user-defined menu in Appearance > Menus ?>
		</nav> --><!-- .site-navigation .main-navigation -->
	</div>
	<div class="center">

		<!-- <div id="brand">
			<h1 class="site-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); // Link to the home page ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); // Title it with the blog name ?>" rel="home"><?php bloginfo( 'name' ); // Display the blog name ?></a>
			</h1>
			<h4 class="site-description">
				<?php bloginfo( 'description' ); // Display the blog description, found in General Settings ?>
			</h4>
		</div> --><!-- /brand -->
		
		<div class="clear"></div>
	</div><!--/container -->
		<nav class="global-nav fixed">
			<div class="center">
				
				<ul>
					<li class="logo">
						<a href="<?php echo site_url(); ?>">
						<div class="logo-container" style="background-image:url('<?php echo get_template_directory_uri("/"); ?>/img/et_logo.png')">
						<!-- <img src="<?php echo get_template_directory_uri("/"); ?>/img/et_logo.png" /> -->
						</div>
						</a>
					</li>
					<li class="nav-list">	
						<div class="mobile-only sidr-close"><i class="fa fa-fw fa-close"></i></div>
						<?php

								$defaults = array(
									'theme_location'  => '',
									'menu'            => '',
									'container'       => 'div',
									'container_class' => '',
									'container_id'    => '',
									'menu_class'      => 'menu',
									'menu_id'         => 'desktop-only',
									'echo'            => true,
									'fallback_cb'     => 'wp_page_menu',
									'before'          => '',
									'after'           => '',
									'link_before'     => '',
									'link_after'      => '',
									'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
									'depth'           => 0,
									'walker'          => ''
								);

								wp_nav_menu( $defaults );

						?>
					</li>
				</ul>
				<div class="mobile-nav-trigger mobile-only">
				<a href="#sidr-main" id="responsive-menu-button" class="fa fa-fw fa-bars fa-2x"></a>
				</div>
			</div>
			</nav>
</header><!-- #masthead .site-header -->

<div class="main-fluid"><!-- start the page containter -->