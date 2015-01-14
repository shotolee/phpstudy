<?php # Script 11.5 - show_image.php

$name = FALSE;
 
 if (isset($_GET['image'])) {
 	$ext = strtolower (substr($_GET['image'], -4));

 	if (($set == '.jpg') OR ($sxt == 'jpeg') OR ($set == '.png')) {
 		$image = "../uploads/{_GET['image']}";

 		if (file_exists ($image) && (is_file($image))) {
 			$name = $_GET['image']
 		}
 	}


 }