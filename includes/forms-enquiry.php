<div class="">
	<div id="success_message" class="alert alret-success" style="display:none" > </div>
	<div id="error_message" class="alert alret-error" style="display:none" > </div>
	<form id="enquiry">
		<h2> Enquiry Form </h2>
		<input type="hidden" name="reg" value="<?php the_field('reg');?>">
		<div class="form-group row">
			<div class="col-lg-6">
				<input type="text" name="fname" placeholder="First Name" class="form-control" required>
			</div>
			
			<div class="col-lg-6">
				<input type="text" name="lname" placeholder="Last Name" class="form-control" required>
			</div>		
		</div>
		
		<div class="form-group row">
			<div class="col-lg-6">
				<input type="email" name="email" placeholder="Email Address" class="form-control" required>
			</div>
			
			<div class="col-lg-6">
				<input type="tel" name="phone" placeholder="Contact Number" class="form-control" required>
			</div>			
		</div>
		
		<div class="form-group row">
			<div class="col-lg-12">
				<textarea name="enquiry" placeholder="Your Enquiry" class="form-control" required></textarea>
			</div>
		</div>
		
		<div class="form-group row">			
			<div class="col-lg-12">
				<button type="submit" class="btn btn-success btn-block"> Submit </button>
			</div>			
		</div>		
	</form>
</div>

<script>
	(function($){
		$('#enquiry').submit(function(event){
			event.preventDefault();
			var endpoint = '<?php echo admin_url('admin-ajax.php');?>';
			var form= $('#enquiry').serialize();
			var formdata = new FormData;
			formdata.append('action', 'enquiry');
			formdata.append('enquiry', form);
			
			$.ajax(endpoint, {
					type:'POST',
					data:formdata,
					processData:false,
					contentType: false,
					
					success: function(res){
						$('#enquiry').fadeOut(200);
						$('success_message').text('Thanks for your enquiry').show();
						$('$enquiry').trigger('reset');
						$('#enquiry').fadeIn(500);
					},
					
					error: function(err){
						$('#enquiry').fadeOut(200);
						$('error_message').text('Message sending faild').show();
						$('$enquiry').trigger('reset');
						$('#enquiry').fadeIn(500);
					},
			})

		})
	
	})(jQuery)

</script>	