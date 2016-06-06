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
				  	<h3>Add Package Pricing</h3>
				  </div>
				  <div class="col-md-12">
				  	<form method="post" action="<?php echo app_base.'save_package' ?>" enctype="multipart/form-data">
				  		<div class="row">
					  		<div class="col-md-2">
					  			<label class="b">Event Type</label>
					  		</div>
					  		<div class="col-md-6">
					  			<div class="form-group">
							  		<select class="form-control cst" name="id_event_type" required>
										<?php echo Lib::dropdownEventType() ?>
									</select>
							  	</div>
					  		</div>
					  	</div>
					  	<div class="row">
					  		<div class="col-md-2">
					  			<label class="b">Package Name</label>
					  		</div>
					  		<div class="col-md-6">
					  			<div class="form-group">
							  		<input type="text" class="form-control cst" name="sub_event_type_name" >
							  	</div>
					  		</div>
					  	</div>
					  	<div class="row">
					  		<div class="col-md-2">
					  			<label class="b">Price</label>
					  		</div>
					  		<div class="col-md-6">
					  			<div class="form-group">
							  		<input type="text" class="form-control cst" name="price" pattern="[0-9].{1,}" title="Gunakan Format Angka">
							  	</div>
					  		</div>
					  	</div>
					  	<div class="row">
					  		<div class="col-md-2">
					  			<label class="b">Specification</label>
					  		</div>
					  		<div class="col-md-6">
					  			<div class="form-group">
					  				<input type="text" class="form-control cst" name="specification[]" style="margin-bottom:20px">
							  		<div class="hold-spec"></div>
							  		<a id="add_field" href="#"><i class="fa fa-plus"></i> Add Field</a>
							  		<!-- <button type="button" class="btn cst1" id="add_field"></button> -->
							  	</div>
					  		</div>
					  	</div>
					  	<div class="row">
					  		<div class="col-md-2">
					  		</div>
					  		<div class="col-md-6">
					  			<div class="form-group">
							  		<button class="btn cst1" ><i class="fa fa-check"></i> Save</button>
							  		<a href="<?php echo app_base.'index_package&main=package' ?>">
							  			<button type="button" class="btn cst1" ><i class="fa fa-arrow-left"></i> Back</button>
							  		</a>
							  	</div>
					  		</div>
					  	</div>
					</form>
				  </div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	var i = 1;
	$('#add_field').click(function(){
		var no = i++;
		var rmv = "'#fm_"+i+"'";
		var f = '<div id="fm_'+i+'"><div class="input-group" style="padding:0px; margin-bottom:20px;"><input type="text" class="form-control cst" name="specification[]" >  <span onclick="$('+rmv+').remove()" class="input-group-addon" style="cursor:pointer"><i class="fa fa-close"></i></span></div></div>';
		$('.hold-spec').append(f);
	});	
</script>