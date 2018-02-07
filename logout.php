<?php
	session_start();
	session_destroy();
	$_SESSION["role"]="";
	header("location:login.php");
?>
