// sign up a user
<?php
$_SESSION['message']='';
$mysqli = new mysqli('localhost', 'root', '','mess') or die("Connect failed: %s\n". $conn -> error);
if($_SERVER['REQUEST_METHOD']=='POST'){
	if($_POST['password']==$_POST['confpassword']){
		$username = $mysqli->real_escape_string($_POST['username']);
		$fullname = $mysqli->real_escape_string($_POST['name']);
		$rollno = $mysqli->real_escape_string($_POST['rollno']);
		$rollno = (int)$rollno;
		//$password = md5($_POST['password']);
		$password = $mysqli->real_escape_string($_POST['password']);
		$sql = "INSERT INTO users (username, `name`, rollno, passwordhash)". "Values ('".$username."', '".$fullname."', ".$rollno.", '".$password."')";

		if ($mysqli->query($sql)==true){
			$_SESSION['message']= 'Registration successful';
			header('location: ../login.php');
		} else die($mysqli->error);
	}
}
?>

