<?php

/**
 * The template for displaying all single post
 */

get_header();
?>

<?php echo do_shortcode('[banner_title]'); ?>

<section class="page-wrap">
	<div class="container">
		<div class="row">
			<div class="col-lg-9">
				<?php get_template_part('includes/section', 'blogcontent'); ?>
				<?php wp_link_pages(); ?>
			</div>
			<div class="col-lg-3">
				<?php if (is_active_sidebar('blog-sidebar')) : ?>
					<?php dynamic_sidebar('blog-sidebar'); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();
