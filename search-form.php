<?php
/**
 * The template for displaying search form on a pages
 */
?>

<form action="/" method="get">
	<label for="search"> Search </label> 
	<input type="text" name="s" id="search" value="<?php the_search_query()?>" required> 
	<button type="submit"> Search </button>

</form>