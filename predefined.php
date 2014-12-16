<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Predefined Variables</title>
</head>
<body>
<?php 

//Create a shorthand version of the variable names;
$file = $_SERVER['SCRIPT_FILENAME'];
$user = $_SERVER['HTTP_USER_AGENT'];
$server = $_SERVER['SERVER_SOFTWARE'];

//Print the name of this script:
echo "<p>You are running the file:<br /><b>$file</b>.</p>\n";

//echo "<P>You are running the file: $_SERVER['SCRIPT_FILENAME']"
//Print the user's information:
echo "<p>You are viewing this page using:<br /><b>$user</b></p>\n";

//Print the server' informatino:
echo "<p>This server is running:<br /><b>$server</b>.</p>\n";

?>

</body>
</html>
