<?php
$email = $_SESSION['auth'][1];
$sql = "SELECT * FROM user WHERE email = ?";
$stmt = mysqli_stmt_init($con);
if (mysqli_stmt_prepare($stmt, $sql)) {
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);
}


if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $new_email = $_POST['email'];
    $username = $_POST['username'];
    $phone=$_POST['phone'];

    $update_query = "UPDATE user SET name=?, email=?, phonenumber=?,username=? WHERE email=?";
    $update_stmt = mysqli_stmt_init($con);
    if (mysqli_stmt_prepare($update_stmt, $update_query)) {
        mysqli_stmt_bind_param($update_stmt, "ssiss", $name, $new_email, $phone, $username, $email);
        if (mysqli_stmt_execute($update_stmt)) {
            $sql = "SELECT * FROM user WHERE email = ?";
            $stmt = mysqli_stmt_init($con);
            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, "s", $new_email); 
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                $user = mysqli_fetch_assoc($result);
                $_SESSION['auth'][0] = $username; 
                $_SESSION['auth'][1] = $new_email; 
            }
        } else {
            echo "Error updating user data: " . mysqli_error($con);
        }
    } else {
        echo "Error preparing update statement: " . mysqli_error($con);
    }
}

mysqli_close($con);
