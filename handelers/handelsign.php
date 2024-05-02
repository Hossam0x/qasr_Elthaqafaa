<?php
session_start();
include 'Reservationsdata.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST['email'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $firstselect = $_POST['firstselect'];
    $secondselect = $_POST['secondselect'];
    $phone = $_POST['phone'];
}

$sql = "INSERT INTO reservations (user_email,type, date,phone,first_name,last_name) VALUES (?,?, ?,?,?,?)";
    
// Prepare and bind parameters
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss",$email, $firstselect, $secondselect,$phone,$firstname,$lastname);

// Execute the statement
if ($stmt->execute()) {
    // Redirect to success page
    $_SESSION['create'] = "ticket added successfully.";
    header("Location: ../sign.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close statement
$stmt->close();

// Close connection
$conn->close();
?>

