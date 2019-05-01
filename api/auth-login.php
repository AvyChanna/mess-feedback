<?php
session_start();
if(  (!isset($_SESSION["loggedin"]))   ||   ($_SESSION["loggedin"]=="f")){
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$mysqli = new mysqli('localhost', 'root', '','mess') or printf("Connect failed: %s\n". $conn -> error);
		$username = $mysqli->real_escape_string($_POST['username']);
		//$password = md5($_POST['password']);
		$password = $mysqli->real_escape_string($_POST['password']);
		$sql = "SELECT * FROM users WHERE username='".$username."'";
		$result = mysqli_query($mysqli, $sql);
		if (($mysqli->query($sql))){
			if (mysqli_num_rows($result) == 1) {
				$row = mysqli_fetch_assoc($result);
				if ($row == false) die();
				if($row["passwordhash"]==$password){
					$_SESSION["loggedin"]="t";
					$_SESSION["status"]=$row["status"];
					$_SESSION["username"]=$row["username"];
					$_SESSION["name"]=$row["name"];
					$_SESSION["rollno"]=$row["rollno"];
					$_SESSION["mess"]=$row["mess"];
					$_SESSION["password"]=$row["passwordhash"];
					header('location: ../home.php');
					die();
				}
			} else {header('location: ../login.php'); die();}
			//mysqli_close($mysqli);
		} else 
		{header('location: ../login.php');die($mysqli->error);}
	}
} else if(  (isset($_SESSION["loggedin"]))   &&   ($_SESSION["loggedin"]=="t")){
    header('Location: ../home.php');
    die();
}
header('location: ../login.php');die();
?>
