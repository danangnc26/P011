
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
				  	<!-- <a href="<?php echo app_base.'create_gallery&main=gallery' ?>">
				  		<button class="btn cst1 pull-right" ><i class="fa fa-plus"></i> Package Pricing</button>
				  	</a> -->
				  	<h3>Page Config</h3>
				  </div>
				  <div class="col-md-12">
				  	<table class="dt">
						<thead>
							<tr>
								<th>No.</th>
								<th>Page Name</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						<?php
						if($data == null){
							echo Lib::tblNotFound(3);
						}else{
						foreach ($data as $key => $value) {
						?>
							<tr>
								<td width="20"><?php echo $key+1 ?></td>
								<td><?php echo ucfirst($value['type']) ?></td>
								<td width="100">
									<a href="<?php echo app_base.'edit_config&main=config&type='.$value['type'] ?>">
										<button class="btn cst1" ><i class="fa fa-edit"></i> Edit</button>
									</a>
								</td>
							</tr>
						<?php }} ?>
						</tbody>
					</table>
				  </div>
				</div>
			</div>
		</div>
	</div>
</div>
