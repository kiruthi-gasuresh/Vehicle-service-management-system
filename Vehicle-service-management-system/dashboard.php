```php
<?php
ob_start();
session_start();

// Secure session check
if(!isset($_SESSION['user']) || trim($_SESSION['user']) == ''){
    header("Location: login.php");
    exit();
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>User Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

body{
    background:#f5f5f5;
    font-family:Arial;
    overflow-x:hidden;
}

/* Sidebar */

.sidebar{
    width:250px;
    height:100vh;
    background:#212529;
    position:fixed;
    top:0;
    left:0;
    padding-top:30px;
}

.sidebar h2{
    color:white;
    text-align:center;
    margin-bottom:30px;
}

.sidebar a{
    display:block;
    color:white;
    text-decoration:none;
    padding:15px 25px;
    transition:0.3s;
}

.sidebar a:hover{
    background:#ff9800;
}

/* Main */

.main-content{
    margin-left:250px;
    padding:30px;
    padding-bottom:180px;
}

/* Cards */

.card-box{
    background:white;
    padding:30px;
    border-radius:20px;
    text-align:center;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
    transition:0.3s;
    height:100%;
}

.card-box:hover{
    transform:translateY(-5px);
}

.card-box i{
    font-size:45px;
    color:#ff9800;
    margin-bottom:10px;
}

/* Welcome Box */

.welcome-box{
    background:linear-gradient(135deg,#667eea,#764ba2);
    color:white;
    padding:20px;
    border-radius:15px;
    margin-bottom:20px;
}

/* ROAD DESIGN */

.road-container{
    position:fixed;
    bottom:0;
    left:0;
    width:100%;
    height:140px;
    z-index:999;
    overflow:hidden;
    pointer-events:none;
}

/* Road */

.road{
    position:absolute;
    bottom:0;
    width:100%;
    height:100px;
    background:#2d2d2d;
    border-top:6px solid #555;
}

/* Road Line */

.road::before{
    content:'';
    position:absolute;
    top:45px;
    width:100%;
    height:8px;

    background:repeating-linear-gradient(
        to right,
        white 0px,
        white 50px,
        transparent 50px,
        transparent 100px
    );
}

/* CAR 1 */

.car1{
    position:absolute;
    bottom:20px;
    font-size:65px;
    animation:carLeft 10s linear infinite;
}

/* CAR 2 */


.car2{
    position:absolute;
    bottom:60px;
    font-size:65px;

    /* Flip Car Direction */
    transform:scaleX(-1);

    animation:carRight 12s linear infinite;
}



/* Right to Left */

@keyframes carLeft{

    0%{
        right:-120px;
    }

    100%{
        right:110%;
    }
}

/* Left to Right */

@keyframes carRight{

    0%{
        left:-120px;
    }

    100%{
        left:110%;
    }
}

</style>

</head>

<body>

<!-- Sidebar -->

<div class="sidebar">

<h2>AutoCare</h2>

<a href="dashboard.php">
<i class="bi bi-speedometer2"></i> Dashboard
</a>

<a href="bookservice.php">
<i class="bi bi-tools"></i> Book Service
</a>

<a href="view.php">
<i class="bi bi-calendar-check"></i> My Bookings
</a>

<a href="profile.php">
<i class="bi bi-person-circle"></i> Profile
</a>

<a href="logout.php">
<i class="bi bi-box-arrow-right"></i> Logout
</a>

</div>

<!-- Main Content -->

<div class="main-content">

<div class="welcome-box">
    <h4>
        Welcome 👋
        <b><?php echo htmlspecialchars($user); ?></b>
    </h4>

    <p>Vehicle Service Booking Dashboard</p>
</div>

<div class="row g-4">

    <!-- Book Service -->

    <div class="col-md-4">
        <div class="card-box">

            <i class="bi bi-tools"></i>

            <h4>Book Service</h4>

            <a href="bookservice.php" class="btn btn-warning mt-2">
                Book Now
            </a>

        </div>
    </div>

    <!-- My Bookings -->

    <div class="col-md-4">
        <div class="card-box">

            <i class="bi bi-calendar2-check"></i>

            <h4>My Bookings</h4>

            <a href="view.php" class="btn btn-warning mt-2">
                View
            </a>

        </div>
    </div>

    <!-- Profile -->

    <div class="col-md-4">
        <div class="card-box">

            <i class="bi bi-person-circle"></i>

            <h4>My Profile</h4>

            <a href="profile.php" class="btn btn-warning mt-2">
                Open
            </a>

        </div>
    </div>

    <!-- Logout -->

    <div class="col-md-4">
        <div class="card-box">

            <i class="bi bi-box-arrow-right"></i>

            <h4>Logout</h4>

            <a href="logout.php" class="btn btn-danger mt-2">
                Logout
            </a>

        </div>
    </div>

</div>

</div>

<!-- ROAD + MOVING CARS -->

<div class="road-container">

    Car Right to Left
    <div class="car1">🚗</div>

    <!-- Car right to left -->
    <div class="car2">🚙</div>

    <!-- Road -->
    <div class="road"></div>

</div>

</body>
</html>

<?php ob_end_flush(); ?>
```
