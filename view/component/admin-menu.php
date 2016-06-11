<?php
	Lib::uCheck();
	if(isset($g['main'])){
		$cl = $g['main'];
	}else{
		$cl = '';
	}
?>
<h3>Menu</h3>
<ul class="nav nav-pills nav-stacked">
	<li role="presentation" <?php echo ($cl == 'home') ? 'class="active"' : '' ?>>
		<a href="<?php echo app_base.'show_welcome&main=home' ?>">
			<i class="fa fa-tachometer"></i> Home
		</a>
	</li>
	<li role="presentation" <?php echo ($cl == 'gallery') ? 'class="active"' : '' ?>>
		<a href="<?php echo app_base.'index_gallery&main=gallery' ?>">
			<i class="fa fa-image"></i> Images
		</a>
	</li>
	<li role="presentation" <?php echo ($cl == 'package') ? 'class="active"' : '' ?>>
		<a href="<?php echo app_base.'index_package&main=package' ?>">
			<i class="fa fa-dollar"></i> Event Type & Package Pricing
		</a>
	</li>
	<li role="presentation" <?php echo ($cl == 'config') ? 'class="active"' : '' ?>>
		<a href="<?php echo app_base.'index_config&main=config' ?>">
			<i class="fa fa-cogs"></i> Page Config
		</a>
	</li>
	<li role="presentation" <?php echo ($cl == 'appointment') ? 'class="active"' : '' ?>>
		<a href="<?php echo app_base.'index_appointment&main=appointment' ?>">
			<i class="fa fa-bookmark"></i> Appointment List
		</a>
	</li>
	<li role="presentation" <?php echo ($cl == 'report') ? 'class="active"' : '' ?>>
		<a href="<?php echo app_base.'index_report&main=report' ?>">
			<i class="fa fa-file-text-o"></i> Event & Meeting Schedule Report
		</a>
	</li>
</ul>