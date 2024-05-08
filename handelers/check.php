<?php
include '../core/function.php';
session_start();

if (!isset($_SESSION['auth'])) {
    redirect("../login.php");
    exit; 
}
else{
    redirect("../sign.php");
}
?>