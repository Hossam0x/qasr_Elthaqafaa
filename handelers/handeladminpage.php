<?php
session_start();
include '../database.php';

if (isset($_POST["add"])) {
    $type = mysqli_real_escape_string($con, $_POST["name"]);
    $date = mysqli_real_escape_string($con, $_POST["WorkShopDay"]);
    $price = mysqli_real_escape_string($con, $_POST["TicketPrice"]);

    // Check if file was uploaded successfully
    if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $targetDirectory = "../uploads/";
        $targetFileName = $targetDirectory . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $targetFileName);
        $imagePath = $targetFileName;
    } else {
        $imagePath = ""; // Set image path to empty if no new image is uploaded
    }

    $sqlInsert = "INSERT INTO storedata (type, date, price, image) VALUES ('$type', '$date', '$price', '$imagePath')";
    mysqli_query($con, $sqlInsert);
    $_SESSION['add'] = "Workshop added successfully.";
    header('Location: ../admin.php');
    exit();
}
?>
