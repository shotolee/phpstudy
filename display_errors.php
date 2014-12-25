<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Display Errors</title>
</head>
<body>
	<?php 

	ini_set('display_errors', 1);

	foreach ($var as $v) {}
		$result = 1/0;

	?>
</body>
</html>