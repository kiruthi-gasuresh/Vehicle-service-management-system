<?php
session_start();
include 'dbconn.php';

$sql = "SELECT * FROM bookings ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin - View Bookings</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<style>
body{
    margin:0;
    font-family:Arial;
    background: linear-gradient(135deg,#667eea,#764ba2,#f093fb);
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

/* PAYMENT BADGES */
.badge-cash{
    background:green;
    color:white;
    padding:6px 10px;
    border-radius:10px;
}

.badge-upi{
    background:#f97316;
    color:white;
    padding:6px 10px;
    border-radius:10px;
}

/* STATUS BADGES */
.badge-booked{
    background:#22c55e;
    color:white;
    padding:6px 10px;
    border-radius:10px;
}

.badge-cancelled{
    background:#ef4444;
    color:white;
    padding:6px 10px;
    border-radius:10px;
}

.container{
    padding:30px;
}

/* DASHBOARD BUTTON */
.btn-dashboard{
    margin-top:20px;
    display:inline-block;
}
</style>

</head>

<body>

<div class="header">
    <h2><i class="bi bi-speedometer2"></i> Admin Dashboard</h2>
    <p>All Customer Bookings</p>
</div>

<div class="container">

<div class="box">

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
    <th>Status</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<tr>
    <td><?php echo $row['id']; ?></td>

    <td><i class="bi bi-person-circle"></i> <?php echo $row['user']; ?></td>

    <td><?php echo $row['service']; ?></td>

    <td><i class="bi bi-car-front-fill"></i> <?php echo $row['vehicle_type']; ?></td>

    <td><?php echo $row['date']; ?></td>

    <td><?php echo $row['slot']; ?></td>

    <td>
        <?php if($row['payment']=="Cash"){ ?>
            <span class="badge-cash">Cash</span>
        <?php } else { ?>
            <span class="badge-upi">UPI</span>
        <?php } ?>
    </td>

    <td>₹ <?php echo $row['amount']; ?></td>

    <!-- 🔥 STATUS FIX -->
    <td>
        <?php 
        if($row['status'] == "Cancelled"){
            echo "<span class='badge-cancelled'>Cancelled</span>";
        } else {
            echo "<span class='badge-booked'>".$row['status']."</span>";
        }
        ?>
    </td>

</tr>

<?php } ?>

</table>

<!-- DASHBOARD BUTTON -->
<div class="text-center mt-4 mb-3">
    <a href="admin_dashboard.php" class="btn btn-primary">
        <i class="bi bi-speedometer2"></i> Go to Dashboard
    </a>
</div>

</div>

</div>

</body>
</html>