<?php	if(have_posts()): while(have_posts()): the_post(); ?>

<p>
<?php echo get_the_date('l jS F, Y'); ?>
</p>

<?php the_content(); ?>

<?php 
	$fname=get_the_author_meta('first_name');
	$lname=get_the_author_meta('last_name');	
?>

<p> Posted By <?php echo"".$fname; ?> <?php echo"".$lname; ?> </p>

<?php 
	$tags = get_the_tags();
	if(is_array($tags) || is_object($tags)){
	foreach($tags as $tag): ?>

	<a href="<?php echo get_the_tags_link($tag-> term_id);?>" >
		<?php echo $tag->name;?>
	</a>
	<?php endforeach; } ?>

<?php 
	$categories = get_the_tags();
	if(is_array($categories) || is_object($categories)){
	foreach($categories as $cat): ?>
	
	<a href="<?php echo get_the_categories_link($cat-> term_id);?>" >
	<?php echo $cat->name;?>
	</a>

	<?php endforeach; } ?>

<?php comments_template(); ?>
	
<?php endwhile; else: endif; ?>