<?php

/**
 * The template for displaying archive posts
 */

get_header();
?>
<section class="page-wrap">
	<div class="container">
		<?php get_template_part('includes/section','archive');?>
		<?php /*adding pagination*/ ?>
		<?php
			global $wp_query;
			$big=99999;
			//adding pagination
			echo paginate_links(array(
			'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
			'formate' => '?paged=%#%',
			'current' =>'',max(1, get_query_var('paged')),
			'total' => $wp_query->max_num_pages
			));
		?>
		
		<?php wp_link_pages(); ?>
	</div>
</section>	

<?php
get_footer();
?>