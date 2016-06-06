<div class="row">
	<div class="col-md-12">
		<h2>Register Form</h2>
		<hr class="cs">
		<form method="post" action="<?php echo app_base.'save_register' ?>">
		<div class="form-group">
			<div class="input-group">
			  <span class="input-group-addon"><i class="fa fa-user"></i> </span>
			  <input type="text" class="form-control cst" placeholder="Username" name="username" required>
			</div>
		</div>
		<div class="form-group">
			<div class="input-group">
			  <span class="input-group-addon"><i class="fa fa-lock"></i> </span>
			  <input type="password" id="password1" class="form-control cst" placeholder="Password" name="password" required>
			</div>
		</div>
		<div class="form-group">
			<div class="input-group">
			  <span class="input-group-addon"><i class="fa fa-lock"></i> </span>
			  <input type="password" id="password2" class="form-control cst" placeholder="Confirm Password" name="password2" required>
			</div>
		</div>
		<hr>
		<div class="form-group">
			<div class="input-group">
			  <span class="input-group-addon"><i class="fa fa-user"></i> </span>
			  <input type="text" class="form-control cst" placeholder="Name" name="name" required>
			</div>
		</div>
		<div class="form-group">
			<div class="input-group">
			  <span class="input-group-addon"><i class="fa fa-phone"></i> </span>
			  <input type="text" class="form-control cst" placeholder="Phone Number" name="phone" required pattern="[0-9].{1,}" title="Gunakan Format Angka">
			</div>
		</div>
		<div class="form-group">
			<div class="input-group">
			  <span class="input-group-addon"><i class="fa fa-envelope"></i> </span>
			  <input type="email" class="form-control cst" placeholder="Email" name="email" required>
			</div>
		</div>
		<div class="form-group">
			<button class="btn cst1 btn-full" ><i class="fa fa-send"></i> Register</button>
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