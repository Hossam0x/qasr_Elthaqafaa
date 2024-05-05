<?php 
session_start();
include '../database.php';
if(!isset($_SESSION['auth'])){
    header('Location: ../login.php');
    exit();
}
if (isset($_POST["edit"])) {
    $name = mysqli_real_escape_string($con, $_POST["name"]);
    $date = mysqli_real_escape_string($con, $_POST["WorkShopDay"]);
    $price = mysqli_real_escape_string($con, $_POST["TicketPrice"]);
    $numticket = mysqli_real_escape_string($con, $_POST["numticket"]);

    $id = mysqli_real_escape_string($con, $_POST["id"]);

    // Check if a new image is being uploaded
    if ($_FILES['imagetmp']['error'] === UPLOAD_ERR_OK) {
        // Handle image upload
        $targetDirectory = "../uploads/";
        $targetFileName = $targetDirectory . basename($_FILES['imagetmp']['name']);
        if (!move_uploaded_file($_FILES['imagetmp']['tmp_name'], $targetFileName)) {
            die('File move failed.');
        }
        $imagePath = $targetFileName;
        
        // Update book details with new image
        $sqlUpdate = "UPDATE storedata SET name = '$name', date = '$date', price = '$price', image = '$imagePath' WHERE id = '$id';";
        $sqlUpdate .= "UPDATE ticketinfo SET ticketno = '$numticket' WHERE name = '$name'";

    } else {
        // Update book details without changing the image
        $sqlUpdate = "UPDATE storedata SET name = '$name', date = '$date', price = '$price' WHERE id = '$id'; ";
        $sqlUpdate .= "UPDATE ticketinfo SET ticketno = '$numticket' WHERE name = '$name'";
    }

    if (mysqli_multi_query($con, $sqlUpdate)) {
        do {
            // handle each query result as needed
        } while (mysqli_next_result($con));
    } else {
        die('Database update failed: ' . mysqli_error($con));
    }
    $_SESSION['update'] = "updated successfully.";
    header("Location: ../edit.php?id=$id");
    exit();
}
?>
