<?php
    // connecting to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "mcq_db";


    // create a connection
    $conn = mysqli_connect($servername,$username,$password,$database);
    // if(!$conn){
    //     die("Sorry we cannot able to connect" . mysqli_connect_error(). "<br>");
    // }else{
    //     echo "<br> Connection is successfully <br>";
    // }
?>

