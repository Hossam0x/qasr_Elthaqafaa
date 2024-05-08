<?php
session_start();
include '../database.php';
include '../core/function.php';
if (CheckRequestMethod("POST")) {
    // Retrieve form data
    $email = $_POST['email'];
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $phone = $_POST['phone'];
    $card = $_POST['cardnum']; 
    $type = 'test';
    $date = 'test';
    $price = 'test';
    $id = $_GET['id'];
    $numticket=$_POST['num_tickets'];

    $sqll = "SELECT * FROM storedata WHERE id='$id'";
    $result = mysqli_query($con, $sqll);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $type = $row['type'];
        $date = $row['date'];
        $price = $row['price'];
        $name = $row['name'];
    }

    $sql = "INSERT INTO reservations (user_email, type, name, date, phone, first_name, last_name, price, ticketnum, cardnumber) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ssssssssss", $email, $type, $name, $date, $phone, $firstname, $lastname, $price, $numticket, $card);

    if ($stmt->execute()) {
        $_SESSION['create'] = "ticket added successfully.";
        $sqlup = "SELECT ticketno FROM ticketinfo WHERE id='$id'";
        $resultup = mysqli_query($con, $sqlup);
        if (mysqli_num_rows($resultup) > 0) {
            $rowup = mysqli_fetch_assoc($resultup);
            $ticketno = $rowup['ticketno'];
            $new_numticket = $ticketno - $numticket;
            
            $sql_update = "UPDATE ticketinfo SET ticketno = ? WHERE id = ?";
            $stmt_update = $con->prepare($sql_update);
            $stmt_update->bind_param("ii", $new_numticket, $id);
            if ($stmt_update->execute()) {
                redirect("../sign.php?id=" . $id);
                exit();
            } else {
                echo "Error updating numticket: " . $con->error;
            }
            $stmt_update->close();
        } else {
            echo "No rows found in ticketinfo for id: " . $id;
        }
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    $stmt->close();
}

$con->close();
?>
