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
				  		<button class="btn cst1 pull-right" onclick="NeweventType()"><i class="fa fa-plus"></i> Add New Event Type</button>
				  	<h3>Event Type & Package Pricing</h3>
				  </div>
				  <div class="col-md-12">
				  	<table class="dt">
						<thead>
							<tr>
								<th>Event Type</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						<?php 
						if($data1 == null){
							echo Lib::tblNotFound(2);
						}else{
						foreach($data1 as $value1){
						?>
							<tr>
								<td><?php echo $value1['event_type_name'] ?></td>
								<td width="100" align="center">
									<a title="Edit" href="#" onclick="EditeventType(<?php echo $value1['id_event_type'] ?>, '<?php echo $value1['event_type_name'] ?>')">
										<i style="font-size:1.8em; margin-right:20px;" class="fa fa-edit"></i>
									</a>
									<a title="Delete" onclick="return confirm('Are you sure want to delete this data?')" href="<?php echo app_base.'delete_event_type&main=package&id_event_type='.$value1['id_event_type'] ?>">
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
				<div class="row" style="margin-top:30px;">
				  <div class="col-md-12" style="margin-bottom:20px;">
					  	<!-- Split button -->
						<!-- <div class="btn-group pull-right">
						  <button type="button" class="btn cst1">Action</button>
						  <button type="button" class="btn cst1 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						    <span class="caret"></span>
						    <span class="sr-only">Toggle Dropdown</span>
						  </button>
						  <ul class="dropdown-menu">
						    <li><a href="#">Action</a></li>
						    <li><a href="#">Another action</a></li>
						    <li><a href="#">Something else here</a></li>
						    <li role="separator" class="divider"></li>
						    <li><a href="#">Separated link</a></li>
						  </ul>
						</div> -->
						<a href="<?php echo app_base.'create_package&main=package' ?>">
							<button class="btn cst1 pull-right" style="margin-right:10px;"><i class="fa fa-plus"></i> Add Package Pricing</button>
						</a>
				  </div>
				  <div class="col-md-12">
				  	<table class="dt">
						<thead>
							<tr>
								<th>Event Type</th>
								<th>Package</th>
								<th>Price</th>
								<th>Specification</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						<?php 
						if($data2 == null){
							echo Lib::tblNotFound(5);
						}else{
						foreach($data2 as $key2 => $value2){
						?>
							<tr>
								<td><?php echo Lib::EventName($value2['id_event_type']) ?></td>
								<td>
									<?php echo $value2['sub_event_type_name'] ?>
								</td>
								<td>
									<?php echo Lib::ind($value2['price']) ?>
								</td>
								<td>
									<?php
						  			$x = explode('|', $value2['specification']);
						  			if(sizeof($x) <= 1){					  				
						  			?>
							  			<?php echo $value2['specification'] ?>
						  			<?php
						  			}else{
						  				foreach ($x as $k => $v) {
						  			?>
						  				<li><?php echo $v ?></li>
						  			<?php
						  				}
						  			}
						  			?>
								</td>
								<td align="center" width="100">
									<a title="Edit" href="<?php echo app_base.'edit_package&main=package&id_package='.$value2['id_sub_event_type'] ?>">
										<i style="font-size:1.8em; margin-right:20px;" class="fa fa-edit"></i>
									</a>
									<a title="Delete" onclick="return confirm('Are you sure want to delete this data?')" href="<?php echo app_base.'delete_package&main=package&id_package='.$value2['id_sub_event_type'] ?>">
										<i style="font-size:1.8em" class="fa fa-trash"></i>
									</a>
								</td>
							</tr>
						<?php  }} ?>
						</tbody>
					</table>
				  </div>
				</div>
			</div>
		</div>
	</div>
</div>
<form id="form" method="post" action="<?php echo app_base.'save_event_type' ?>">
    <input type="hidden" name="event_type_name" id="eventtype" />
</form>
<form id="form-update" method="post" action="<?php echo app_base.'update_event_type' ?>">
	<input type="hidden" name="update_id_event_type" id="upd-id" />
    <input type="hidden" name="update_event_type_name" id="upd-name" />
</form>
<script type="text/javascript">
	function NeweventType(){
	    var event = prompt("New event type name : ");
	    if(event != null){
	    	document.getElementById("eventtype").value = event;
	    	document.getElementById("form").submit();
	    }
	}
	function EditeventType(id, name){
	    var event = prompt("New event type name : ", name);
	    if(event != null){
	    	document.getElementById("upd-id").value = id;
	    	document.getElementById("upd-name").value = event;
	    	document.getElementById("form-update").submit();
	    }
	}
</script>