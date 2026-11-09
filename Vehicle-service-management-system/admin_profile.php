<?php
session_start();
include 'dbconn.php';

/* SESSION CHECK */
if (!isset($_SESSION['admin']) || empty($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

$admin_email = $_SESSION['admin'];

/* DEFAULT DATA */
$data = [
    'name' => 'Admin',
    'email' => $admin_email
];

/* FETCH FROM DB */
$admin_email_safe = mysqli_real_escape_string($conn, $admin_email);

$sql = "SELECT name, email FROM admin WHERE email='$admin_email_safe' LIMIT 1";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Profile</title>

<style>
body{
    margin:0;
    font-family:'Segoe UI', sans-serif;
    overflow:hidden;
    background: linear-gradient(135deg,#0f172a,#1e1b4b,#312e81);
}

/* BACKGROUND BIKE */
body::before{
    content:"";
    position:fixed;
    width:100%;
    height:100%;
    background:url("https://cdn-icons-png.flaticon.com/512/2972/2972185.png");
    background-repeat:no-repeat;
    background-size:300px;
    background-position:bottom left;
    opacity:0.08;
    animation: moveBike 12s linear infinite;
}

@keyframes moveBike{
    0% { background-position: -200px bottom; }
    100% { background-position: 120% bottom; }
}

/* CARD */
.container{
    width:380px;
    margin:90px auto;
    padding:30px;
    border-radius:20px;
    text-align:center;

    background: rgba(255,255,255,0.08);
    backdrop-filter: blur(15px);
    border:1px solid rgba(255,255,255,0.15);
    box-shadow:0 20px 50px rgba(0,0,0,0.4);
}

/* IMAGE */
img{
    width:110px;
    height:110px;
    border-radius:50%;
    border:3px solid #6366f1;
    margin-bottom:15px;
    background:white;
}

/* TITLE */
h2{
    color:#a78bfa;
    margin-bottom:10px;
}

/* TEXT */
p{
    color:#e5e7eb;
    margin:6px 0;
}

/* BUTTON */
.btn{
    display:inline-block;
    margin-top:18px;
    padding:10px 18px;
    background: linear-gradient(135deg,#6366f1,#8b5cf6);
    color:white;
    text-decoration:none;
    border-radius:10px;
    font-weight:bold;
    transition:0.3s;
}

.btn:hover{
    transform:scale(1.05);
}

b{
    color:#c7d2fe;
}
</style>

</head>

<body>

<div class="container">

    <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png">

    <h2>Admin Profile</h2>

    <p><b>Name:</b> <?php echo htmlspecialchars($data['name']); ?></p>
    <p><b>Email:</b> <?php echo htmlspecialchars($data['email']); ?></p>

    <a href="admin_dashboard.php" class="btn">Go to Dashboard</a>

</div>

</body>
</html>