<?php
ob_start();
session_start();
include 'dbconn.php';

if(!isset($_SESSION['user'])){
    header("location:login.php");
    exit();
}

$user = $_SESSION['user'];

$services = [
    "Oil Change" => 500,
    "Engine Check" => 800,
    "Car Wash" => 1000,
    "Battery Check" => 500,
    "Full Service" => 1500
];

/* BOOKING INSERT */
if(isset($_POST['book'])){

    $service = $_POST['service'];
    $vehicle_type = $_POST['vehicle_type'];
    $date = $_POST['date'];
    $slot = $_POST['slot'];
    $payment = $_POST['payment'];
    $upi_app = isset($_POST['upi_app']) ? $_POST['upi_app'] : "";
    $amount = $_POST['amount'];

    if($service == "" || $vehicle_type == "" || $date == "" || $slot == ""){
        $error = "Please fill all fields";
    }else{

        $sql = "INSERT INTO bookings(user, service, vehicle_type, date, slot, payment, amount)
                VALUES('$user','$service','$vehicle_type','$date','$slot','$payment','$amount')";

        if(mysqli_query($conn,$sql)){

            // OPTIONAL: store last booking details
            $_SESSION['last_booking'] = [
                'service' => $service,
                'vehicle' => $vehicle_type,
                'date' => $date,
                'slot' => $slot,
                'payment' => $payment,
                'upi' => $upi_app,
                'amount' => $amount
            ];

            // ✅ REDIRECT TO SUCCESS PAGE
            header("Location: booking_success.php");
            exit();

        }else{
            $error = "Booking Failed";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Book Service</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

<style>
body{
    margin:0;
    font-family:'Inter', sans-serif;
    background: linear-gradient(135deg,#667eea,#764ba2);
    display:flex;
    justify-content:center;
    align-items:center;
    min-height:100vh;
}

.card{
    width:460px;
    background:rgba(255,255,255,0.95);
    padding:28px;
    border-radius:20px;
    box-shadow:0 25px 70px rgba(0,0,0,0.3);
}

.icon{
    font-size:45px;
    text-align:center;
}

h2{
    text-align:center;
    color:#4f46e5;
    margin:10px 0 20px;
}

label{
    font-size:13px;
    font-weight:600;
    color:#374151;
}

input, select{
    width:100%;
    padding:12px;
    margin-top:6px;
    margin-bottom:14px;
    border:1px solid #e5e7eb;
    border-radius:12px;
    background:#f9fafb;
}

.price{
    background: linear-gradient(135deg,#4f46e5,#9333ea);
    color:white;
    padding:14px;
    border-radius:14px;
    text-align:center;
    font-weight:700;
    margin-bottom:15px;
}

.payment-box{
    border:1px solid #e5e7eb;
    border-radius:14px;
    padding:10px;
    background:#f8fafc;
    margin-bottom:10px;
}

.pay-option{
    display:flex;
    align-items:center;
    gap:10px;
    padding:10px;
}

button{
    width:100%;
    padding:14px;
    border:none;
    border-radius:14px;
    background: linear-gradient(135deg,#6366f1,#8b5cf6);
    color:white;
    font-size:15px;
    font-weight:700;
    cursor:pointer;
}
</style>

<script>
const prices = {
    "Oil Change":500,
    "Engine Check":800,
    "Car Wash":300,
    "Battery Check":400,
    "Full Service":1500
};

function updatePrice(){
    let s = document.getElementById("service").value;
    let p = prices[s] || 0;

    document.getElementById("priceText").innerText = "₹ " + p;
    document.getElementById("amount").value = p;
}

function toggleUPI(){
    let payment = document.querySelector('input[name="payment"]:checked').value;
    let upiBox = document.getElementById("upiBox");

    if(payment === "UPI"){
        upiBox.style.display = "block";
    }else{
        upiBox.style.display = "none";
        document.getElementById("upi_app").value = "";
    }
}
</script>

</head>

<body>

<div class="card">

<div class="icon">🏍️</div>

<h2>Book Your Service</h2>

<?php if(isset($error)) echo "<script>alert('$error');</script>"; ?>

<form method="POST">

    <label>Customer Email</label>
    <input type="text" value="<?php echo $user; ?>" readonly>

    <label>Service Type</label>
    <select name="service" id="service" onchange="updatePrice()" required>
        <option value="">Select Service</option>
        <?php
        foreach($services as $k=>$v){
            echo "<option value='$k'>$k</option>";
        }
        ?>
    </select>

    <div class="price">
        Total Price: <span id="priceText">₹ 0</span>
    </div>

    <label>Vehicle Type</label>
    <select name="vehicle_type" required>
        <option value="">Select Type</option>
        <option>Car</option>
        <option>Bike</option>
        <option>Scooter</option>
    </select>

    <label>Service Date</label>
    <input type="date" name="date" required>

    <label>Time Slot</label>
    <select name="slot" required>
        <option>9:00 AM - 11:00 AM</option>
        <option>11:00 AM - 1:00 PM</option>
        <option>2:00 PM - 4:00 PM</option>
        <option>4:00 PM - 6:00 PM</option>
    </select>

    <label>Payment Method</label>

    <div class="payment-box">
        <label class="pay-option">
            <input type="radio" name="payment" value="Cash" checked onclick="toggleUPI()">
            💵 Cash on Service
        </label>

        <label class="pay-option">
            <input type="radio" name="payment" value="UPI" onclick="toggleUPI()">
            📱 UPI Payment
        </label>
    </div>

    <!-- UPI Dropdown -->
    <div id="upiBox" style="display:none;">
        <label>Choose UPI App</label>
        <select name="upi_app" id="upi_app">
            <option value="">Select UPI App</option>
            <option value="GPay">Google Pay (GPay)</option>
            <option value="PhonePe">PhonePe</option>
            <option value="Paytm">Paytm</option>
        </select>
    </div>

    <input type="hidden" name="amount" id="amount">

    <button type="submit" name="book">Confirm Booking</button>

</form>

</div>

</body>
</html>

<?php ob_end_flush(); ?>