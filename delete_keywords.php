<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "mess");  
$sql = "DELETE FROM words WHERE id = '".$_POST["id"]."'";  
if(mysqli_query($connect, $sql))  
{  
    echo 'Data Deleted';  
}  
?>