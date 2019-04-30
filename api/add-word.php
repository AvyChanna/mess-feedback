<?php
    session_start();
    if(  (!isset($_SESSION["loggedin"]))   ||   $_SESSION["loggedin"]==false || $_SESSION["status"]!="admin"){
        die("1");
    }
    // TODO change to post later
    if(trim($_GET["word"]))
    $mysqli = new mysqli("localhost", "root", "", "mess");
    if ($mysqli->connect_errno) die("2");
	$stmt = $mysqli->prepare("Insert into words ( word ) values ( ? )");
	$stmt->bind_param('s', $_GET['word']);
    if ($result = $stmt->execute()) {die("0");}
        else die("3");
    $mysqli->close();
?>