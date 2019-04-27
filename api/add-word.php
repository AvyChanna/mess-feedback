<?php
    session_start();
    if(  (!isset($_SESSION["loggedin"]))   ||   !isset($_SESSION["username"])){
        echo 0
        die();
    }
    $mysqli = new mysqli("localhost", "root", "root", "mess");
    if ($mysqli->connect_errno)
        die("0");
	$stmt = $mysqli->prepare("Insert into words ( word ) values ( ? )");
	$stmt->bind_param('s', $_GET['word']);
    if ($result = $stmt->execute()) {}
        else die("Error in query: ".$mysqli->error);
    $mysqli->close();
?>