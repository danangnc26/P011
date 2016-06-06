<div class="row">
	<div class="col-md-12">
		<h2>About Freedom Dance Works</h2>
		<hr class="cs">
		<?php 
		if(Lib::page('home') == null){

		}else{
			echo htmlspecialchars_decode(Lib::page('about')[0]['text']);
		}
		?>
	</div>
</div>