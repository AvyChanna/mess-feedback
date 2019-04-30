<?php
session_start();
if(  (!isset($_SESSION["loggedin"]))   ||   ($_SESSION["loggedin"]=false)){
    header("Location: login.php");
    die();
} else {
    header('Location: home.php');
    die();
}
?>