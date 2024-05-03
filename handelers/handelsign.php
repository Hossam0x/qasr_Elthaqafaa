<?php
session_start();
//include 'Reservationsdata.php';
include '../database.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST['email'];
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $phone = $_POST['phone'];
    $card=$_POST['cardnum'];
    $type='test';
    $date='test';
    $price='test';
}
    $id=$_GET['id'];
    $sqll="SELECT * from storedata where id='$id'";
    $result = mysqli_query($con, $sqll);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $type=$row['type'];
        $date=$row['date'];
        $price=$row['price'];
    }


$sql = "INSERT INTO reservations (user_email,type, date,phone,first_name,last_name,price) VALUES (?,?, ?,?,?,?,?)";
    
// Prepare and bind parameters
$stmt = $con->prepare($sql);
$stmt->bind_param("sssssss",$email, $type, $date,$phone,$firstname,$lastname,$price);

// Execute the statement
if ($stmt->execute()) {
    // Redirect to success page
    $_SESSION['create'] = "ticket added successfully.";
    header("Location: ../sign.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

// Close statement
$stmt->close();

// Close conection
$con->close();
?>

