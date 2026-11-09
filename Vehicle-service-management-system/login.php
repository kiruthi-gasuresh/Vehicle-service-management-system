<?php
session_start();
include 'dbconn.php';

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    // FIX: email column used
    $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) == 1){

        $row = mysqli_fetch_assoc($result);

        // SESSION FIX
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user'] = $row['email']; // or name if available

        header("Location: dashboard.php");
        exit();

    } else {
        echo "<script>alert('Invalid Email or Password');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Login Page</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
    linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.7)),
    url('https://images.unsplash.com/photo-1503376780353-7e6692767b70?q=80&w=1600');
    background-size:cover;
    background-position:center;
    display:flex;
    justify-content:center;
    align-items:center;
}

.login-box{
    width:400px;
    background:rgba(255,255,255,0.12);
    backdrop-filter:blur(12px);
    padding:35px;
    border-radius:20px;
    box-shadow:0 0 25px rgba(0,0,0,0.5);
    color:white;
}

.logo{
    text-align:center;
    font-size:55px;
    color:#ff9800;
    margin-bottom:10px;
}

h2{text-align:center;margin-bottom:25px;}

.input-group{
    position:relative;
    margin-bottom:20px;
}

.input-group i{
    position:absolute;
    top:15px;
    left:15px;
    color:#666;
}

.form-control{
    height:50px;
    border:none;
    border-radius:10px;
    padding-left:45px;
}

.btn-login{
    width:100%;
    height:50px;
    border:none;
    border-radius:10px;
    background:#ff9800;
    color:white;
    font-weight:bold;
    font-size:18px;
}

.btn-login:hover{
    background:#e68900;
}

.register-text{
    text-align:center;
    margin-top:18px;
}

.register-text a{
    color:#ff9800;
    text-decoration:none;
    font-weight:bold;
}
</style>

</head>

<body>

<div class="login-box">

<div class="logo">
    <i class="bi bi-car-front-fill"></i>
</div>

<h2>Login</h2>

<form method="POST">

<div class="input-group">
    <i class="bi bi-envelope-fill"></i>
    <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
</div>

<div class="input-group">
    <i class="bi bi-lock-fill"></i>
    <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
</div>

<button type="submit" name="login" class="btn-login">
Login
</button>

</form>

<div class="register-text">
Don't have an account?
<a href="register.php">Register</a>
</div>

</div>

</body>
</html>