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
				  	<a href="<?php echo app_base.'create_gallery&main=gallery' ?>">
				  		<button class="btn cst1 pull-right" ><i class="fa fa-plus"></i> Add Image</button>
				  	</a>
				  	<h3>Manage Images</h3>
				  </div>
				  <div class="col-md-12">
				  	<table class="dt">
						<thead>
							<tr>
								<th>Image</th>
								<th>Title</th>
								<th>Caption</th>
								<th>Location</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						<?php
						if($data == null){
							echo Lib::tblNotFound(5);
						}else{
						foreach ($data as $key => $value) {
						?>
							<tr>
								<td width="150">
									<img class="img-tbl" src="<?php echo base_url.'public/images/'.$value['image'] ?>">
								</td>
								<td valign="top">
									<?php echo $value['title'] ?>
								</td>
								<td valign="top">
									<?php echo $value['caption'] ?>
								</td>
								<td valign="top">
									<?php echo ucfirst($value['image_location']) ?>
								</td>
								<td valign="top" align="center" width="100">
									<a title="Edit" href="<?php echo app_base.'edit_gallery&main=gallery&id_image='.$value['id_image'] ?>">
										<i style="font-size:1.8em; margin-right:20px;" class="fa fa-edit"></i>
									</a>
									<a title="Delete" onclick="return confirm('Are you sure want to delete this data?')" href="<?php echo app_base.'delete_gallery&main=gallery&id_image='.$value['id_image'] ?>">
										<i style="font-size:1.8em" class="fa fa-trash"></i>
									</a>
								</td>
							</tr>
						<?php
						}}
						?>
						</tbody>
					</table>
				  </div>
				</div>
			</div>
		</div>
	</div>
</div>