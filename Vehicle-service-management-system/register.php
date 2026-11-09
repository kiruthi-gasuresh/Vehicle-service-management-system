<?php
session_start();
include 'dbconn.php';

if(isset($_POST['register'])){

    $name             = $_POST['name'];
    $email            = $_POST['email'];
    $password         = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $phone            = $_POST['phone'];
    $address          = $_POST['address'];

    // PASSWORD CHECK
    if($password != $confirm_password){
        echo "<script>alert('Password and Confirm Password do not match');</script>";
    }
    else{

        // CHECK DUPLICATE EMAIL
        $check = "SELECT * FROM user WHERE email='$email'";
        $result = mysqli_query($conn, $check);

        if(mysqli_num_rows($result) > 0){
            echo "<script>alert('Email Already Exists');</script>";
        }
        else{

            // INSERT QUERY (PLAIN PASSWORD)
            $sql = "INSERT INTO user(name, email, password, phone, address)
                    VALUES('$name', '$email', '$password', '$phone', '$address')";

            if(mysqli_query($conn, $sql)){

                // SUCCESS → REDIRECT
                echo "<script>
                        alert('Registered Successfully');
                        window.location.href='success.php';
                      </script>";
                exit();

            } else {
                echo "<script>alert('Registration Failed');</script>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Vehicle Service Register</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    font-family:Arial,sans-serif;
    background:
    linear-gradient(rgba(0,0,0,0.75),rgba(0,0,0,0.75)),
    url('https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?q=80&w=1600');
    background-size:cover;
    background-position:center;
}

.register-box{
    width:430px;
    background:rgba(255,255,255,0.12);
    backdrop-filter:blur(12px);
    border-radius:20px;
    padding:35px;
    box-shadow:0 0 20px rgba(0,0,0,0.5);
    color:white;
}

.logo{
    text-align:center;
    font-size:55px;
    color:#ff9800;
    margin-bottom:10px;
}

.title{
    text-align:center;
    margin-bottom:25px;
    font-weight:bold;
}

.input-box{
    position:relative;
    margin-bottom:18px;
}

.input-box i{
    position:absolute;
    top:15px;
    left:15px;
    color:#666;
    font-size:18px;
}

.form-control{
    height:50px;
    border:none;
    border-radius:12px;
    padding-left:45px;
    font-size:15px;
}

textarea.form-control{
    height:90px;
    padding-top:12px;
}

.form-control:focus{
    box-shadow:none;
    border:2px solid #ff9800;
}

.btn-register{
    width:100%;
    height:50px;
    border:none;
    border-radius:12px;
    background:#ff9800;
    color:white;
    font-size:18px;
    font-weight:bold;
    transition:0.3s;
}

.btn-register:hover{
    background:#e68900;
    transform:scale(1.02);
}

.login-link{
    text-align:center;
    margin-top:18px;
}

.login-link a{
    color:#ff9800;
    text-decoration:none;
    font-weight:bold;
}

.login-link a:hover{
    text-decoration:underline;
}

</style>

</head>

<body>

<div class="register-box">

    <div class="logo">
        <i class="bi bi-car-front-fill"></i>
    </div>

    <h2 class="title">Create Account</h2>

    <form method="POST">

        <div class="input-box">
            <i class="bi bi-person-fill"></i>
            <input type="text" name="name" class="form-control" placeholder="Enter Your Name" required>
        </div>

        <div class="input-box">
            <i class="bi bi-envelope-fill"></i>
            <input type="email" name="email" class="form-control" placeholder="Enter Your Email" required>
        </div>

        <div class="input-box">
            <i class="bi bi-lock-fill"></i>
            <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
        </div>

        <div class="input-box">
            <i class="bi bi-shield-lock-fill"></i>
            <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" required>
        </div>

        <div class="input-box">
            <i class="bi bi-telephone-fill"></i>
            <input type="text" name="phone" class="form-control" placeholder="Phone Number" required>
        </div>

        <div class="input-box">
            <i class="bi bi-geo-alt-fill"></i>
            <textarea name="address" class="form-control" placeholder="Enter Address"></textarea>
        </div>

        <button type="submit" name="register" class="btn-register">
            Register Now
        </button>

    </form>

    <div class="login-link">
        Already have an account?
        <a href="login.php">Login</a>
    </div>

</div>

</body>
</html>