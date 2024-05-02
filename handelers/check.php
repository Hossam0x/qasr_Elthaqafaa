<?php
session_start();

// Check if 'auth' session variable is not set
if (!isset($_SESSION['auth'])) {
    // Redirect to login page
    header("Location: ../login.php");
    exit; // Ensure that the script stops executing after redirection
}
else{
    header("Location: ../sign.php");
}
?>