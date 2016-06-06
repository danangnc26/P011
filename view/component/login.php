<div class="row">
	<div class="col-md-12">
		<h2>Login Form</h2>
		<hr class="cs">
		<form method="post" action="<?php echo app_base.'authenticate' ?>">
			<div class="form-group">
				<div class="input-group">
				  <span class="input-group-addon"><i class="fa fa-user"></i> </span>
				  <input type="text" class="form-control cst" placeholder="Username" name="username" required>
				</div>
			</div>
			<div class="form-group">
				<div class="input-group">
				  <span class="input-group-addon"><i class="fa fa-lock"></i> </span>
				  <input type="password" class="form-control cst" placeholder="Password" name="password" required>
				</div>
			</div>
			<div class="form-group">
				<button class="btn cst1 btn-full" ><i class="fa fa-sign-in"></i> Log In</button>
			</div>
		</form>
	</div>
</div>