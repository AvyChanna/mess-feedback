<?php
    session_start();
    if(  (!isset($_SESSION["loggedin"]))   ||   $_SESSION["loggedin"]=="f" || $_SESSION["status"]!="admin"){
        die("1");
    }
    $mysqli = new mysqli("localhost", "root", "", "mess");
    if ($mysqli->connect_errno) die("2");
    $stmt = $mysqli->prepare("delete from words where word = ( ? )");
    // TODO change to post later
	$stmt->bind_param('s', $_GET['word']);
    if ($result = $stmt->execute()) {die("0");}
        else die("4");
    $mysqli->close();
?>