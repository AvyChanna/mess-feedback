<?php
session_start();
if (match_found_in_database()) {
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
}

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    echo $_SESSION['username'];
} else {
    header('Location: login.html');
    die();
}
    // TODO: check cookies and goto login if required
    header('Location: login.html');
    die();
?>