<?php 
    session_start();
    include '../database.php';
    include '../core/function.php';
    if(!isset($_SESSION['auth'])){
        header('Location: ../login.php');
        exit();
    }
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "DELETE FROM storedata WHERE id='$id'";
        if(mysqli_query($con,$sql)){
            session_start();
            $_SESSION["delete"] = "Deleted Successfully!";
            redirect('../events.php');
        }else{
            die("Something went wrong");
        }
        }else{
            echo "this event does not exist";
        }
        ?>



?>