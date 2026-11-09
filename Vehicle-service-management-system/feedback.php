<?php
session_start();
include 'dbconn.php';

/* CHECK LOGIN */
if(!isset($_SESSION['user_id'])){
    echo "<script>alert('Login first'); window.location='login.php';</script>";
    exit();
}

$user_id = $_SESSION['user_id'];

/* GET BOOKING ID */
if(!isset($_GET['booking_id'])){
    echo "Invalid request";
    exit();
}

$booking_id = $_GET['booking_id'];

/* CHECK IF ALREADY GIVEN FEEDBACK */
$check = mysqli_query($conn,"SELECT * FROM feedback WHERE user_id='$user_id' AND booking_id='$booking_id'");
if(mysqli_num_rows($check) > 0){
    echo "<script>alert('Already given feedback'); window.location='track_service.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Feedback</title>

<style>
body{
    font-family:Arial;
    background:linear-gradient(135deg,#e0e7ff,#fce7f3);
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
}

.box{
    background:white;
    padding:30px;
    border-radius:15px;
    width:350px;
    box-shadow:0 10px 25px rgba(0,0,0,0.2);
}

h2{
    text-align:center;
    color:#4f46e5;
}

select,textarea{
    width:100%;
    padding:10px;
    margin-top:10px;
    border-radius:8px;
    border:1px solid #ccc;
}

button{
    width:100%;
    margin-top:15px;
    padding:10px;
    background:#4f46e5;
    color:white;
    border:none;
    border-radius:8px;
    cursor:pointer;
}

button:hover{
    background:#4338ca;
}
</style>

</head>

<body>

<div class="box">

<h2>⭐ Give Feedback</h2>

<form method="POST">

    <label>Rating</label>
    <select name="rating" required>
        <option value="5">⭐⭐⭐⭐⭐</option>
        <option value="4">⭐⭐⭐⭐</option>
        <option value="3">⭐⭐⭐</option>
        <option value="2">⭐⭐</option>
        <option value="1">⭐</option>
    </select>

    <label>Comment</label>
    <textarea name="comment" placeholder="Write your experience..." required></textarea>

    <button type="submit" name="submit">Submit Feedback</button>

</form>

<?php
if(isset($_POST['submit'])){

    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    $sql = "INSERT INTO feedback (user_id, booking_id, rating, comment)
            VALUES ('$user_id','$booking_id','$rating','$comment')";

    if(mysqli_query($conn,$sql)){
        echo "<script>alert('Thank you for feedback'); window.location='track_service.php';</script>";
    } else {
        echo "Error: ".mysqli_error($conn);
    }
}
?>

</div>

</body>
</html>