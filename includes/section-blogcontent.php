<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="d-flex">
			<div class="p-2 bd-highlight"><?php echo get_the_date('l jS F, Y'); ?></div>
			<div class="ms-auto p-2 bd-highlight">
				<?php $fname = get_the_author_meta('first_name'); ?>
				<p> Posted By <?php echo "" . $fname; ?>
			</div>
		</div>
		<div class="blog-content">
			<?php the_content(); ?>
		</div>
<?php endwhile;
endif; ?>