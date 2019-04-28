<?php
session_start ();
$_SESSION['message']='';
$mysqli = new mysqli('localhost', 'root', '','mess') or die("Connect failed: %s\n". $conn -> error);
if($_SERVER['REQUEST_METHOD']=='POST'){
	if(true){
		$username = $mysqli->real_escape_string($_POST['username']);
		//$password = md5($_POST['password']);
		$password = $mysqli->real_escape_string($_POST['password']);
		$sql = "SELECT passwordhash FROM users WHERE username='".$username."'";
		$result = mysqli_query($mysqli, $sql);
		if (($mysqli->query($sql)==true)){
			if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					if($row["passwordhash"]==$password){
						if($row["status"]=="admin"){
							header('location: ../admin.php');
						}
						if($row["status"]=="manager"){
							header('location: ../manager.php');
						}
						else
							header('location: ../home.php');
					}
				 }
			}
			//mysqli_close($mysqli);
		} else die($mysqli->error);
	}
}
?>
