<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Testing PCRE</title>
</head>
<body>

	<?php

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$pattern = stripslashes(trim($_POST['pattern']));
		$subject = stripslashes(trim($_POST['subject']));

		echo "<p>The result of checking<br /><b>$pattern</b><br />against<br />$subject<br />is ";

		if (preg_match ($pattern, $subject)) {
			echo 'TRUE!</p>';
		} else {
			echo 'FALSE!</p>';
		}
	}

	?>

	<form action="pcre.php" method="post">
		<p>Regular Expression Pattern: <input type="text" name="pattern" value="<?php if (isset($pattern)) echo htmlentities($pattern); ?>" size="40" /> (include the delimiters)</p>
		<p>Test Subject: <input type="text" name="subject" value="<?php if (isset ($subject)) echo htmlentities($subject); ?>" size="40" /></p>
		<input type="submit" name="submit" value="Test!" />
	</form>

</body>
</html>