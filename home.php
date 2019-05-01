<?php
session_start();
if(  (!isset($_SESSION["loggedin"]))   ||   ($_SESSION["loggedin"]=="f")){
    header("Location: login.php");
    die();
}else{
    if($_SESSION["status"]=="admin")
    {
        header("Location: admin.php");
    }
    if($_SESSION["status"]=="manager")
    {
        header("Location: manager.php");
    }
    if($_SESSION["status"]=="student")
    {
        header("Location: student.php");
    }
}
?>