<nav class="navbar navbar-default">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo app_base.'home' ?>">Freedom Dance Works</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
			<li><a href="<?php echo app_base.'home' ?>">Home</a></li>
			<li><a href="<?php echo app_base.'gallery' ?>">Gallery</a></li>
			<li><a href="<?php echo app_base.'package' ?>">Package</a></li>
			<li><a href="<?php echo app_base.'about' ?>">About Us</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="<?php echo app_base.'check_schedule' ?>">Check Our Schedule</a></li>
				<?php
				if(empty($_SESSION)){
				?>
				<li><a href="<?php echo app_base.'register' ?>">Register</a></li>
				<li><a href="<?php echo app_base.'login' ?>">Log In</a></li>
				<?php
				}else{
				?>
				<?php 
				if($_SESSION['level_user'] == 'admin')
				{
				?>
				<li><a href="<?php echo app_base.'show_welcome' ?>">Admin Panel</a></li>
				<?php
				}else{
				?>
				<li><a href="<?php echo app_base.'my_appointment' ?>">My Appointment</a></li>
				<?php
				}
				?>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['name'] ?> <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo ($_SESSION['level_user'] == 'client') ? app_base.'change_password_client' : app_base.'change_password' ?>">Change Password</a></li>
						<?php echo ($_SESSION['level_user'] == 'client') ? '<li><a href="'.app_base.'edit_profile'.'">Change Profile</a></li>' : '' ?>
						<li role="separator" class="divider"></li>
						<li><a href="<?php echo app_base.'logout' ?>">Log Out</a></li>
					</ul>
				</li>
				<?php
				}
				?>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>