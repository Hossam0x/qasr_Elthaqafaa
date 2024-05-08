<?php
if (isset($_GET['id'])) {
include '../updates/handelers/Reservationsdata.php';
include 'core/function.php';
$id = $_GET['id'];
$sql = "DELETE FROM reservations WHERE id='$id'";
if(mysqli_query($conn,$sql)){
    session_start();
    $_SESSION["delete"] = "ticket Deleted Successfully!";
    redirect("reservations.php");
}else{
    die("Something went wrong");
}
}else{
    echo "event does not exist";
}
?>

