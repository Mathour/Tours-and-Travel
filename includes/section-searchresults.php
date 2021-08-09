<?php	if(have_posts()): while(have_posts()): the_post(); ?>

<div class="card mb-3">
	<div class="card-body d-flex">
	
	<?php if(has_post_thumbnail()):?>
			<img src="<?php the_post_thumbnail_url('blog-small');?>" alt="featured" class="img-fluid mr-3 img-tumbnail">
	<?php endif; ?>
	
	<div class="blog-content">
	<h3> <?php the_title(); ?> </h3>
	<?php the_excerpt(); ?>
	<a href="<?php the_permalink(); ?>" class="btn btn-success">Read more.. </a>
	</div>
	
	</div>
</div>

<?php endwhile; else: ?>

	No results were found for <b>'<?php echo get_search_query();?>'</b>
	
<?php endif; ?>