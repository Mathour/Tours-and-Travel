<div class="blog-categories">
	<?php
	$categories = get_the_tags();
	if (is_array($categories) || is_object($categories)) {
		foreach ($categories as $cat) : ?>
			<a href="<?php echo get_the_categories_link($cat->term_id); ?>">
				<?php echo $cat->name; ?>
			</a>
	<?php endforeach;
	} ?>
</div>
<div class="comments">
	<?php comments_template(); ?>
</div>
<div class="blog-tags">
	<?php
	$tags = get_the_tags();
	if (is_array($tags) || is_object($tags)) {
		foreach ($tags as $tag) : ?>
			<a href="<?php echo get_the_tags_link($tag->term_id); ?>">
				<?php echo $tag->name; ?>
			</a>
	<?php endforeach;
	} ?>
</div>