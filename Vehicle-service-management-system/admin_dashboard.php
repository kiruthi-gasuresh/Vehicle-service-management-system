<?php
session_start();
include 'dbconn.php';

/* COUNTS */
$user_count = mysqli_num_rows(mysqli_query($conn,"SELECT id FROM user"));
$booking_count = mysqli_num_rows(mysqli_query($conn,"SELECT id FROM bookings"));
$cancel_count = mysqli_num_rows(mysqli_query($conn,"SELECT id FROM bookings WHERE status='Cancelled'"));

$refund_count = mysqli_num_rows(mysqli_query($conn,"SELECT id FROM bookings WHERE payment_status='Refund Pending'"));

$refunded_count = mysqli_num_rows(mysqli_query($conn,"SELECT id FROM bookings WHERE payment_status='Refunded'"));
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<style>
body{
    margin:0;
    font-family:'Segoe UI', sans-serif;
    background: linear-gradient(135deg,#e0e7ff,#f8fafc,#fce7f3);
}

/* SIDEBAR */
.sidebar{
    width:250px;
    height:100vh;
    position:fixed;
    background: linear-gradient(180deg,#6366f1,#8b5cf6);
    padding:20px;
    color:white;
}

.sidebar h2{
    text-align:center;
    margin-bottom:25px;
}

.sidebar a{
    display:block;
    color:white;
    text-decoration:none;
    padding:12px;
    margin-bottom:10px;
    border-radius:10px;
    transition:0.3s;
    font-size:15px;
}

.sidebar a:hover{
    background: rgb(172, 92, 141);
    transform:translateX(5px);
}

/* MAIN */
.main{
    margin-left:270px;
    padding:30px;
}

.title{
    font-size:28px;
    font-weight:bold;
    color:#4f46e5;
    margin-bottom:20px;
}

/* GRID */
.grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(240px,1fr));
    gap:20px;
}

/* CARD */
.card{
    background:white;
    padding:22px;
    border-radius:18px;
    box-shadow:0 10px 25px rgba(0,0,0,0.08);
    text-align:center;
    border-left:6px solid #ad0e78;
    transition:0.3s;
}

.card:hover{
    transform:translateY(-6px);
}

.icon{
    font-size:34px;
    margin-bottom:10px;
}

.users{color:#16a34a;font-weight:bold;}
.bookings{color:#2563eb;font-weight:bold;}
.cancel{color:#dc2626;font-weight:bold;}
.refund{color:#f59e0b;font-weight:bold;}
.success{color:#22c55e;font-weight:bold;}

/* ROAD */
.road {
    position: fixed;
    bottom: 0;
    width: 100%;
    height: 80px;
    pointer-events: none;
    z-index:1;
}

.car1,.car2{
    position:absolute;
    font-size:40px;
    opacity:0.8;
}

.car1{animation:moveRight 7s linear infinite; bottom:10px;}
.car2{animation:moveLeft 7s linear infinite; bottom:40px;}

@keyframes moveRight{
    0%{left:-100px;}
    100%{left:110%;}
}

@keyframes moveLeft{
    0%{left:110%;}
    100%{left:-100px;}
}
</style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h2>⚙ Admin Panel</h2>

    <a href="admin_dashboard.php"><i class="bi bi-speedometer2"></i> Dashboard</a>
    <a href="admin_manageusers.php"><i class="bi bi-people"></i> Users</a>
    <a href="admin_view_bookings.php"><i class="bi bi-table"></i> Bookings</a>
    <a href="cancelled_details.php"><i class="bi bi-x-circle"></i> Cancelled</a>
    
    <a href="admin_profile.php"><i class="bi bi-person-circle"></i> Profile</a>
    <a href="admin_logout.php"><i class="bi bi-box-arrow-right"></i> Logout</a>
</div>

<!-- MAIN -->
<div class="main">

<div class="title">Dashboard Overview</div>

<div class="grid">

    <div class="card">
        <div class="icon">👤</div>
        <h4>Users</h4>
        <h2 class="users"><?php echo $user_count; ?></h2>
    </div>

    <div class="card">
        <div class="icon">📦</div>
        <h4>Bookings</h4>
        <h2 class="bookings"><?php echo $booking_count; ?></h2>
    </div>

    <div class="card">
        <div class="icon">❌</div>
        <h4>Cancelled</h4>
        <h2 class="cancel"><?php echo $cancel_count; ?></h2>
    </div>

    <div class="card">
        <div class="icon">💰</div>
        <h4>Refund Pending</h4>
        <h2 class="refund"><?php echo $refund_count; ?></h2>
    </div>

    <div class="card">
        <div class="icon">💸</div>
        <h4>Refunded</h4>
        <h2 class="success">
        
       <h2><?php echo $refund_count; ?></h2>
       <p>Refunded</p>


    </div>

    

</div>

</div>

<!-- ROAD -->
<div class="road">
    <div class="car1">🚗</div>
    <div class="car2">🚙</div>
</div>

</body>
</html>