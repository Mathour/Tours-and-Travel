<form id="inquiry">
    <div class="form-group row">
        <input type="hidden" name="title" value="<?php echo the_title(); ?>">
        <div class="col-lg-6">
            <label for="fname"> First Name </label>
            <input type="text" name="fname" placeholder="First Name" class="form-control" required>
        </div>
        <div class="col-lg-6">
            <label for="lname"> Last Name </label>
            <input type="text" name="lname" placeholder="Last Name" class="form-control" required>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-6">
            <label for="email"> Email </label>
            <input type="email" name="email" placeholder="Email Address" class="form-control" required>
        </div>
        <div class="col-lg-6">
            <label for="phone"> Phone </label>
            <input type="tel" name="phone" placeholder="Phone No" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-12">
            <label for="fname"> Message </label>
            <textarea name="message" placeholder="Your Message" class="form-control" required> </textarea>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-12">
            <button type="submit" class="btn btn-primary mt-2 float-end">Submit</button>
        </div>
    </div>
</form>

<script>
    (function($) {
        $('#inquiry').submit(function(event) {
            event.preventDefault();
            var endpoint = '<?php echo admin_url('admin-ajax.php'); ?>';
            var form = $('#inquiry').serialize();
            var formdata = new FormData;
            formdata.append('action', 'inquiry');
            formdata.append('nonce', '<?php echo wp_create_nonce('ajax-nonce'); ?>');
            formdata.append('inquiry', form);

            $.ajax(endpoint, {
                type: 'POST',
                data: formdata,
                processData: false,
                contentType: false,
                success: function(result) {
                    alert(result.data);
                },
                error: function(error) {
                    alert(result.error);
                }
            })
        })
    })(jQuery);
</script>