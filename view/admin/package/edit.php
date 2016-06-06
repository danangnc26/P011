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
				  	<h3>Edit Package Pricing</h3>
				  </div>
				  <div class="col-md-12">
				  <?php
				  if($data == null){

				  }else{
				  foreach ($data as $key => $value) {
				  ?>
				  	<form method="post" action="<?php echo app_base.'update_package' ?>" enctype="multipart/form-data">
				  		<input type="hidden" name="id_sub_event_type" value="<?php echo $value['id_sub_event_type'] ?>">
				  		<div class="row">
					  		<div class="col-md-2">
					  			<label class="b">Event Type</label>
					  		</div>
					  		<div class="col-md-6">
					  			<div class="form-group">
							  		<select class="form-control cst" name="id_event_type" required>
										<?php echo Lib::dropdownEventType($value['id_event_type']) ?>
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
							  		<input type="text" class="form-control cst" name="sub_event_type_name" value="<?php echo $value['sub_event_type_name'] ?>">
							  	</div>
					  		</div>
					  	</div>
					  	<div class="row">
					  		<div class="col-md-2">
					  			<label class="b">Price</label>
					  		</div>
					  		<div class="col-md-6">
					  			<div class="form-group">
							  		<input type="text" class="form-control cst" name="price" pattern="[0-9].{1,}" title="Gunakan Format Angka" value="<?php echo $value['price'] ?>">
							  	</div>
					  		</div>
					  	</div>
					  	<div class="row">
					  		<div class="col-md-2">
					  			<label class="b">Specification</label>
					  		</div>
					  		<div class="col-md-6">
					  			<div class="form-group">
					  			<?php
					  			$x = explode('|', $value['specification']);
					  			if(sizeof($x) <= 1){					  				
					  			?>
						  			<input type="text" class="form-control cst" name="specification[]" style="margin-bottom:20px" value="<?php echo $value['specification'] ?>">
								  	<div class="hold-spec"></div>
								  	<a id="add_field" href="#"><i class="fa fa-plus"></i> Add Field</a>
					  			<?php
					  			}else{
					  				foreach ($x as $k => $v) {
					  			?>
					  				<div id="fm_<?php echo '0'.$k ?>">
					  					<div class="input-group" style="padding:0px; margin-bottom:20px;">
					  						<input type="text" class="form-control cst" name="specification[]" value="<?php echo $v ?>">  
					  						<span onclick="$('#fm_<?php echo '0'.$k ?>').remove()" class="input-group-addon" style="cursor:pointer">
					  						<i class="fa fa-close"></i>
					  						</span>
					  					</div>
					  				</div>

					  			<?php
					  				}
					  			?>
					  			<div class="hold-spec"></div>
								 <a id="add_field" href="#"><i class="fa fa-plus"></i> Add Field</a>
					  			<?php
					  			}
					  			?>
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
					<?php }} ?>
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