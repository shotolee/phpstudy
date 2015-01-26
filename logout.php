<?php #Stript 12.6

session_start();

if (!isset($_SESSION['user_id'])) {

	require ('includes/login_functions.inc.php');
	redirect_user();
} else {

	$_SESSION = array();
	session_destroy();
	setcookie('PHPSESSID', '', time()-3600, '/', '', 0, 0);
}

$page_title = 'Logout Out!';

include ('includes/header.html');


echo "<h1>Logged Out!</h1>
<p>You are now logged out!</p>";

include ('includes/footer.html');
?>