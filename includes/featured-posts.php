<?php
$args = [
    'post_type' => 'post',
    'posts_per_page' => 2,
    'category_name' => 'news-and-updates'
];

$query = new WP_Query($args);

if ($query->have_posts()) : ?>
    <div class="container">
        <div class="row">
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <div class="col-sm-12 col-md-6">
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-6">
                                <div class="card-body">
                                    <a href="<?php the_permalink(); ?>">
                                        <h5 class="card-title">
                                            <?php echo get_the_title(); ?>
                                        </h5>
                                    </a>
                                    <p class="card-text"><?php
                                                            $excerpt = get_the_excerpt();
                                                            $excerpt = substr($excerpt, 0, 200);
                                                            $result = substr($excerpt, 0, strrpos($excerpt, ' '));
                                                            echo $result; ?></p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                            <div class="col-6">
                                <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="card-img-top" alt="post thumbnail">
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
<?php endif; ?>