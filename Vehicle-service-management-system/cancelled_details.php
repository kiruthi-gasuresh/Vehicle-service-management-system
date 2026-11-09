<?php

include 'dbconn.php';

/* REFUND BUTTON ACTION */

if(isset($_GET['refund'])){

    $id = intval($_GET['refund']);

    mysqli_query($conn,

    "UPDATE bookings 
     SET 
     refund_status='Refunded',
     payment_status='Refunded'
     WHERE id=$id");

    header("Location: admin_dashboard.php?msg=refundsuccess");
exit();

   
}

/* FETCH CANCELLED BOOKINGS */

$sql = "SELECT * FROM bookings 
        WHERE status='Cancelled' 
        ORDER BY id DESC";

$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>
<head>

<title>Cancelled Bookings</title>

<style>

body{
    margin:0;
    font-family:'Segoe UI', sans-serif;
    min-height:100vh;
    padding:20px;

    background: linear-gradient(
    135deg,
    #4c1d95,
    #6d28d9,
    #8b5cf6,
    #a78bfa
    );
}

/* TITLE */

h2{
    text-align:center;
    color:white;
    font-size:28px;
    margin-bottom:20px;
    text-shadow:0 3px 10px rgba(0,0,0,0.4);
}

/* SUCCESS MESSAGE */

.success-box{

    background:#22c55e;

    color:white;

    padding:15px;

    margin-bottom:20px;

    border-radius:12px;

    text-align:center;

    font-weight:bold;

    max-width:1100px;

    margin-left:auto;

    margin-right:auto;
}

/* CONTAINER */

.container{

    max-width:1100px;

    margin:auto;

    background: rgba(255,255,255,0.08);

    backdrop-filter: blur(15px);

    border:1px solid rgba(255,255,255,0.15);

    padding:20px;

    border-radius:20px;

    box-shadow:0 20px 60px rgba(0,0,0,0.4);

    position:relative;
}

/* TABLE */

table{
    width:100%;
    border-collapse:collapse;
    color:white;
}

th{
    background: rgba(255,255,255,0.15);
    padding:12px;
    border-radius:10px;
    font-size:14px;
}

td{
    padding:12px;
    text-align:center;
    border-bottom:1px solid rgba(255,255,255,0.1);
}

tr:hover{
    background: rgba(255,255,255,0.08);
    transition:0.3s;
}

/* EMPTY */

.empty{
    text-align:center;
    color:#fbcfe8;
    font-weight:bold;
    padding:20px;
}

/* DASHBOARD BUTTON */

.btn-dashboard{
    display:inline-block;
    margin-top:20px;
    padding:12px 18px;

    background: linear-gradient(
    135deg,
    #a78bfa,
    #6366f1
    );

    color:white;

    text-decoration:none;

    border-radius:12px;

    font-weight:bold;

    box-shadow:0 10px 25px rgba(0,0,0,0.3);

    transition:0.3s;
}

.btn-dashboard:hover{
    transform:scale(1.05);
}

/* REFUND BUTTON */

.btn-refund{

    background:#22c55e;

    color:white;

    padding:10px 16px;

    text-decoration:none;

    border-radius:10px;

    font-weight:bold;

    transition:0.3s;
}

.btn-refund:hover{

    background:#16a34a;

    transform:scale(1.05);
}

/* REFUNDED BUTTON */

.btn-refunded{

    background:#64748b;

    color:white;

    padding:10px 16px;

    border-radius:10px;

    font-weight:bold;
}

/* GLOW */

.container::before{

    content:"";

    position:absolute;

    inset:0;

    border-radius:20px;

    padding:2px;

    background: linear-gradient(
    135deg,
    #c084fc,
    #8b5cf6,
    #6366f1
    );

    opacity:0.2;

    z-index:-1;
}

</style>

</head>

<body>

<h2>❌ Cancelled Bookings</h2>

<!-- SUCCESS MESSAGE -->

<?php if(isset($_GET['msg'])){ ?>

<div class="success-box">

    Refunded Successfully ✅

</div>

<?php } ?>

<div class="container">

<?php if(mysqli_num_rows($result) > 0){ ?>

<table>

<tr>
    <th>User</th>
    <th>Service</th>
    <th>Vehicle</th>
    <th>Date</th>
    <th>Slot</th>
    <th>Amount</th>
    <th>Refund</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<tr>

    <td><?php echo $row['user']; ?></td>

    <td><?php echo $row['service']; ?></td>

    <td><?php echo $row['vehicle_type']; ?></td>

    <td><?php echo $row['date']; ?></td>

    <td><?php echo $row['slot']; ?></td>

    <td>₹ <?php echo $row['amount']; ?></td>

    <td>

<?php if($row['refund_status'] == 'Refunded'){ ?>

    <span class="btn-refunded">
        Refunded
    </span>

<?php } else { ?>

    <a href="?refund=<?php echo $row['id']; ?>" 
       class="btn-refund"
       onclick="return confirm('Are you sure to refund?')">

       Refund

    </a>

<?php } ?>

    </td>

</tr>

<?php } ?>

</table>

<?php } else { ?>

<div class="empty">

    No Cancelled Bookings Found

</div>

<?php } ?>

<!-- DASHBOARD BUTTON -->

<div style="text-align:center;">

    <a href="admin_dashboard.php" class="btn-dashboard">

        ⬅ Go to Dashboard

    </a>

</div>

</div>

</body>
</html>

