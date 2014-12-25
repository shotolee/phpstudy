<?php
	$page_title = 'Delete a User'; //定义title名称
	include ('includes/header.html'); //头部页面

	echo '<h1>Delete a User</h1>'; //输出标题

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


	if ($_POST['sure'] == 'Yes') {  //如果回答是确认

		$q = "DELETE FROM users WHERE user_id=$id LIMIT 1";  //删除对应的条目
		$r = @mysqli_query ($dbc, $q);         //执行删除动作
		if (mysqli_affected_rows($dbc) == 1) {  //验证是否删除的数据只有1行
			echo '<p>The user has been deleted.</p>';  //删除成功提示语
		} else {
			echo '<p class="error">The user could not be deleted due to a system error.</p>';
			//非一行情况下报system error. because user_id be only one 
			echo '<p>' . mysqli_error($dbc) . '<br />Query:' . $q . '</p>';
		} 
	} else {
		echo '<p>The user has not been deleted.</p>';
		//如果不确认删除的情况下，提示用户未删除。
	}
} else {  //未选择确认删除的情况下，显示被选中的内容

	$q = "SELECT CONCAT(last_name, ', ', first_name) FROM users WHERE user_id=$id";  //按id检索出数据库中查找到的用户，将名称组成输出。
	$r = @mysqli_query ($dbc, $q);  //调用操作数据库

	if (mysqli_num_rows($r) == 1) {   //验下数据库返回结果是否唯一
		$row = mysqli_fetch_array ($r, MYSQLI_NUM);  
		/*得到ID行数对应的各项数据值，并存入为数组.
		输出数组的第一个值，为name；
		*/
		/*
		下部是显示的列表，依次是： 确认提示语－－Form启始－yesorno选项－提交按钮－ 隐藏传输id值到前面的方法。
		*/
		echo "<h3>Name: $row[0]</h3>  
		Are you sure you want to delete this user?";

		echo '<form action="delete_user.php" method="post">
		<input type="radio" name="sure" value="Yes" />Yes
		<input type="radio" name="sure" value="No" checked="checked" />no
		<input type="submit" name="submit" value="Submit" />
		<input type="hidden" name="id" value="' . $id . '" />
		</form>';
	} else {
		echo '<p class="error">This page has been accessed in error.</p>'; //如果查出的id不唯一，表示数据有问题，提示错误。
	}

	}

 	mysqli_close($dbc);
 	include ('includes/footer.html');

?>