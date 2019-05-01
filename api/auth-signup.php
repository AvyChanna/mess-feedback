<?php
session_start();
$_SESSION['message']='';
$mysqli = new mysqli('localhost', 'root', '','mess') or die("Connect failed: %s\n". $conn -> error);
if($_SERVER['REQUEST_METHOD']=='POST'){
	if($_POST['password']==$_POST['confpassword']){
		$username = $mysqli->real_escape_string($_POST['username']);
		$fullname = $mysqli->real_escape_string($_POST['name']);
		$mess = $mysqli->real_escape_string($_POST['mess']);
		$rollno = $mysqli->real_escape_string($_POST['rollno']);
		$rollno = (int)$rollno;
		//$password = md5($_POST['password']);
		$password = $mysqli->real_escape_string($_POST['password']);
		$sql = "INSERT INTO users (username, `name`, rollno, passwordhash, mess)". "Values ('".$username."', '".$fullname."', ".$rollno.", '".$password."', '".$mess."')";

		if ($mysqli->query($sql)){
			$_SESSION['message']= 'Registration successful';
			header('location: ../login.php');
		} else die($mysqli->error);
	} else die("Password does not match");
}
?>

