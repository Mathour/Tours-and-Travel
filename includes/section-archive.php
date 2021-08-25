<div class="row mt-3">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div id="blog-card" class="card p-3">
				<div id="blog-card-border" class="row g-0">
					<div class="col-xm-12 col-sm-4">
						<?php if (has_post_thumbnail()) : ?>
							<img class="card-img-top blog-arcive-img" src="<?php the_post_thumbnail_url('blog-small'); ?>" alt="featured">
						<?php endif; ?>
					</div>
					<div id="blog-card-body" class="col-xm-12 col-sm-8">
						<div class="card-body">
							<a href="<?php the_permalink(); ?>" class="btn btn-success title-link">
								<h5 class="card-title"> <?php the_title(); ?> </h5>
							</a>
							<p class="card-text">
								<?php echo substr(get_the_excerpt(), 0, 250) . "..."; ?>
							</p>
							<a href="<?php the_permalink(); ?>" class="btn btn-primary" role="button">Read more.. </a>
						</div>
					</div>
				</div>
			</div>
	<?php endwhile;
	endif; ?>
</div>