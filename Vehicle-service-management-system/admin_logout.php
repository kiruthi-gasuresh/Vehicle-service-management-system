<?php

session_start();

// Destroy Session

session_unset();

session_destroy();

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>Admin Logout</title>

<!-- Bootstrap CSS -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet">

<!-- Bootstrap Icons -->

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<!-- Google Font -->

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
      rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{

    min-height:100vh;

    display:flex;

    justify-content:center;

    align-items:center;

    background:
    linear-gradient(rgba(0,0,0,0.75),
    rgba(0,0,0,0.75)),
    url('https://images.unsplash.com/photo-1502877338535-766e1452684a?q=80&w=1600');

    background-size:cover;

    background-position:center;

    overflow:hidden;
}

/* Logout Box */

.logout-box{

    width:460px;

    background:rgba(255,255,255,0.10);

    backdrop-filter:blur(18px);

    border-radius:30px;

    padding:45px;

    text-align:center;

    color:white;

    box-shadow:0 10px 35px rgba(0,0,0,0.45);

    animation:fadeIn 1s ease;
}

/* Icon */

.logout-icon{

    width:100px;

    height:100px;

    margin:auto;

    border-radius:50%;

    background:linear-gradient(45deg,#ff9800,#ff5722);

    display:flex;

    justify-content:center;

    align-items:center;

    margin-bottom:25px;

    box-shadow:0 10px 25px rgba(255,87,34,0.4);
}

.logout-icon i{

    font-size:50px;

    color:white;
}

/* Heading */

.logout-box h1{

    font-size:40px;

    font-weight:700;

    margin-bottom:15px;
}

/* Message */

.logout-box p{

    color:#f1f5f9;

    font-size:17px;

    line-height:30px;

    margin-bottom:35px;
}

/* Button */

.btn-login{

    display:inline-block;

    padding:14px 30px;

    background:linear-gradient(45deg,#ff9800,#ff5722);

    color:white;

    border-radius:14px;

    text-decoration:none;

    font-size:17px;

    font-weight:600;

    transition:0.3s;
}

.btn-login:hover{

    transform:translateY(-3px);

    box-shadow:0 10px 20px rgba(255,87,34,0.4);

    color:white;
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

</style>

</head>

<body>

<div class="logout-box">

    <!-- Icon -->

    <div class="logout-icon">

        <i class="bi bi-power"></i>

    </div>

    <!-- Heading -->

    <h1>

        Logout Successful

    </h1>

    <!-- Message -->

    <p>

        You have successfully logged out
        from the Admin Dashboard.

        <br><br>

        Your vehicle service management
        session has ended securely 🚗

    </p>

    <!-- Button -->

    <a href="admin_login.php"
       class="btn-login">

        <i class="bi bi-arrow-left-circle-fill"></i>

        Back To Login

    </a>

</div>

</body>
</html>