<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>Images</title>
	<script type="text/javascript" charset="utf-8" src="js/function.js"></script>
</head>

<body>
	<p>Click on an image to view it in a separate window.</p>
	<ul>
		<?php #Script 11.4-image.php

		$dir = '../uploads';

		$files = scandir($dir);

		foreach ($files as $image) {

			if (substr($image, 0, 1) != '.') {
				$image_size = getimagesize("$dir/$image");

				$image_name = urlencode($image);

				echo "<li><a href=\"javascript:create_window('$image_name', $image_size[0], $image_size[1])\"> $image</a></li>\n";
			} //end of the if

		} //end of the foreach loop
		?>
	</ul>

</body>


</html>