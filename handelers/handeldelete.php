<?php 
    session_start();
    include '../database.php';
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
            header("Location:../events.php");
        }else{
            die("Something went wrong");
        }
        }else{
            echo "this event does not exist";
        }
        ?>



?>