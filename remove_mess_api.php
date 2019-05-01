<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "mess");  
$sql2 = "SELECT * FROM users WHERE id='".$_POST["id"]."'";
$result = mysqli_query($connect, $sql2);
$row = mysqli_fetch_array($result);
$sql3= "DELETE FROM mess WHERE mess = '".$row["mess"]."'";
mysqli_query($connect, $sql3);
$sql = "DELETE FROM users WHERE id = '".$_POST["id"]."'";  
if(mysqli_query($connect, $sql))  
{  
    echo 'Data Deleted';  
}  
?>