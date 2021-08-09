<?php
/**
 * The template for displaying search results pages
 */

get_header();
?>
<h1> Search Result for '<?php echo get_search_query();?>' </h1>
<section class="page-wrap">
	<div class="container">
		<?php get_template_part('includes/section','searchresults');?>
		
		<?php
			/*adding pagination*/ 
			global $wp_query;
			$big=99999;
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
