```php
<?php

session_start();

include 'dbconn.php';

/* Example Login Session
$_SESSION['user']="Kiruthiga";
*/

if(!isset($_SESSION['user'])){

    header("location:login.php");

    exit();

}

$username=$_SESSION['user'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>User Profile</title>

<!-- Bootstrap CSS -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Icons -->

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial,sans-serif;
}

body{

    min-height:100vh;

    background:
    linear-gradient(rgba(0,0,0,0.75),rgba(0,0,0,0.75)),
    url('https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?q=80&w=1600&auto=format&fit=crop');

    background-size:cover;
    background-position:center;
    background-repeat:no-repeat;

    display:flex;
    justify-content:center;
    align-items:center;

    padding:20px;

    overflow:hidden;

}

/* Profile Card */

.profile-card{

    width:500px;

    background:rgba(255,255,255,0.12);

    backdrop-filter:blur(15px);

    border:1px solid rgba(255,255,255,0.2);

    border-radius:30px;

    padding:40px;

    text-align:center;

    color:white;

    box-shadow:0 10px 40px rgba(0,0,0,0.5);

    animation:fadeIn 1s ease;

    z-index:2;

}

/* Profile Image */

.profile-img{

    width:120px;

    height:120px;

    border-radius:50%;

    border:5px solid #ff9800;

    object-fit:cover;

    margin-bottom:20px;

}

/* Heading */

.profile-card h1{

    font-size:35px;

    margin-bottom:10px;

    font-weight:bold;

}

/* Text */

.profile-card p{

    font-size:18px;

    color:#ddd;

    margin-bottom:15px;

}

/* Buttons */

.btn-custom{

    display:inline-block;

    padding:12px 25px;

    border-radius:15px;

    text-decoration:none;

    font-size:17px;

    font-weight:bold;

    transition:0.4s;

    margin:10px;

}

/* Home */

.btn-home{

    background:#ff9800;

    color:white;

}

.btn-home:hover{

    background:#ff5722;

    transform:translateY(-4px);

}

/* Logout */

.btn-logout{

    background:white;

    color:#212529;

}

.btn-logout:hover{

    background:#ddd;

    transform:translateY(-4px);

}

/* Animation */

@keyframes fadeIn{

from{

    opacity:0;
    transform:translateY(40px);

}

to{

    opacity:1;
    transform:translateY(0);

}

}

/* Responsive */

@media(max-width:600px){

.profile-card{

    width:95%;
    padding:30px;

}

.profile-card h1{

    font-size:28px;

}

}

/* ROAD */

.road{

    position:fixed;

    bottom:0;

    left:0;

    width:100%;

    height:90px;

    background:#2d2d2d;

    border-top:5px solid #555;

    overflow:hidden;

}

/* White Line */

.road::before{

    content:'';

    position:absolute;

    top:40px;

    width:100%;

    height:6px;

    background:repeating-linear-gradient(
        to right,
        white 0px,
        white 50px,
        transparent 50px,
        transparent 100px
    );

}

/* Scooter */

.scooter{

    position:absolute;

    bottom:10px;

    font-size:60px;

    animation:scooterMove 8s linear infinite;

}

/* Scooter Animation */

@keyframes scooterMove{

    0%{

        left:-100px;

    }

    100%{

        left:110%;

    }

}

</style>

</head>

<body>

<div class="profile-card">

<img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" class="profile-img">

<h1>

<i class="bi bi-person-circle"></i>

<?php echo $username; ?>

</h1>

<p>

Welcome to Vehicle Service Booking System

</p>

<p>

Manage your bookings quickly and easily.

</p>

<div class="mt-4">

<a href="index.php" class="btn-custom btn-home">

<i class="bi bi-house-fill"></i>

Home

</a>

<a href="view.php" class="btn-custom btn-home">

<i class="bi bi-eye-fill"></i>

My Bookings

</a>

<a href="logout.php" class="btn-custom btn-logout">

<i class="bi bi-box-arrow-right"></i>

Logout

</a>

<div class="text-center mt-4">
    <a href="dashboard.php" class="btn btn-primary">
        <i class="bi bi-speedometer2"></i> Go to Dashboard
    </a>
</div>

</div>

</div>

<!-- ROAD -->

<div class="road">

    <div class="scooter">🛵</div>

</div>

</body>
</html>
```
