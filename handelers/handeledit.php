<?php 
session_start();
include '../database.php';
include '../core/function.php';
if(!isset($_SESSION['auth'])){
    header('Location: ../login.php');
    exit();
}
if (checkpostinput('edit')) {
    $name = mysqli_real_escape_string($con, $_POST["name"]);
    $date = mysqli_real_escape_string($con, $_POST["WorkShopDay"]);
    $price = mysqli_real_escape_string($con, $_POST["TicketPrice"]);
    $numticket = mysqli_real_escape_string($con, $_POST["numticket"]);

    $id = mysqli_real_escape_string($con, $_POST["id"]);

    if ($_FILES['imagetmp']['error'] === UPLOAD_ERR_OK) {
        $targetDirectory = "../uploads/";
        $targetFileName = $targetDirectory . basename($_FILES['imagetmp']['name']);
        if (!move_uploaded_file($_FILES['imagetmp']['tmp_name'], $targetFileName)) {
            die('File move failed.');
        }
        $imagePath = $targetFileName;
        
        // Update book details with new image
        $sqlUpdate = "UPDATE storedata SET name = '$name', date = '$date', price = '$price', image = '$imagePath' WHERE id = '$id';";
        $sqlUpdate .= "UPDATE ticketinfo SET ticketno = '$numticket' ,name='$name' WHERE id = '$id'";

    } else {
        // Update book details without changing the image
        $sqlUpdate = "UPDATE storedata SET name = '$name', date = '$date', price = '$price' WHERE id = '$id'; ";
        $sqlUpdate .= "UPDATE ticketinfo SET ticketno = '$numticket' ,name='$name' WHERE id='$id'";
    }

    if (mysqli_multi_query($con, $sqlUpdate)) {
        do {
        } while (mysqli_next_result($con));
    } else {
        die('Database update failed: ' . mysqli_error($con));
    }
    $_SESSION['update'] = "updated successfully.";
    redirect("../edit.php?id=$id");
    exit();
}
?>
