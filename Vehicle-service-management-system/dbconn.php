<?php

$servername = "localhost";
$username   = "root";
$password   = "";
$database   = "vehicle_service";

// Create Connection
$conn = new mysqli($servername, $username, $password, $database);

// Check Connection
if($conn->connect_error){

    die("Connection Failed : " . $conn->connect_error);
}

?>