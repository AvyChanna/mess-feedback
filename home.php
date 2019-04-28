<?php
session_start();
if(  (!isset($_SESSION["loggedin"]))   ||   ($_SESSION["loggedin"]=false)){
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
    if($_SESSION["status"]=="user")
    {
        header("Location: user.php");
    }
}
?>