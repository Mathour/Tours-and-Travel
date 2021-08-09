<div class="row mt-3">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="card mb-3">
				<div class="row g-0">
					<div class="col-md-4">
						<?php if (has_post_thumbnail()) : ?>
							<img class="card-img-top blog-arcive-img" src="<?php the_post_thumbnail_url('blog-small'); ?>" alt="featured">
						<?php endif; ?>
					</div>
					<div class="col-md-8">
						<div class="card-body">
							<h5 class="card-title"> <?php the_title(); ?> </h5>
							<p class="card-text">
								<?php the_excerpt(); ?>
							</p>
							<a href="<?php the_permalink(); ?>" class="btn btn-success">Read more.. </a>
						</div>
					</div>
				</div>
			</div>
	<?php endwhile;
	endif; ?>
</div>