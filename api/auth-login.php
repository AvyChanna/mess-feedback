<?php
session_start();
if(  (!isset($_SESSION["loggedin"]))   ||   ($_SESSION["loggedin"]=false)){
    $mysqli = new mysqli('localhost', 'root', '','mess') or die("Connect failed: %s\n". $conn -> error);
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$username = $mysqli->real_escape_string($_POST['username']);
		//$password = md5($_POST['password']);
		$password = $mysqli->real_escape_string($_POST['password']);
		$sql = "SELECT * FROM users WHERE username='".$username."'";
		$result = mysqli_query($mysqli, $sql);
		if (($mysqli->query($sql)==true)){
			if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					if($row["passwordhash"]==$password){
						$_SESSION["loggedin"]=true;
						$_SESSION["status"]=$row["status"];
						$_SESSION["username"]=$row["username"];
						$_SESSION["name"]=$row["name"];
						$_SESSION["rollno"]=$row["rollno"];
						$_SESSION["mess"]=$row["mess"];
						header('location: ../home.php');
					}
				}
			} else header('location: ../login.php');
			//mysqli_close($mysqli);
		} else die($mysqli->error);
	}
    die();
} else {
    header('Location: ../home.php');
    die();
}
?>
