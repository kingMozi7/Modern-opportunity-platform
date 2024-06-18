<?php
// Start the session
session_start();

// Check if the user is not logged in, then redirect them to the login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

// Logout logic
if(isset($_POST['logout'])) {
    // Destroy the session
    session_destroy();
    
    // Redirect the user to the login page or any other appropriate page
    header("location: login.php");
    exit;
}
?>