<?php

session_start();
include 'core/function.php';

$_SESSION = array();

session_destroy();

redirect("login.php");
exit;
?>
