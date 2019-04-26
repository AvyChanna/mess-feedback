<?php
    header('Content-Type: application/json');
    $mysqli = new mysqli("localhost", "root", "root", "mess");
    if ($mysqli->connect_errno)
        die("Connect failed: ".$mysqli->connect_error);
    $query = "SELECT *  FROM words";
    if ($result = $mysqli->query($query)) {
        while ($row = $result->fetch_assoc()) {
            $data[] = array(
                "id" => $row['id'],
                "word" => $row['word']
            );
        }
        echo json_encode($data);
        $result->free();
    } else die("Error in query: ".$mysqli->error);
    $mysqli->close();
    die();
?>