<?php
	require_once dirname(__FILE__).DIRECTORY_SEPARATOR.'function/route.php';
?>

<!doctype html>
<html lang="en">
<head>
	<title>Freedom Dance Works</title>
	<meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, user-scalable=0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- BOOTSTRAP -->
	<script src="<?php echo base_url ?>assets/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url ?>assets/plugin/slider/responsiveslides.min.js"></script>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="<?php echo base_url ?>assets/css/bootstrap/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="<?php echo base_url ?>assets/css/bootstrap/bootstrap-theme.min.css" >

	<!-- Latest compiled and minified JavaScript -->
	<script src="<?php echo base_url ?>assets/css/bootstrap/bootstrap.min.js"></script>
	<!-- BOOTSTRAP -->

	<!-- STYLES -->
	<link media="all" type="text/css" rel="stylesheet" href="<?php echo base_url ?>assets/css/style.css">
	<link media="all" type="text/css" rel="stylesheet" href="<?php echo base_url ?>assets/plugin/font-awesome/css/font-awesome.min.css">

	<!-- STYLES -->

	<!-- MONTHLY -->
	<link rel="stylesheet" href="<?php echo base_url ?>assets/plugin/monthly/css/monthly.css">
	<script type="text/javascript" src="<?php echo base_url ?>assets/plugin/monthly/js/monthly.js"></script>
	

</head>
<body>
	<header>
		<?php include "view/component/v-menu.php" ?>
	</header>
	<section id="main">
		<div class="content">
			<!-- CONTENT -->
			<?php
				$page = (isset($_GET['page']))? $_GET['page'] : "main";
				route($page);
			?>
			<!-- CONTENT -->
		</div>
	</section>
	<footer>
		Copyright &copy; <?php echo date("Y") ?> - Freedom Dance Works
	</footer>
</body>
</html>