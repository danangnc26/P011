
<div class="row">
	<div class="col-md-6">
		<!-- <img src="<?php echo base_url.'assets/img/fdw.jpg' ?>" width="100%" style="margin-bottom:20px;"> -->
		<ul class="rslides" style="margin-bottom:20px;">
		<?php
		if(Lib::getImages('slider') == null){

		}else{
		foreach (Lib::getImages('slider') as $key => $value) {
		?>
		  <li><img src="<?php echo base_url.'public/images/'.$value['image'] ?>" alt=""></li>
		<?php
		}}
		?>
		</ul>
	</div>
	<div class="col-md-6">
		<h3 style="font-family:Oleo Script; font-size:2.7em">Freedom Dance Works</h3>
		<hr class="cs">
		<?php 
		if(Lib::page('home') == null){

		}else{
			echo htmlspecialchars_decode(Lib::page('home')[0]['text']);
		}
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