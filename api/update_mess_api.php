<?php
$_SESSION['message']='';
$mysqli = new mysqli('localhost', 'root', '','mess') or die("Connect failed: %s\n". $conn -> error);
if($_SERVER['REQUEST_METHOD']=='POST'){
		$mess = $mysqli->real_escape_string($_POST['mess']);
		$mess_manager = $mysqli->real_escape_string($_POST['mess_manager']);
		$mobileno = $mysqli->real_escape_string($_POST['manager_number']);
		$mobileno = (int)$mobileno;
		$sql2 = "UPDATE users SET `name`='".$mess_manager."', rollno = '".$mobileno."' WHERE username = '".$mess."_mess_manager'";
		if (($mysqli->query($sql2))){
			$_SESSION['message']= 'Registration successful';
			header('location: ../update_mess.php');
		} else die($mysqli->error);
}
?>