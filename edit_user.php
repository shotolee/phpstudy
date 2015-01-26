<?php

session_start();

if (!isset($_SESSION['user_id'])) {
	require ('includes/login_functions.inc.php');
	redirect_user();
}

	$page_title = 'Edit a User'; //定义title名称
	include ('includes/header.html'); //头部页面

	echo '<h1>Edit a User</h1>'; //输出标题

	//添加判断，验证是否get方式取得了id，同时验证id是否为数值格式，相同方法验证post方式。如果是否，输出错误提醒，并引入页面最后部分结束页面。
	if ((isset($_GET['id'])) && (is_numeric($_GET['id'])) ) {
		$id = $_GET['id'];
	} elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ){
		$id = $_POST['id'];
	} else {
		echo '<p class="error">This page has been accessed in error.</p>';
		include ('includes/footer.html');
		exit (); 
	}
	require_once ('mysqli_connect.php'); // 验证过请求后，调用数据库连接

	if ($_SERVER['REQUEST_METHOD'] == 'POST') { //主条件语句开始

		$errors = array(); //定义错误返回数组

		if(empty($_POST['first_name'])) {
			$errors[] = 'You forgot to enter your first name.'; //如果名为空返回
		} else {
			$fn = mysqli_real_escape_string($dbc, trim($_POST['first_name'])); //有名数值时的附值
		}

		if (empty($_POST['last_name'])) {
			$errors[] = 'You forgot to enter your last name.';
		} else {
			$ln = mysqli_real_escape_string($dbc, trim($_POST['last_name']));
		}

		if (empty($_POST['email'])) {
			$errors[] = 'You forgot to enter your email address.';

		} else {
			$e = mysqli_real_escape_string($dbc, trim($_POST['email']));

		}

		if (empty($errors)) { //如果errors数组为空，表示没有数据输入问题，查yqjEmail是否已被使用
			$q = "SELECT user_id FROM users WHERE email='$e' AND user_id != $id";//Email重复检查
			$r = @mysqli_query($dbc, $q);
			if (mysqli_num_rows($r) == 0) {
				$q = "UPDATE users SET first_name='$fn', last_name='$ln', email='$e' WHERE user_id=$id LIMIT 1";//无重复情况下，更新语句。
				$r = mysqli_query ($dbc, $q);

				if (mysqli_affected_rows($dbc) == 1) { //报告改动。如果只改了一行内容
					echo '<p>The user has been edited.</p>';

				} else { //改动不是一行，则应该是系统错误。没执行成功。
					echo '<p class="error">The user could not be edited due to a system error. We apologize for any inconvenience.</p>';
					echo '<p>'. mysqli_error($dbc).'<br />Query:' . $q . '</p>';
				}
			} else {

				//如果不是0，则表示Email已被注册。
				echo '<p class="error">The email address has already been registered.</p>';
			}
		} else {

				//errors数组有值时，表示有空的内容。逐行打出错误，查询哪条信息没录入。
				echo '<p class="error">The following error(s) occurred:<br />';
				foreach ($errors as $msg) {
					echo " - $msg<br />\n";
				}
				echo '</p><p>Please try again.</p>';
			}
		}
		

		$q = "SELECT first_name, last_name, email FROM users WHERE user_id=$id"; //查询库内条条目值。
		$r = @mysqli_query ($dbc, $q);

		if (mysqli_num_rows($r) == 1) {
			$row = mysqli_fetch_array ($r, MYSQLI_NUM); //取出的值存入Row数组。

			echo '<form action="edit_user.php" method="post">
			<p>First Name: <input type="text" name="first_name" size="15" maxlength="15" value="'.$row[0].'" /></p>
			<p>Last Name: <input type="text" name="last_name" size="15" maxlength="30" value="'.$row[1].'" /></p>
			<p>Email Address: <input type="text" name="email" size="20" maxlength="60" value="'.$row[2].'" /></p>
			<p><input type="submit" name="submit" value="Submit" /></p>
			<input type="hidden" name="id" value="'.$id.'" />
			</form>';

		} else {
			echo '<p class="error">This page has been accessed in error.</p>';
		}

	mysqli_close($dbc);
 	include ('includes/footer.html');

?>