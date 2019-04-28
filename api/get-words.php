<?php
    session_start();
    $mysqli = new mysqli("localhost", "root", "", "mess");
    $data_arr = array();
    if ($mysqli->connect_errno)
        die("Connect failed: ".$mysqli->connect_error);
    $query = "SELECT word  FROM words";
    if ($result = $mysqli->query($query)) {
        while ($row = $result->fetch_assoc())
            array_push($data_arr,$row['word']);
        header('Content-Type: application/json');
        echo json_encode($data_arr);
        $result->free();
    } else die("Error in query: ".$mysqli->error);
    $mysqli->close();
    die();
?>