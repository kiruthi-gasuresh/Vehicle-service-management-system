

<?php

session_start();

include 'dbconn.php';

/* CHECK LOGIN */

if(!isset($_SESSION['user'])){

    header("Location: login.php");

    exit();
}

/* USER */

$user = $_SESSION['user'];

/* FETCH BOOKINGS */


$sql = "SELECT * FROM bookings 
        ORDER BY id DESC";


$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>My Bookings</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{

    background:#f5f5f5;

    font-family:Arial,sans-serif;

    padding:30px;
}

/* TITLE */

h2{

    text-align:center;

    margin-bottom:25px;

    color:#212529;

    font-weight:bold;
}

/* TABLE BOX */

.table-box{

    background:white;

    padding:20px;

    border-radius:20px;

    box-shadow:0 5px 20px rgba(0,0,0,0.1);

    overflow-x:auto;
}

/* TABLE */

table{

    width:100%;

    border-collapse:collapse;
}

th{

    background:#212529;

    color:white;

    padding:14px;

    text-align:center;
}

td{

    padding:14px;

    text-align:center;

    border-bottom:1px solid #ddd;
}

tr:hover{

    background:#f9f9f9;
}

/* BUTTONS */

.cancel-btn{

    background:#f59e0b;

    color:white;

    padding:8px 14px;

    border-radius:10px;

    text-decoration:none;

    font-weight:bold;
}

.cancel-btn:hover{

    background:#d97706;
}

.cancelled{

    background:#ef4444;

    color:white;

    padding:8px 14px;

    border-radius:10px;

    font-weight:bold;
}

.refunded{

    background:#22c55e;

    color:white;

    padding:8px 14px;

    border-radius:10px;

    font-weight:bold;
}

/* DASHBOARD BUTTON */

.dashboard-btn{

    display:inline-block;

    margin-top:20px;

    background:#0d6efd;

    color:white;

    padding:12px 20px;

    border-radius:10px;

    text-decoration:none;

    font-weight:bold;
}

.dashboard-btn:hover{

    background:#0b5ed7;
}

</style>

</head>

<body>

<h2>📋 My Bookings</h2>

<div class="table-box">

<?php if(mysqli_num_rows($result) > 0){ ?>

<table>

<tr>

    <th>ID</th>

    <th>User</th>

    <th>Service</th>

    <th>Vehicle</th>

    <th>Date</th>

    <th>Slot</th>

    <th>Payment</th>

    <th>Amount</th>

    <th>Action</th>

</tr>

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<tr>

    <td><?php echo $row['id']; ?></td>

    <td><?php echo $row['user']; ?></td>

    <td><?php echo $row['service']; ?></td>

    <td><?php echo $row['vehicle_type']; ?></td>

    <td><?php echo $row['date']; ?></td>

    <td><?php echo $row['slot']; ?></td>

    <td><?php echo $row['payment']; ?></td>

    <td>₹ <?php echo $row['amount']; ?></td>

    <td>

<?php

/* REFUNDED */

if($row['refund_status'] == 'Refunded'){

?>

<span class="refunded">

    Refunded

</span>

<?php

}

/* CANCELLED */

elseif($row['status'] == 'Cancelled'){

?>

<span class="cancelled">

    Cancelled

</span>

<?php

}

/* NORMAL */

else{

?>

<a href="cancel_booking.php?id=<?php echo $row['id']; ?>" 
class="cancel-btn">

    Cancel

</a>

<?php

}

?>

    </td>

</tr>

<?php } ?>

</table>

<?php } else { ?>

<h3 style="text-align:center;color:red;">

No Bookings Found

</h3>

<?php } ?>

<div style="text-align:center;">

<a href="dashboard.php" class="dashboard-btn">

⬅ Go to Dashboard

</a>

</div>

</div>

</body>
</html>

