<?php
if (isset($_GET['id'])) {
include '../updates/handelers/Reservationsdata.php';
$id = $_GET['id'];
$sql = "DELETE FROM reservations WHERE id='$id'";
if(mysqli_query($conn,$sql)){
    session_start();
    $_SESSION["delete"] = "ticket Deleted Successfully!";
    header("Location:reservations.php");
}else{
    die("Something went wrong");
}
}else{
    echo "Book does not exist";
}
?>

