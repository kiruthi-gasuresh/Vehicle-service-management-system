<?php

$host = "localhost";

$user = "root";

$pass = "";

$dbname = "vehicle_service";

$admin_conn = new mysqli(
                    $host,
                    $user,
                    $pass,
                    $dbname
                );



if($admin_conn->connect_error){

    die("Connection Failed : "
        . $admin_conn->connect_error);

}


$admin_conn->set_charset("utf8");

?>