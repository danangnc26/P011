
<div class="row">
	<div class="col-md-6">
		<!-- <img src="<?php echo base_url.'assets/img/fdw.jpg' ?>" width="100%" style="margin-bottom:20px;"> -->
		<ul class="rslides" style="margin-bottom:20px;">
		  <li><img src="<?php echo base_url.'assets/img/fdw.jpg' ?>" alt=""></li>
		  <li><img src="<?php echo base_url.'assets/img/fdww.jpg' ?>" alt=""></li>
		  <li><img src="<?php echo base_url.'assets/img/15.jpg' ?>" alt=""></li>
		</ul>
	</div>
	<div class="col-md-6">
		<h3 style="font-family:Oleo Script; font-size:2.7em">Freedom Dance Works</h3>
		<hr class="cs">
		<p style="text-align:justify; font-size:1.3em">
			Dance by Freedom Works is a Dance Company specialist devoted to the art of dance. 
			It covers Modern dance, Hip hop dance, Contemporary dance, Traditional dance, 
			Wedding dance and Dance schooling. 
		</p>
		<p style="text-align:justify; font-size:1.3em">
		We are aimed at professional dancers and dance lovers. 
			We will make your Special Events, Company Gathering, 
			Birthday Party or even your own Wedding more special.
		</p>
		<?php 
		$current_dayname = date("l"); // return sunday monday tuesday etc.
             
		$date = date("Y-m-d",strtotime('monday this week')).'to'.date("Y-m-d",strtotime("$current_dayname this week"));
		echo $date;
		 ?>
	</div>
</div>
<script>
  // $(function() {
  //   $(".rslides").responsiveSlides();
  // });
  $(".rslides").responsiveSlides({
  auto: true,             // Boolean: Animate automatically, true or false
  speed: 500,            // Integer: Speed of the transition, in milliseconds
  timeout: 4000,          // Integer: Time between slide transitions, in milliseconds
  pager: false,           // Boolean: Show pager, true or false
  nav: false,             // Boolean: Show navigation, true or false
  random: false,          // Boolean: Randomize the order of the slides, true or false
  pause: false,           // Boolean: Pause on hover, true or false
  pauseControls: true,    // Boolean: Pause when hovering controls, true or false
  prevText: "Previous",   // String: Text for the "previous" button
  nextText: "Next",       // String: Text for the "next" button
  maxwidth: "",           // Integer: Max-width of the slideshow, in pixels
  navContainer: "",       // Selector: Where controls should be appended to, default is after the 'ul'
  manualControls: "",     // Selector: Declare custom pager navigation
  namespace: "rslides",   // String: Change the default namespace used
  before: function(){},   // Function: Before callback
  after: function(){}     // Function: After callback
});
</script>