<?php
	session_start();
	if(!empty($_SESSION['usk']) && isset($_SESSION['usk'])){
		session_unset($_SESSION['usk']);
		unset($_SESSION);
		session_destroy();
		header('location:../index.php?sntby=lo');
	}
	else{
		unset($_SESSION);
		session_destroy();
	}
?>