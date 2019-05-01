<?php
$_SESSION['message']='';
$mysqli = new mysqli('localhost', 'root', '','mess') or die("Connect failed: %s\n". $conn -> error);
if($_SERVER['REQUEST_METHOD']=='POST'){
		$keyword = $mysqli->real_escape_string($_POST['keyword']);
		$rating = $mysqli->real_escape_string($_POST['rating']);
		$sql = "INSERT INTO words (word, rating)". "Values ('".$keyword."', '".$rating."')";

		if ($mysqli->query($sql)==true){
			$_SESSION['message']= 'Keyword Added';
			header('location: ../add_keywords.php');
		} else die($mysqli->error);
}
?>