<?php

/**
 * Template Name: Tour Archive
 * The template for displaying archive tours
 */

get_header();
?>

<div class="banner">
	<div class="banner-img">
		<img src="<?php echo site_url("/wp-content/themes/Hunza Discovery/images/our tours.jpg", 'http'); ?>" alt="featured">
		<div class="page-title">
			<h1> Our Tours </h1>
		</div>
	</div>
</div>

<?php echo do_shortcode('[tour_search]') ?>

<section class="page-wrap">
	<div class="container">
		<?php get_template_part('includes/section', 'archivetours'); ?>
		<?php /*adding pagination*/
		global $wp_query;
		$big = 99999;
		//adding pagination
		echo paginate_links(array(
			'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
			'formate' => '?paged=%#%',
			'current' => '', max(1, get_query_var('paged')),
			'total' => $wp_query->max_num_pages
		));
		?>
		<?php wp_link_pages(); ?>
	</div>
</section>
<?php
get_footer(); ?>