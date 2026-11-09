```php id="u3m7qn"
<?php

session_start();

include 'dbconn.php';

/* CHECK ID */

if(!isset($_GET['id'])){

    header("Location: view.php");

    exit();
}

/* SAFE ID */

$id = intval($_GET['id']);

/* CANCEL BOOKING + REFUND PENDING */

$sql = "UPDATE bookings 
        SET 
        status='Cancelled',
        payment_status='Refund Pending',
        refund_status='Pending'
        WHERE id=$id";

$update = mysqli_query($conn, $sql);

/* SUCCESS */

if($update){

    header("Location: view.php?cancel=success");

    exit();
}

/* ERROR */

else{

    echo "Cancellation Failed";

}

?>
```


<!DOCTYPE html>
<html>
<head>
<title>Cancel Booking</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

<style>
body{
    margin:0;
    font-family:'Inter', sans-serif;
    background: linear-gradient(135deg,#ff4e50,#f9d423,#fc466b);
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
}

/* CARD */
.card{
    background:rgba(255,255,255,0.95);
    padding:35px;
    border-radius:20px;
    text-align:center;
    width:400px;
    box-shadow:0 25px 60px rgba(0,0,0,0.3);
    animation: pop 0.4s ease-in-out;
}

@keyframes pop{
    from{transform:scale(0.8); opacity:0;}
    to{transform:scale(1); opacity:1;}
}

h2{
    color:#ef4444;
    margin-bottom:10px;
}

p{
    color:#374151;
    font-size:15px;
    margin-bottom:20px;
}

/* BUTTON */
.btn{
    display:inline-block;
    padding:12px 18px;
    background: linear-gradient(135deg,#6366f1,#8b5cf6);
    color:white;
    text-decoration:none;
    border-radius:12px;
    font-weight:600;
    transition:0.3s;
}

.btn:hover{
    transform:scale(1.05);
}

/* ICON */
.icon{
    font-size:60px;
    margin-bottom:10px;
}
</style>

</head>

<body>

<div class="card">

<?php if($update){ ?>

    <div class="icon">❌</div>
    <h2>Booking Cancelled</h2>

    <p>
        Your booking has been cancelled successfully.<br>
        <b>Status:</b> Refund Pending
    </p>

<?php } else { ?>

    <div class="icon">⚠️</div>
    <h2>Something Went Wrong</h2>

    <p>Unable to cancel booking. Please try again.</p>

<?php } ?>

<a href="view.php" class="btn">⬅ Back to Bookings</a>

</div>

</body>
</html>