<?php

session_start();

if(!isset($_SESSION['admin'])){

    header("location:admin_login.php");
    exit();

}

include 'admin_dbconn.php';

// Check ID

if(isset($_GET['id'])){

    $id = $_GET['id'];

    // Delete Query

    $sql = "DELETE FROM book_ing 
            WHERE booking_id='$id'";

    $result = mysqli_query($admin_conn,$sql);

    // Success

    if($result){

        echo "

        <script>

            alert('Booking Deleted Successfully');

            window.location='admin_managebookings.php';

        </script>

        ";

    }else{

        echo "

        <script>

            alert('Delete Failed');

            window.location='admin_managebookings.php';

        </script>

        ";

    }

}else{

    header("location:admin_managebookings.php");
    exit();

}

?>