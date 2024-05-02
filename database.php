<?php 
    $hostname="localhost";
    $dbUser="root";
    $dbPassword="";
    $dbName="users";
    $con=mysqli_connect($hostname,$dbUser,$dbPassword,$dbName);
    if(!$con){
        die("something went wrong");
    }


?>