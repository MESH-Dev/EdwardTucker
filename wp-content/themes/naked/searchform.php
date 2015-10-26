<form action="<?php home_url() ?>" method="get">
	<label class="for-sr" for="search">Search News</label>
	<input type="search" name="s" id="search" placeholder="Search News..." value="<?php the_search_query(); ?>" />
</form>