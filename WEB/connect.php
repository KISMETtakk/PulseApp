<?php 

 $servername = "localhost";
 $username = "root";
 $password = "";
 $database = "UserPulseManagementDB";

 //establish connection with the database
 $connection = mysqli_connect($servername, $username, $password, $database);

 //check connection establishment
 if($connection->connect_error) {
     die("Connection failed: " . $connection->connect_error);
 }

?>