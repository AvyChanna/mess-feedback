<?php
$_SESSION['message']='';
$mysqli = new mysqli('localhost', 'root', '','mess') or die("Connect failed: %s\n". $conn -> error);
if($_SERVER['REQUEST_METHOD']=='POST'){
	if($_POST['password']==$_POST['confpassword']){
		$mess = $mysqli->real_escape_string($_POST['mess']);
		$mess_manager = $mysqli->real_escape_string($_POST['mess_manager']);
		$mobileno = $mysqli->real_escape_string($_POST['manager_number']);
		$mobileno = (int)$mobileno;
		//$password = md5($_POST['password']);
		$password = $mysqli->real_escape_string($_POST['password']);
		$sql = "INSERT INTO mess (mess, username)". "Values ('".$mess."', '".$mess."_mess_manager')";
		$sql2 = "INSERT INTO users (username, `name`, rollno, passwordhash, mess, `status`)". "Values ('".$mess."_mess_manager', '".$mess_manager."', ".$mobileno.", '".$password."', '".$mess."', 'manager')";
		if (($mysqli->query($sql)==true) &&($mysqli->query($sql2)==true)){
			$_SESSION['message']= 'Registration successful';
			header('location: ../add_mess.php');
		} else die($mysqli->error);
	} else header('location: ../add_mess.php');
}
?>