<?php
session_start ();
$_SESSION['message']='';
$data = array();
$mysqli = new mysqli('localhost', 'root', '','mess') or die("Connect failed: %s\n". $conn -> error);
// if($_SERVER['REQUEST_METHOD']=='POST'){
$result = $mysqli->query("SELECT mess, Avg(rating) as rom FROM `feedbacks` group by mess");
if ($result){
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $data[] = array(
                "mess" => $row["mess"],
                "rom"  => $row["rom"]
            );
        }
    }
    header('Content-type:application/json;charset=utf-8');
    echo json_encode($data);
        //mysqli_close($mysqli);
} else die($mysqli->error);
?>
