<div class="row">
	<div class="col-md-12">
		<h2>Change Password</h2>
		<hr class="cs">
		<?php
		if($data == null){

		}else{
		foreach ($data as $key => $value) {
		?>
		<form method="post" action="<?php echo app_base.'update_profile' ?>" enctype="multipart/form-data">
					  	<div class="row">
					  		<div class="col-md-2">
					  			<label class="b">Name</label>
					  		</div>
					  		<div class="col-md-6">
					  			<div class="form-group">
							  		<input type="text" class="form-control cst" placeholder="Name" name="name" value="<?php echo $value['name'] ?>" required>
							  	</div>
					  		</div>
					  	</div>
					  	<div class="row">
					  		<div class="col-md-2">
					  			<label class="b">Phone Number</label>
					  		</div>
					  		<div class="col-md-6">
					  			<div class="form-group">
							  		<input type="text" class="form-control cst" placeholder="Phone Number" name="phone" required pattern="[0-9].{1,}" title="Gunakan Format Angka" value="<?php echo $value['phone'] ?>">
							  	</div>
					  		</div>
					  	</div>
					  	<div class="row">
					  		<div class="col-md-2">
					  			<label class="b">Email</label>
					  		</div>
					  		<div class="col-md-6">
					  			<div class="form-group">
							  		<input type="email" class="form-control cst" placeholder="Email" name="email" required value="<?php echo $value['email'] ?>">
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
					<?php }} ?>
	</div>
</div>
