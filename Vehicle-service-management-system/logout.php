<?php

session_start();

session_destroy();

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Logout</title>

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

    height:100vh;

    background:
    linear-gradient(rgba(102, 95, 56, 0.75),rgba(58, 114, 131, 0.47)),
    url('https://images.unsplash.com/photo-1502877338535-766e1452684a?q=80&w=1600&auto=format&fit=crop');
    background-size:cover;
    background-position:center;
    background-repeat:no-repeat;

    display:flex;
    justify-content:center;
    align-items:center;

    overflow:hidden;

}

/* Logout Box */

.logout-box{

    width:500px;

    background:rgba(255,255,255,0.12);

    backdrop-filter:blur(15px);

    border:1px solid rgba(255,255,255,0.2);

    padding:50px;

    border-radius:30px;

    text-align:center;

    color:white;

    box-shadow:0 10px 40px rgba(0,0,0,0.5);

    animation:fadeIn 1s ease;

}

/* Icon */

.logout-icon{

    font-size:80px;

    color:#ff9800;

    margin-bottom:20px;

    animation:rotateIcon 2s infinite linear;

}

/* Heading */

.logout-box h1{

    font-size:40px;

    margin-bottom:15px;

    font-weight:bold;

}

/* Text */

.logout-box p{

    color:#ddd;

    font-size:18px;

    margin-bottom:35px;

    line-height:30px;

}

/* Buttons */

.btn-custom{

    display:inline-block;

    padding:14px 30px;

    border-radius:15px;

    text-decoration:none;

    font-size:18px;

    font-weight:bold;

    transition:0.4s;

    margin:10px;

}

/* Login Button */

.btn-login{

    background:linear-gradient(45deg,#ff9800,#ff5722);

    color:white;

}

.btn-login:hover{

    transform:translateY(-4px);

    box-shadow:0 10px 20px rgba(255,87,34,0.4);

}

/* Home Button */

.btn-home{

    background:white;

    color:#212529;

}

.btn-home:hover{

    background:#ddd;

    transform:translateY(-4px);

}

/* Animations */

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

@keyframes rotateIcon{

from{
    transform:rotate(0deg);
}

to{
    transform:rotate(360deg);
}

}

/* Responsive */

@media(max-width:600px){

.logout-box{

    width:90%;
    padding:35px;

}

.logout-box h1{

    font-size:30px;

}

.logout-box p{

    font-size:16px;

}

}

</style>

</head>

<body>

<div class="logout-box">

<div class="logout-icon">

<i class="bi bi-check-circle-fill"></i>

</div>

<h1>
    Logged Out Successfully
</h1>

<p>
Thank you for using our Vehicle Service Booking System.<br>

Your session has been ended safely.<br>

Visit again for quick and professional vehicle service booking.
</p>

<a href="login.php" class="btn-custom btn-login">

<i class="bi bi-box-arrow-in-right"></i>

Login Again

</a>

<a href="index.php" class="btn-custom btn-home">

<i class="bi bi-house-fill"></i>

Go To Home

</a>

</div>

</body>
</html>