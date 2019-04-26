<?php
    session_start();
    $mysqli = new mysqli("localhost", "root", "root", "mess");
    if ($mysqli->connect_errno)
        die("Connect failed: ".$mysqli->connect_error);
	$stmt = $mysqli->prepare("Insert into words ( word ) values ( ? )");
	$stmt->bind_param('s', $_GET['word']);
    if ($result = $stmt->execute()) {}
        else die("Error in query: ".$mysqli->error);
    $mysqli->close();
?>