<?php
    session_start();
    if((!isset($_SESSION["loggedin"])) || $_SESSION["loggedin"]=false || $_SESSION["status"]!="student" )
		die("1");
	if(isset($_POST['newmess'])) {
    $mysqli = new mysqli("localhost", "root", "", "mess");
	if ($mysqli->connect_errno) die("2");
	$newmess = mysqli_escape_string($mysqli, $_POST['newmess']);
	$user = mysqli_escape_string($mysqli, $_SESSION['username']);
	if($stmt = $mysqli->query("update `users` set `mess` = '".$newmess."' where `username` = '".$user."' ")) {
		$_SESSION['mess']=$newmess;
		header("location: /student_change_mess.php");
		die();
	} else die("3");
	} else die("4");
?>