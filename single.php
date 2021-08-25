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
			<?php if (is_active_sidebar('blog-sidebar')) { ?>
				<div class="col-md-9 col-sm-8 col-xm-12">
					<div class="ps-4">
						<?php get_template_part('includes/section', 'blogcontent'); ?>
						<?php wp_link_pages(); ?>
					</div>
				</div>
				<div class="col-md-3 col-sm-4 col-xm-12">
					<div class="blog-side-bar">
						<?php dynamic_sidebar('blog-sidebar'); ?>
					</div>
				</div>
			<?php } else { ?>
				<div class="col-12">
					<?php get_template_part('includes/section', 'blogcontent'); ?>
					<?php wp_link_pages(); ?>
				</div>
			<?php } ?>
		</div>
	</div>
</section>

<?php
get_footer();
?>