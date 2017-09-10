<?php require 'includes/connection.php'; ?>
<?php include 'includes/functions.php'; ?>
<?php
	if (isset($_SESSION['boardlogin'])){
		$redirect_page = 'schoollogin.php';
	}else if (isset($_SESSION['schoollogin'])){
		$redirect_page = 'boardlogin.php';
	}
	else{
		$redirect_page = 'schoollogin.php';
	}
	session_start();
	session_destroy();
	redirect_to($redirect_page);
?>