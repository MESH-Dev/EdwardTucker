<?php
	/*-----------------------------------------------------------------------------------*/
	/* This template will be called by all other template files to finish 
	/* rendering the page and display the footer area/content
	/*-----------------------------------------------------------------------------------*/
?>

</div><!-- / end page container, begun in the header -->

<footer class="site-footer" role="contentinfo">
	<div class="site-info "> <!--Deleted "container" class here -->
		<ul>
			<li><img src="<?php echo get_template_directory_uri("/"); ?>/img/social_mockup.png"></li>
			<li><p>222 Street Name. Huntington, West Virginia 22222  (347) - 446 - 8254</p>
		</ul>
		<div class="copyright">
			<p>Copyright 2015, All Rights Reserved. Site by MESH. </p>
		</div>


		<!-- <p>Birthed <a href="http://bckmn.com/naked-wordpress" rel="theme">Naked</a> 
			on <a href="http://wordpress.org" rel="generator">Wordpress</a> 
			by <a href="http://bckmn.com" rel="designer">Joshua Beckman</a>
		</p> -->
		
	</div><!-- .site-info -->
</footer><!-- #colophon .site-footer -->

<?php wp_footer(); 
// This fxn allows plugins to insert themselves/scripts/css/files (right here) into the footer of your website. 
// Removing this fxn call will disable all kinds of plugins. 
// Move it if you like, but keep it around.
?>

</body>
</html>
