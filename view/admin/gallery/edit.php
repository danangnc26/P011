<div class="row">
	<div class="col-md-12">
		<?php include "view/component/oth.php" ?>
		<h2>Admin Panel</h2>
		<hr class="cs">
		<div class="row">
			<div class="col-md-3">
				<?php include "view/component/admin-menu.php" ?>
			</div>
			<div class="col-md-9">
				<div class="row">
				  <div class="col-md-12" style="margin-bottom:20px;">
				  	<h3>Edit Image</h3>
				  </div>
				  <div class="col-md-12">
				  	<?php
				  	if($data == null){

				  	}else{
				  	foreach ($data as $key => $value) {
				  	?>
				  	<form method="post" action="<?php echo app_base.'update_gallery' ?>" enctype="multipart/form-data">
				  	<input type="hidden" class="form-control cst" name="id_image" value="<?php echo $value['id_image'] ?>">
					  	<div class="row">
					  		<div class="col-md-2">
					  			<label class="b">Image Title</label>
					  		</div>
					  		<div class="col-md-6">
					  			<div class="form-group">
							  		<input type="text" class="form-control cst" name="title" value="<?php echo $value['title'] ?>">
							  	</div>
					  		</div>
					  	</div>
					  	<div class="row">
					  		<div class="col-md-2">
					  			<label class="b">Image Caption</label>
					  		</div>
					  		<div class="col-md-6">
					  			<div class="form-group">
							  		<textarea class="form-control cst" name="caption" rows="5" style="resize:none"><?php echo Lib::nltxt($value['caption']) ?></textarea>
							  	</div>
					  		</div>
					  	</div>
					  	<div class="row">
					  		<div class="col-md-2">
					  			<label class="b">Image File</label>
					  		</div>
					  		<div class="col-md-6">
					  			<div class="form-group">
							  		<input type="file" class="form-control cst" name="image">
							  	</div>
					  		</div>
					  	</div>
					  	<div class="row">
					  		<div class="col-md-2">
					  			<label class="b">Image Location</label>
					  		</div>
					  		<div class="col-md-6">
					  			<div class="form-group">
							  		<select class="form-control cst" name="image_location" required>
							  			<?php echo Lib::listImageLocation($value['image_location']) ?>
							  		</select>
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
			</div>
		</div>
	</div>
</div>