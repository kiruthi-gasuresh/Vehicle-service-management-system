<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Vehicle Service Booking</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

html{
    scroll-behavior:smooth;
}

body{
    font-family:Arial;
}

/* Navbar */

.navbar{
    background:rgba(0,0,0,0.7);
}

.nav-link{
    color:white !important;
    margin-left:15px;
    font-weight:bold;
}

.nav-link:hover{
    color:yellow !important;
}

/* Hero Section */

.hero{
    height:100vh;
    position:relative;
    overflow:hidden;
}

.slide{
    position:absolute;
    width:100%;
    height:100%;
    background-size:cover;
    background-position:center;
    opacity:0;
    animation:slide 16s infinite;
}

.slide::before{
    content:'';
    position:absolute;
    width:100%;
    height:100%;
    background:rgba(0,0,0,0.5);
}

.s1{
    background-image:url('https://images.unsplash.com/photo-1487754180451-c456f719a1fc?q=80&w=1600&auto=format&fit=crop');
    animation-delay:0s;
}

.s2{
    background-image:url('https://images.unsplash.com/photo-1503376780353-7e6692767b70?q=80&w=1600&auto=format&fit=crop');
    animation-delay:4s;
}

.s3{
    background-image:url('https://images.unsplash.com/photo-1511919884226-fd3cad34687c?q=80&w=1600&auto=format&fit=crop');
    animation-delay:8s;
}

.s4{
    background-image:url('https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?q=80&w=1600&auto=format&fit=crop');
    animation-delay:12s;
}

@keyframes slide{

    0%{opacity:0;}
    10%{opacity:1;}
    25%{opacity:1;}
    35%{opacity:0;}
    100%{opacity:0;}

}

/* Hero Text */

.content{
    position:relative;
    z-index:1;
    height:100%;
    display:flex;
    justify-content:center;
    align-items:center;
    flex-direction:column;
    color:white;
    text-align:center;
}

.content h1{
    font-size:60px;
    font-weight:bold;
}

.content p{
    font-size:22px;
}

.btn-book{
    margin-top:20px;
}

/* Cards */

.card img{
    height:220px;
    object-fit:cover;
}

.card{
    transition:0.3s;
}

.card:hover{
    transform:translateY(-10px);
}

/* About */

.about-img{
    width:100%;
    border-radius:10px;
}

/* Footer */

footer{
    background:#212529;
    color:white;
    padding:30px 0;
}

</style>

</head>

<body>

<!-- Navbar -->

<nav class="navbar navbar-expand-lg navbar-dark fixed-top">

<div class="container">

<a class="navbar-brand fw-bold" href="#">
    PrimeAutoCare
</a>

<button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
    <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="menu">

<ul class="navbar-nav ms-auto">

<li class="nav-item">
    <a class="nav-link" href="index.php">Home</a>
</li>

<li class="nav-item">
    <a class="nav-link" href="login.php">Login</a>
</li>

<li class="nav-item">
    <a class="nav-link" href="register.php">Register</a>
</li>

<li class="nav-item">
    <a class="nav-link" href="#about">About</a>
</li>

</ul>

</div>

</div>

</nav>

<!-- Hero Section -->

<section class="hero">

<div class="slide s1"></div>
<div class="slide s2"></div>
<div class="slide s3"></div>
<div class="slide s4"></div>

<div class="content">

<h1>Vehicle Service Booking</h1>

<p>Professional Vehicle Service At Your Doorstep</p>

<a href="register.php" class="btn btn-warning btn-lg btn-book">
    Book Service
</a>

</div>

</section>

<!-- Services -->

<section class="py-5">

<div class="container">

<h2 class="text-center fw-bold mb-5">
    Our Services
</h2>

<div class="row g-4">

<div class="col-md-3">

<div class="card shadow">

<img src="https://images.unsplash.com/photo-1486262715619-67b85e0b08d3?q=80&w=600&auto=format&fit=crop">

<div class="card-body text-center">

<h5>Oil Change</h5>

<p>Professional oil replacement service.</p>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card shadow">

<img src="https://images.unsplash.com/photo-1558981806-ec527fa84c39?q=80&w=600&auto=format&fit=crop">

<div class="card-body text-center">

<h5>Bike Service</h5>

<p>Complete bike maintenance service.</p>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card shadow">

<img src="https://images.unsplash.com/photo-1607860108855-64acf2078ed9?q=80&w=600&auto=format&fit=crop">

<div class="card-body text-center">

<h5>Car Wash</h5>

<p>Premium cleaning service.</p>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card shadow">

<img src="https://images.unsplash.com/photo-1517524008697-84bbe3c3fd98?q=80&w=600&auto=format&fit=crop">

<div class="card-body text-center">

<h5>Engine Check</h5>

<p>Advanced engine checking service.</p>

</div>

</div>

</div>

</div>

</div>

</section>

<!-- About Section -->

<section id="about" class="py-5 bg-light">

<div class="container">

<h2 class="text-center fw-bold mb-5">
    About Us
</h2>

<div class="row align-items-center">

<div class="col-md-6">

<img src="https://images.unsplash.com/photo-1493238792000-8113da705763?q=80&w=1200&auto=format&fit=crop"
class="about-img shadow">

</div>

<div class="col-md-6">

<h3 class="fw-bold mb-3">
    Best Vehicle Service Center
</h3>

<p>
We provide professional car and bike services with expert mechanics.
Our services include oil changing, engine checking, car wash and full vehicle maintenance.
</p>

<p>
Customer satisfaction is our first priority with affordable pricing and quality support.
</p>

<a href="register.php" class="btn btn-warning">
    Book Now
</a>

</div>

</div>

</div>

</section>

<!-- Reviews -->

<section class="bg-white py-5">

<div class="container">

<h2 class="text-center fw-bold mb-5">
    Customer Reviews
</h2>

<div class="row g-4">

<div class="col-md-4">

<div class="p-4 bg-light shadow rounded">

<h5>⭐⭐⭐⭐⭐</h5>

<p>Excellent service and smooth booking.</p>

<b>- Kiruthi</b>

</div>

</div>

<div class="col-md-4">

<div class="p-4 bg-light shadow rounded">

<h5>⭐⭐⭐⭐⭐</h5>

<p>Affordable and professional mechanics.</p>

<b>- Rithi</b>

</div>

</div>

<div class="col-md-4">

<div class="p-4 bg-light shadow rounded">

<h5>⭐⭐⭐⭐⭐</h5>

<p>Best vehicle service website experience.</p>

<b>- Manju Suba</b>

</div>

</div>

</div>

</div>

</section>

<!-- Footer -->

<footer>

<div class="container text-center">

<h5>Contact Info</h5>

<p>Email : primeautocare@gmail.com</p>

<p>Phone : +91 8870873619</p>

<p>Location : Coimbatore</p>C:\xampp\htdocs\primeautocare\index.php

</div>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>