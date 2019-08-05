<?php

session_start();

require_once('config.php');

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE user_name = ? AND user_password = ? LIMIT 1";

$stmtselect = $db->prepare($sql);

$result = $stmtselect->execute([$username, $password]);

if($result){
	$user = $stmtselect->fetch(PDO::FETCH_ASSOC);
	if($stmtselect->rowCount() > 0){
		$_SESSION['userlogin'] = $user;
		echo 'Welcome back!';
	}else{
		echo 'User does not exist';
	}
}else{
	echo 'There were errors while connecting to the database.';
}