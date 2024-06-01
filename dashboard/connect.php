<?php 

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "pulsedb";

    //establish connection with the database
    $conn = mysqli_connect($servername, $username, $password, $database);

    //check connection establishment
    if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

?>