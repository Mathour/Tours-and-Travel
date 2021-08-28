<?php
$parent_categories = get_terms(array(
	'taxonomy' => 'tour-categories',
	'hide_empty' => true,
	'parent' => 0
));
?>

<?php
if (!empty($parent_categories)) :
	foreach ($parent_categories as $parent_category) {
		$child_categories = get_terms(array(
			'taxonomy' => 'tour-categories',
			'hide_empty' => true,
			'child_of' => $parent_category->term_id
		));
		if (!empty($child_categories)) {
			foreach ($child_categories as $child_category) {
				$query = tour_category_query($child_category->slug); ?>
				<div class="row">
					<div class="col">
						<div class="category-title">
							<h2 class="category-name"> <?php echo $parent_category->name . ">" . $child_category->name; ?> </h2>
						</div>
						<hr>
					</div>
				</div>
				<div class="row mb-3 p-2">
					<?php if ($query->have_posts()) :
						$post_count = 0;
						while ($query->have_posts() && $post_count < 3) : $query->the_post(); ?>
							<div class="col-md-4 col-sm-12">
								<div class="card">
									<img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="card-img-top">
									<div class="card-body">
										<a href="<?php the_permalink(); ?>">
											<h5 class=" card-title"><?php the_title(); ?></h5>
										</a>
										<div class="card-text">
											<p><?php
												$ov = get_field('overview');
												if (strlen($ov) > 150) {
													$short_desc = substr($ov, 0, 149);
													echo $short_desc . "...";
												} else {
													echo $ov;
												} ?>
											</p>
										</div>
										<hr>
										<div class="d-flex bd-highlight">
											<?php $itinaryCount = get_itinary_count("itinerary"); ?>
											<div class="me-auto p-2 bd-highlight">
												<img class="card-icon" src="<?php echo site_url("/wp-content/themes/Hunza Discovery/images/icons/24-hours.svg", 'http'); ?>">
												<!-- <i class="bi bi-calendar3-range"></i> -->
												<?php echo $itinaryCount;
												if ($itinaryCount > 1) : ?>
													Days
												<?php else : ?>
													Day
												<?php endif; ?>
											</div>
											<div class="p-2 bd-highlight">
												<img class="card-icon" src="<?php echo site_url("/wp-content/themes/Hunza Discovery/images/icons/boat.svg", 'http'); ?>">
											</div>
											<div class="p-2 bd-highlight">
												<img class="card-icon" src="<?php echo site_url("/wp-content/themes/Hunza Discovery/images/icons/camping.svg", 'http'); ?>">
											</div>
											<div class="p-2 bd-highlight">
												<img class="card-icon" src="<?php echo site_url("/wp-content/themes/Hunza Discovery/images/icons/hiking.svg", 'http'); ?>">
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php $post_count++;
						endwhile; ?>
						<?php if (($query->post_count) > 3) : ?>
							<div class="d-grid gap-2 mt-3">
								<a class="btn btn-primary btn-sm" href="<?php echo get_home_url(null, "/tour-categories/" . $child_category->slug); ?>" role="button"> Load More.. </a>
							</div>
						<?php endif; ?>
					<?php
					endif; ?>
				</div>
	<?php
			}
		}
	} ?>
<?php endif; ?>