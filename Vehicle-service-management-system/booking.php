<?php
session_start();
include 'dbconn.php';

if(!isset($_SESSION['user'])){
    header("location:login.php");
    exit();
}

$user = $_SESSION['user'];

$sql = "SELECT * FROM bookings WHERE user='$user' ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>My Bookings</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<style>

body{
    margin:0;
    font-family:Arial;
    background: linear-gradient(135deg,#667eea,#764ba2);
}

/* HEADER */
.header{
    text-align:center;
    color:white;
    padding:25px;
}

/* CARD */
.box{
    background:white;
    border-radius:20px;
    padding:20px;
    box-shadow:0 10px 30px rgba(0,0,0,0.2);
}

/* TABLE */
table{
    width:100%;
    border-collapse:collapse;
}

th{
    background:#4f46e5;
    color:white;
    padding:12px;
    text-align:center;
}

td{
    padding:12px;
    text-align:center;
}

tr:nth-child(even){
    background:#f3f4f6;
}

tr:hover{
    background:#e0e7ff;
}

/* BADGES */
.cash{
    background:green;
    color:white;
    padding:5px 10px;
    border-radius:10px;
}

.upi{
    background:#f97316;
    color:white;
    padding:5px 10px;
    border-radius:10px;
}

/* NO DATA */
.empty{
    text-align:center;
    padding:20px;
    color:gray;
}

.container{
    padding:30px;
}

</style>

</head>

<body>

<div class="header">
    <h2><i class="bi bi-calendar-check"></i> My Bookings</h2>
    <p>Your service booking history</p>
</div>

<div class="container">

<div class="box">

<?php if(mysqli_num_rows($result) > 0){ ?>

<table>

<tr>
    <th>ID</th>
    <th>Service</th>
    <th>Vehicle</th>
    <th>Date</th>
    <th>Slot</th>
    <th>Payment</th>
    <th>Amount</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['service']; ?></td>
    <td><?php echo $row['vehicle_type']; ?></td>
    <td><?php echo $row['date']; ?></td>
    <td><?php echo $row['slot']; ?></td>

    <td>
        <?php if($row['payment']=="Cash"){ ?>
            <span class="cash">Cash</span>
        <?php } else { ?>
            <span class="upi">UPI</span>
        <?php } ?>
    </td>

    <td>₹ <?php echo $row['amount']; ?></td>
</tr>

<?php } ?>

</table>


<?php } else { ?>

<div class="empty">
    <h5>No bookings found 😔</h5>
    <p>Book your first service now!</p>
</div>

<?php } ?>

</div>

</div>

</body>
</html>