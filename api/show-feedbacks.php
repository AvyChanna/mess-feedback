<?php
session_start ();
$_SESSION['message']='';
$data = array();
$mysqli = new mysqli('localhost', 'root', '','mess') or printf("Connect failed: %s\n". $conn -> error);
// if($_SERVER['REQUEST_METHOD']=='POST'){
$result = $mysqli->query("SELECT * FROM `feedbacks`");
if (($result)){
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $data[] = array(
                "mess" => $row["mess"],
                "feedback" => $row["feedback"],
                "rating" => $row["rating"],
                "date" => $row["date"]
            );
        }
    }
    header('Content-type:application/json;charset=utf-8');
    echo json_encode($data);
        //mysqli_close($mysqli);
} else die($mysqli->error);
?>
