<?php

session_start();

include 'admin_dbconn.php';

// =======================
// ADMIN LOGIN
// =======================

if(isset($_POST['login'])){

    $email = mysqli_real_escape_string(
                $admin_conn,
                $_POST['email']
             );

    $password = $_POST['password'];

    // Check Admin

    $sql = "SELECT * FROM admin
            WHERE email='$email'";

    $result = mysqli_query($admin_conn,$sql);

    if(mysqli_num_rows($result) > 0){

        $row = mysqli_fetch_assoc($result);

        // Verify Password

        if(password_verify($password,$row['password'])){

            $_SESSION['admin'] = $row['email'];

            $_SESSION['admin_name'] = $row['name'];

            header("Location: admin_dashboard.php");

            exit();

        }else{

            echo "<script>alert('Invalid Password');</script>";
        }

    }else{

        echo "<script>alert('Admin Email Not Found');</script>";
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">

<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>Admin Login</title>

<!-- Bootstrap -->

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

    overflow:hidden;

    background:#0f172a;
}

/* Animated Background */

body::before{

    content:'';

    position:absolute;

    width:500px;
    height:500px;

    background:#ff6b00;

    border-radius:50%;

    top:-150px;
    left:-150px;

    filter:blur(120px);

    opacity:0.7;
}

body::after{

    content:'';

    position:absolute;

    width:500px;
    height:500px;

    background:#2563eb;

    border-radius:50%;

    bottom:-180px;
    right:-180px;

    filter:blur(120px);

    opacity:0.7;
}

/* Login Card */

.login-card{

    position:relative;

    width:430px;

    padding:45px;

    border-radius:30px;

    background:rgba(255,255,255,0.08);

    border:1px solid rgba(255,255,255,0.15);

    backdrop-filter:blur(18px);

    box-shadow:0 8px 40px rgba(0,0,0,0.4);

    z-index:10;

    color:white;
}

/* Logo */

.logo{

    width:90px;
    height:90px;

    background:linear-gradient(135deg,#ff6b00,#ff9800);

    border-radius:25px;

    margin:auto;

    display:flex;

    justify-content:center;

    align-items:center;

    transform:rotate(8deg);

    margin-bottom:25px;

    box-shadow:0 10px 25px rgba(255,107,0,0.4);
}

.logo i{

    font-size:42px;

    color:white;

    transform:rotate(-8deg);
}

/* Title */

.title{

    text-align:center;

    margin-bottom:30px;
}

.title h2{

    font-size:34px;

    font-weight:700;
}

.title p{

    color:#d1d5db;

    font-size:14px;
}

/* Input Box */

.input-box{

    margin-bottom:22px;

    position:relative;
}

.input-box i{

    position:absolute;

    top:18px;
    left:16px;

    color:#94a3b8;

    font-size:18px;
}

.form-control{

    height:58px;

    border:none;

    border-radius:16px;

    padding-left:48px;

    background:rgba(255,255,255,0.12);

    color:white;

    font-size:15px;
}

.form-control::placeholder{

    color:#cbd5e1;
}

.form-control:focus{

    box-shadow:none;

    border:2px solid #ff9800;

    background:rgba(255,255,255,0.15);

    color:white;
}

/* Button */

.btn-login{

    width:100%;

    height:58px;

    border:none;

    border-radius:16px;

    background:linear-gradient(135deg,#ff6b00,#ff9800);

    color:white;

    font-size:18px;

    font-weight:600;

    transition:0.4s;
}

.btn-login:hover{

    transform:translateY(-3px);

    box-shadow:0 12px 25px rgba(255,107,0,0.4);
}

/* Footer */

.footer{

    margin-top:20px;

    text-align:center;

    color:#cbd5e1;

    font-size:14px;
}

/* Responsive */

@media(max-width:500px){

.login-card{

    width:95%;

    padding:35px 25px;
}

.title h2{

    font-size:28px;
}

}

</style>

</head>

<body>

<!-- Login Card -->

<div class="login-card">

    <!-- Logo -->

    <div class="logo">

        <i class="bi bi-shield-lock-fill"></i>

    </div>

    <!-- Title -->

    <div class="title">

        <h2>Admin Panel</h2>

        <p>Prime Auto Care Management</p>

    </div>

    <!-- Login Form -->

    <form method="POST">

        <!-- Email -->

        <div class="input-box">

            <i class="bi bi-envelope-fill"></i>

            <input type="email"
                   name="email"
                   class="form-control"
                   placeholder="Admin Email"
                   required>

        </div>

        <!-- Password -->

        <div class="input-box">

            <i class="bi bi-lock-fill"></i>

            <input type="password"
                   name="password"
                   class="form-control"
                   placeholder="Password"
                   required>

        </div>

        <!-- Button -->

        <button type="submit"
                name="login"
                class="btn-login">

            <i class="bi bi-box-arrow-in-right"></i>

            Secure Login

        </button>

    </form>

    <!-- Footer -->

    <div class="footer">

        Vehicle Service Booking System

    </div>

</div>

</body>
</html>                                                                                 