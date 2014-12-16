<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>String</title>
</head>
<body>
	<?php 

	$quantity = 30;
	$price = 119.95;
	$taxrate = .05;

	$total = $quantity * $price;
	$total = $total + ($total * $taxrate);

	$total = number_format($total, 2);


	//Print the values:
	echo "<h3>Using double quotation marks:</h3>";
	echo "<p>You are purchasing <b>$quantity</b>widget(s) at a cost of <b>$$price </b> each. With tax, the total comes to <b>$$total</b>.</p>";

	echo '<h3>Using single quotation marks:</h3>';
	echo '<p>You are purchasing <b>'.$quantity.'</b> widget(s) at a cost of <b>$'.$price.'</b> each. With tax, the total comes to <b>$'.$total.'</b>.</p>';

	?>
</body>
</html>