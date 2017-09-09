<?php require 'includes/connection.php'; ?>
<?php include 'includes/functions.php'; ?>
<?php
	if (isset($_SESSION['cust_id'])){
		$redirect_page = 'user_login.php';
	}else if (isset($_SESSION['user_id'])){
		$redirect_page = 'customerlogin.php';
	}
	else{
		$redirect_page = 'customerlogin.php';
	}
	session_start();
	session_destroy();
	redirect_to($redirect_page);
?>