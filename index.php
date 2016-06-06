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
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="<?php echo base_url ?>assets/css/bootstrap/bootstrap.min.css">

	<!-- Optional theme -->

	<!-- Latest compiled and minified JavaScript -->
	<script src="<?php echo base_url ?>assets/css/bootstrap/bootstrap.min.js"></script>
	<!-- BOOTSTRAP -->

	<!-- SUMMERNOTE -->
	<link rel="stylesheet" href="<?php echo base_url ?>assets/plugin/summernote-master/dist/summernote.css">
	<script type="text/javascript" src="<?php echo base_url ?>assets/plugin/summernote-master/dist/summernote.js"></script>

	<script type="text/javascript" src="<?php echo base_url ?>assets/plugin/slider/responsiveslides.min.js"></script>

	<!-- STYLES -->
	<link media="all" type="text/css" rel="stylesheet" href="<?php echo base_url ?>assets/css/style.css">
	<link media="all" type="text/css" rel="stylesheet" href="<?php echo base_url ?>assets/plugin/font-awesome/css/font-awesome.min.css">

	<!-- STYLES -->

	<!-- MONTHLY -->
	<link rel="stylesheet" href="<?php echo base_url ?>assets/plugin/monthly/css/monthly.css">
	<script type="text/javascript" src="<?php echo base_url ?>assets/plugin/monthly/js/monthly.js"></script>
	
	<link media="all" type="text/css" rel="stylesheet" href="<?php echo base_url ?>assets/plugin/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">
	<script src="<?php echo base_url ?>assets/plugin/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>

	<link media="all" type="text/css" rel="stylesheet" href="<?php echo base_url ?>assets/plugin/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
	<script src="<?php echo base_url ?>assets/plugin/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>

	<link rel="stylesheet" href="<?php echo base_url ?>assets/plugin/pricing/style.css">
</head>
<body>
	<header>
		<?php include "view/component/v-menu.php" ?>
	</header>
	<section id="main">
		<?php
		if(isset($_GET['page'])){
			if($_GET['page'] == 'login' || $_GET['page'] == 'register'){
				$c = 'login';	
			}else{
				$c = 'general';
			}
		}else{
			$c = 'general';
		}
		?>
		<div class="content <?php echo $c ?>">
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
	<script type="text/javascript">
	function hari() {
	    var d = new Date();
	    var weekday = new Array(7);
	    weekday[0] = "Sunday";
	    weekday[1] = "Monday";
	    weekday[2] = "Tuesday";
	    weekday[3] = "Wednesday";
	    weekday[4] = "Thursday";
	    weekday[5] = "Friday";
	    weekday[6] = "Saturday";

	    var n = weekday[d.getDay()];
	    document.getElementById("demo").innerHTML = n;
	}
	</script>
</body>
</html>