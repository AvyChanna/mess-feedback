<?php
    session_start();
    $_SESSION['loggedin']="t";
    $_SESSION['username']='test';
    $_SESSION['name']='Test';
    $_SESSION['mess']='a';
    $_SESSION['rollno']='12345';
	$_SESSION['status']='admin';
	header("location: admin.php");
?>