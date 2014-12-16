<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>String</title>
</head>
<body>

	<table border="0" cellspacing="3" dellpadding="3" align="center">
		<tr>
			<td><h2>Rating</h2></td>
			<td><h2>Title</h2></td>
		</tr>

	<?php 

	$movies = array (
		'Casablanca' => 10,
		'To Kill a Mockingbird' => 10,
		'The English Patient' => 2,
		'Stranger Than Fiction' => 9,
		'Story of the weeping Camel'=> 5,
		'Donnie Darko' => 7
		);

	echo '<tr><td colspan="2"><b>In their original order:</b></td></tr>';
	foreach ($movies as $title => $rating) {
		echo "<tr><td>$rating</td>
		<td>$title</td></tr>\n";
	}

	ksort($movies);
	echo '<tr><td colspan="2"><b>Sorted by title:</b></td></tr>';
	foreach ($movies as $title => $rating) {
		echo "<tr><td>$rating</td>
		<td>$title</td></tr>\n";
	}

	arsort($movies);
	echo '<tr><td colspan="2"><b>Sorted by rating:</b></td></tr>';
	foreach ($movies as $title => $rating) {
		echo "<tr><td>$rating</td>
		<td>$title</td></tr>\n";
	}


	?>
</body>
</html>