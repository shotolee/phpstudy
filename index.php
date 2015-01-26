		<?php 

session_start();
		
	function create_ad() {
		echo '<p class="ad">This is an annoyingad! This is annoying ad! This is an aonnoying ad! </p>';
	}


		$page_title= 'Welcome to this Site!';
		include ('includes/header.html');
		create_ad();
		?>



		<h1>Content Header</h1>
		<p>This is where the page-specific content goes. This section, and the corresponding header, will change from one page to the next.</p>

		<p>Volutpat at varius sed sollicitudin et, arcu. Vivamus viverra. Nullam turpis. Vestibulum sed etiam. Loren</p>

		<?php
		create_ad();
		include ('includes/footer.html');
		?>