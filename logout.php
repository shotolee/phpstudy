<?php #Stript 12.6

if (!isset($_COOKIE['user_id'])) {

	require ('includes/login_functions.inc.php');
	redirect_user();
} else {
	setcookie('user_id', '', time()-3600, '/', '', 0, 0);
	setcookie('first_name', '', time()-3600, '/', '', 0, 0);
}

$page_title = 'Logout Out!';

include ('includes/header.html');

echo "<h1>Logged Out!</h1>
<p>You are now logged out, {$_COOKIE['first_name']}!</p>";

include ('includes/footer.html');
?>