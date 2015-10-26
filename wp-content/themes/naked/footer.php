<?php
	/*-----------------------------------------------------------------------------------*/
	/* This template will be called by all other template files to finish 
	/* rendering the page and display the footer area/content
	/*-----------------------------------------------------------------------------------*/
?>

</div><!-- / end page container, begun in the header -->

<footer class="site-footer" role="contentinfo">
	<div class="site-info "> <!--Deleted "container" class here -->
		
		<div class="contact-info">
		<ul>
			<!-- <li><a href="#" target="_blank"><i class="fa fa-fw fa-twitter"></i></a></li> -->
			<li><a href="https://www.facebook.com/EdwardTuckerArchitects" target="_blank"><i class="fa fa-fw fa-facebook-official"></i></a></li>
			<!-- <li><a href="#" target="_blank"><i class="fa fa-fw fa-instagram"></i></a></li> -->
			<li><p>1401 Sixth Avenue, Huntington, West Virginia 25701  <span class="contact-number">(347) - 697 - 4990</span></p>
		</ul>
		</div>

		<div class="copyright">
			<p>Copyright 2015, All Rights Reserved. Site by <a href="http://meshfresh.com" target="_blank">MESH</a>. </p>
		</div>

		<!-- <p>Birthed <a href="http://bckmn.com/naked-wordpress" rel="theme">Naked</a> 
			on <a href="http://wordpress.org" rel="generator">Wordpress</a> 
			by <a href="http://bckmn.com" rel="designer">Joshua Beckman</a>
		</p> -->
		
	</div><!-- .site-info -->
</footer><!-- #colophon .site-footer -->

<?php wp_footer(); ?>

<!-- <div id="sidr">
	<div id="close-icon">
		<i class="fa fa-times"></i>
	</div>
	<nav>
		<?php if(has_nav_menu('main_nav')){
					$defaults = array(
						'theme_location'  => 'main_nav',
						'menu'            => 'main_nav',
						'container'       => false,
						'container_class' => 'mobile-only',
						'container_id'    => '',
						'menu_class'      => 'menu',
						'menu_id'         => '',
						'echo'            => true,
						'fallback_cb'     => 'wp_page_menu',
						'before'          => '',
						'after'           => '',
						'link_before'     => '',
						'link_after'      => '',
						'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						'depth'           => 0,
						'walker'          => ''
					); wp_nav_menu( $defaults );
				}else{
					echo "<p><em>main_nav</em> doesn't exist! Create it and it'll render here.</p>";
				} ?>
	</nav>
</div> -->

<!--<script src="<?php echo get_template_directory_uri('/'); ?>/js/jquery.sidr.min.js"></script>

<sript>
$('#responsive-menu-button').sidr({
		      name: 'sidr-main',
		      source: '#sidr'
    		});
</script>-->

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-561d088479e11b6e" async="async"></script>

</body>
</html>
