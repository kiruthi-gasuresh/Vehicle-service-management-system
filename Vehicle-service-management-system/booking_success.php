<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Booking Success</title>

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

    display:flex;

    justify-content:center;

    align-items:center;

    background:
    linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)),
    url('https://images.unsplash.com/photo-1503376780353-7e6692767b70?q=80&w=1600&auto=format&fit=crop');

    background-size:cover;

    background-position:center;

}

/* Success Box */

.success-box{

    width:450px;

    background:rgba(255,255,255,0.12);

    backdrop-filter:blur(12px);

    padding:45px;

    border-radius:25px;

    text-align:center;

    color:white;

    box-shadow:0 8px 30px rgba(0,0,0,0.4);

    border:1px solid rgba(255,255,255,0.2);

}

/* Icon */

.success-icon{

    font-size:70px;

    color:#00ff88;

    margin-bottom:20px;

}

/* Heading */

.success-box h1{

    font-size:35px;

    margin-bottom:15px;

    color:#00ff88;

}

/* Paragraph */

.success-box p{

    font-size:18px;

    color:#ddd;

    margin-bottom:30px;

}

/* Button */

.btn-dashboard{

    display:inline-block;

    text-decoration:none;

    background:linear-gradient(45deg,#ff9800,#ff5722);

    color:white;

    padding:14px 28px;

    border-radius:12px;

    font-size:18px;

    font-weight:bold;

    transition:0.3s;

}

.btn-dashboard:hover{

    transform:scale(1.05);

    color:white;

}

/* Responsive */

@media(max-width:500px){

.success-box{

    width:90%;
    padding:30px;

}

.success-box h1{

    font-size:28px;

}

}

</style>

</head>

<body>

<div class="success-box">

    <div class="success-icon">

        <i class="bi bi-check-circle-fill"></i>

    </div>

    <h1>

        Booking Successful

    </h1>

    <p>

        Your vehicle service booking has been confirmed successfully.

    </p>

    <a href="dashboard.php" class="btn-dashboard">

        Go To Dashboard

    </a>

</div>

</body>
</html>