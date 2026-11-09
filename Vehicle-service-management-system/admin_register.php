<?php

session_start();

include 'admin_dbconn.php';

if(isset($_POST['register'])){

    $name = mysqli_real_escape_string(
                $admin_conn,
                $_POST['name']
            );

    $email = mysqli_real_escape_string(
                $admin_conn,
                $_POST['email']
            );

    $password = $_POST['password'];

    $confirm_password = $_POST['confirm_password'];

    // Password Match Check

    if($password != $confirm_password){

        echo "
        <script>
            alert('Passwords Do Not Match');
        </script>
        ";

    }else{

        // Check Existing Email

        $check = "SELECT * FROM admin
                  WHERE email='$email'";

        $result = mysqli_query($admin_conn,$check);

        if(mysqli_num_rows($result) > 0){

            echo "
            <script>
                alert('Admin Email Already Exists');
            </script>
            ";

        }else{

            // Hash Password

            $hash_password = password_hash(
                                $password,
                                PASSWORD_DEFAULT
                             );

            // Insert Query

            $sql = "INSERT INTO admin(
                        name,
                        email,
                        password
                    )

                    VALUES(
                        '$name',
                        '$email',
                        '$hash_password'
                    )";

            if(mysqli_query($admin_conn,$sql)){

                echo "
                <script>

                    alert('Admin Registered Successfully');

                    window.location='admin_login.php';

                </script>
                ";

            }else{

                echo "
                <script>
                    alert('Registration Failed');
                </script>
                ";
            }

        }

    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>Admin Registration</title>

<!-- Bootstrap -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet">

<!-- Bootstrap Icons -->

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<!-- Google Font -->

<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;700&display=swap"
      rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Orbitron',sans-serif;
}

body{

    min-height:100vh;

    display:flex;

    justify-content:center;

    align-items:center;

    overflow:hidden;

    background:#050816;
}

/* Animated Background */

.bg-circle1{

    position:absolute;

    width:350px;
    height:350px;

    background:#00f7ff;

    border-radius:50%;

    top:-120px;
    left:-120px;

    filter:blur(120px);

    opacity:0.5;
}

.bg-circle2{

    position:absolute;

    width:350px;
    height:350px;

    background:#ff00c8;

    border-radius:50%;

    bottom:-120px;
    right:-120px;

    filter:blur(120px);

    opacity:0.5;
}

/* Main Card */

.register-card{

    position:relative;

    width:460px;

    padding:6px;

    border-radius:30px;

    background:rgba(255,255,255,0.08);

    border:1px solid rgba(255,255,255,0.15);

    backdrop-filter:blur(20px);

    box-shadow:0 0 40px rgba(0,255,255,0.15);

    z-index:10;

    color:white;
}

/* Logo */

.logo{

    width:100px;
    height:100px;

    margin:auto;

    border-radius:25px;

    background:linear-gradient(135deg,#00f7ff,#0066ff);

    display:flex;

    justify-content:center;

    align-items:center;

    margin-bottom:25px;

    box-shadow:0 0 30px rgba(0,247,255,0.5);
}

.logo i{

    font-size:45px;

    color:white;
}

/* Heading */

.heading{

    text-align:center;

    margin-bottom:35px;
}

.heading h2{

    font-size:34px;

    font-weight:700;

    letter-spacing:2px;
}

.heading p{

    color:#cbd5e1;

    margin-top:8px;

    font-size:14px;
}

/* Input Box */

.input-box{

    position:relative;

    margin-bottom:22px;
}

.input-box i{

    position:absolute;

    top:18px;
    left:15px;

    color:#00f7ff;

    font-size:18px;
}

.form-control{

    height:58px;

    border:none;

    border-radius:16px;

    padding-left:48px;

    background:rgba(255,255,255,0.08);

    color:white;

    font-size:14px;

    border:1px solid rgba(255,255,255,0.1);
}

.form-control::placeholder{

    color:#cbd5e1;
}

.form-control:focus{

    background:rgba(255,255,255,0.12);

    color:white;

    border:1px solid #00f7ff;

    box-shadow:0 0 15px rgba(0,247,255,0.3);
}

/* Register Button */

.btn-register{

    width:100%;

    height:58px;

    border:none;

    border-radius:16px;

    background:linear-gradient(135deg,#00f7ff,#0066ff);

    color:white;

    font-size:18px;

    font-weight:bold;

    letter-spacing:1px;

    transition:0.4s;
}

.btn-register:hover{

    transform:translateY(-3px);

    box-shadow:0 10px 25px rgba(0,247,255,0.4);
}

/* Login Link */

.login-link{

    margin-top:22px;

    text-align:center;

    color:#cbd5e1;

    font-size:14px;
}

.login-link a{

    color:#00f7ff;

    text-decoration:none;

    font-weight:bold;
}

.login-link a:hover{

    text-decoration:underline;
}

/* Responsive */

@media(max-width:500px){

.register-card{

    width:95%;

    padding:35px 25px;
}

.heading h2{

    font-size:28px;
}

}

</style>

</head>

<body>

<!-- Background -->

<div class="bg-circle1"></div>

<div class="bg-circle2"></div>

<!-- Register Card -->

<div class="register-card">

    <!-- Logo -->

    <div class="logo">

        <i class="bi bi-shield-lock-fill"></i>

    </div>

    <!-- Heading -->

    <div class="heading">

        <h2>ADMIN PANEL</h2>

        <p>Secure Registration Portal</p>

    </div>

    <!-- Form -->

    <form method="POST">

        <!-- Name -->

        <div class="input-box">

            <i class="bi bi-person-fill"></i>

            <input type="text"
                   name="name"
                   class="form-control"
                   placeholder="Admin Name"
                   required>

        </div>

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

        <!-- Confirm Password -->

        <div class="input-box">

            <i class="bi bi-shield-check"></i>

            <input type="password"
                   name="confirm_password"
                   class="form-control"
                   placeholder="Confirm Password"
                   required>

        </div>

        <!-- Button -->

        <button type="submit"
                name="register"
                class="btn-register">

            REGISTER ADMIN

        </button>

    </form>

    <!-- Login Link -->

    <div class="login-link">

        Already Registered ?

        <a href="admin_login.php">

            Login Here

        </a>

    </div>

</div>

</body>
</html>