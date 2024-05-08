<?php
session_start();
include '../core/function.php';
include '../database.php';

if (checkpostinput('add')) {
    $name =mysqli_real_escape_string($con, $_POST["name"]);
    $type = mysqli_real_escape_string($con, $_POST["select"]);
    $date = mysqli_real_escape_string($con, $_POST["WorkShopDay"]);
    $price = mysqli_real_escape_string($con, $_POST["TicketPrice"]);
    $ticketnum=mysqli_real_escape_string($con, $_POST["Ticketnum"]);

    if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $targetDirectory = "../uploads/";
        $targetFileName = $targetDirectory . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $targetFileName);
        $imagePath = $targetFileName;
    } else {
        $imagePath = ""; 
    }

    $sqlInsert = "INSERT INTO storedata (name,type, date, price, image) VALUES ('$name','$type', '$date', '$price', '$imagePath')";
    $sql="INSERT INTO ticketinfo(type,name,ticketno) VALUES ('$type','$name','$ticketnum')";
    mysqli_query($con, $sqlInsert);
    mysqli_query($con,$sql);
    $_SESSION['add'] = "Workshop added successfully.";
    redirect('../admin.php');
    exit();
}
?>
