<?php
/* Tour Search Form*/
$categories = get_terms(array(
    'taxonomy' => 'tour-categories',
    'hide_empty' => false,
));
$destinations = get_terms(array(
    'taxonomy' => 'destinations',
    'hide_empty' => false,
));
?>

<form action="<?php echo get_home_url() . '/tour-search'; ?>">
    <div class="tour-search-bar">
        <div class="container">
            <div class="row">
                <div class="col-xm-12 col-sm-6 col-md-4">
                    <label class="form-label" for="keyword">By Title</label>
                    <input type="text" name="keyword" class="form-control" placeholder="Type in a keyword" value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : ''; ?>">
                </div>
                <div class="col-xm-12 col-sm-6 col-md-3">
                    <label class="form-label" for="category">By Category</label>
                    <select class="form-select" name="category" id="">
                        <option value="">Select Category</option>
                        <?php foreach ($categories as $category) : ?>
                            <option <?php if (isset($_GET['category']) && ($_GET['category'] == $category->slug)) : ?> selected <?php endif; ?> value="<?php echo $category->slug; ?>"><?php echo $category->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-xm-12 col-sm-6 col-md-3">
                    <label class="form-label" for="destination">By Destination</label>
                    <select class="form-select" name="destination" id="">
                        <option value="">Select Destination</option>
                        <?php foreach ($destinations as $destination) : ?>
                            <option <?php
                                    if (isset($_GET['destination']) && ($_GET['destination'] == $destination->slug)) : ?> selected <?php endif; ?> value="<?php echo $destination->slug; ?>"><?php echo $destination->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-xm-12 col-sm-6 col-md-2 align-self-end">
                    <div class="d-grid gap-2">
                        <button id="search-button" class="btn btn-primary" type="submit">Search</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>