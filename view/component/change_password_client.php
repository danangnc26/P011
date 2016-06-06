<div class="row">
	<div class="col-md-12">
		<h2>Change Password</h2>
		<hr class="cs">
		<form method="post" action="<?php echo app_base.'update_password' ?>" enctype="multipart/form-data">
					  	<div class="row">
					  		<div class="col-md-2">
					  			<label class="b">New Password</label>
					  		</div>
					  		<div class="col-md-6">
					  			<div class="form-group">
							  		<input type="password" class="form-control cst" id="password1" name="password" >
							  	</div>
					  		</div>
					  	</div>
					  	<div class="row">
					  		<div class="col-md-2">
					  			<label class="b">Confirm New Password</label>
					  		</div>
					  		<div class="col-md-6">
					  			<div class="form-group">
							  		<input type="password" class="form-control cst" id="password2" name="password2" >
							  	</div>
					  		</div>
					  	</div>
					  	<div class="row">
					  		<div class="col-md-2">
					  		</div>
					  		<div class="col-md-6">
					  			<div class="form-group">
							  		<button class="btn cst1" ><i class="fa fa-check"></i> Save</button>
							  		<a href="<?php echo app_base.'index_gallery&main=gallery' ?>">
							  			<button type="button" class="btn cst1" ><i class="fa fa-arrow-left"></i> Back</button>
							  		</a>
							  	</div>
					  		</div>
					  	</div>
					</form>
	</div>
</div>
<script type="text/javascript">
			$('#password2').change(function(){
				validatePassword();
			});
			
			function validatePassword(){
			var pass2=$("#password2").val();
			var pass1=$("#password1").val();
			if(pass1!=pass2){
				// document.getElementById("password2").setCustomValidity("Passwords Don't Match");
				alert('Password do not match, try again.');
			}}
			</script>