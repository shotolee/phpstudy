<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Form Feedback</title>
	<style type="text/css" title="text/css" media="all">
	.error {
		font-weight:bold;
		color: #C00;
	}
	</style>
</head>
<body>
	<?php

	//Validate the name:
	if (!empty($_POST['name']) && !empty($_POST['comments']) && !empty($_POST['email']) ) {
		echo "<p>Thank you, <b>{$_POST['name']}</b>, for the following comments:<br />
		<tt>{$_POST['comments']}</tt>.</p>\n";
	} else {
		echo '<p class="error">Please go back and fil out the form again.</p>';
	}


	?>
</body>
</html>