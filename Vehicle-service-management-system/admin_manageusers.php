<?php

session_start();

if(!isset($_SESSION['admin'])){

    header("location:admin_login.php");

    exit();

}

include 'admin_dbconn.php';

// ================= FETCH USERS =================

$sql = "SELECT * FROM user ORDER BY id DESC";

$result = mysqli_query($admin_conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>Manage Users</title>

<!-- Bootstrap CSS -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet">

<!-- Bootstrap Icons -->

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<!-- Google Font -->

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
      rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{

    min-height:100vh;

    background:
    linear-gradient(rgba(2,6,23,0.95),
    rgba(15,23,42,0.95)),
    url('https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?q=80&w=1600');

    background-size:cover;

    background-position:center;

    color:white;
}

/* ================= SIDEBAR ================= */

.sidebar{

    width:260px;

    height:100vh;

    position:fixed;

    top:0;
    left:0;

    background:#111827;

    padding:30px 20px;

    box-shadow:5px 0 20px rgba(0,0,0,0.4);
}

.logo{

    text-align:center;

    margin-bottom:40px;
}

.logo i{

    font-size:60px;

    color:#38bdf8;
}

.logo h2{

    margin-top:10px;

    font-size:30px;

    font-weight:bold;

    color:white;
}

/* ================= MENU ================= */

.menu a{

    display:block;

    text-decoration:none;

    color:#cbd5e1;

    padding:14px 18px;

    margin-bottom:15px;

    border-radius:12px;

    transition:0.3s;
}

.menu a:hover{

    background:#38bdf8;

    color:white;

    transform:translateX(5px);
}

.menu i{

    margin-right:10px;
}

/* ================= MAIN CONTENT ================= */

.main-content{

    margin-left:260px;

    padding:40px;
}

/* ================= TITLE ================= */

.page-title{

    margin-bottom:30px;
}

.page-title h1{

    font-size:40px;

    font-weight:bold;

    color:white;
}

/* ================= TABLE BOX ================= */

.table-box{

    background:rgba(255,255,255,0.08);

    backdrop-filter:blur(15px);

    padding:25px;

    border-radius:25px;

    box-shadow:0 10px 30px rgba(0,0,0,0.5);

    overflow-x:auto;
}

/* ================= TABLE ================= */

.table{

    margin-bottom:0;

    color:white;
}

/* ================= TABLE HEADER ================= */

.table thead tr{

    background:#38bdf8;
}

.table thead th{

    color:white !important;

    font-size:17px;

    font-weight:700;

    text-align:center;

    padding:18px;

    border:none;

    background:#38bdf8 !important;
}

/* ================= TABLE DATA ================= */

.table td{

    padding:16px;

    text-align:center;

    vertical-align:middle;

    background:rgba(255,255,255,0.10);

    color:#ffffff;

    font-weight:500;

    border-bottom:1px solid rgba(255,255,255,0.08);
}

/* ================= HOVER EFFECT ================= */

.table tbody tr:hover td{

    background:rgba(56,189,248,0.25);

    transition:0.3s;
}

/* ================= DELETE BUTTON ================= */

.btn-delete{

    background:#ef4444;

    color:white;

    padding:10px 16px;

    border-radius:10px;

    text-decoration:none;

    font-weight:600;

    transition:0.3s;
}

.btn-delete:hover{

    background:#dc2626;

    color:white;

    transform:scale(1.05);
}

/* ================= RESPONSIVE ================= */

@media(max-width:900px){

.sidebar{

    width:100%;

    height:auto;

    position:relative;
}

.main-content{

    margin-left:0;

    padding:20px;
}

.page-title h1{

    font-size:28px;
}

}

</style>

</head>

<body>

<!-- ================= SIDEBAR ================= -->

<div class="sidebar">

    <div class="logo">

        <i class="bi bi-speedometer2"></i>

        <h2>ADMIN</h2>

    </div>

    <div class="menu">

        <a href="admin_dashboard.php">

            <i class="bi bi-house-fill"></i>

            Dashboard

        </a>

        <a href="admin_manageusers.php">

            <i class="bi bi-people-fill"></i>

            Manage Users

        </a>

        <a href="admin_view_bookings.php">
    <i class="bi bi-journal-check"></i> Manage Bookings
</a>

        </a>

        <a href="admin_logout.php">

            <i class="bi bi-box-arrow-right"></i>

            Logout

        </a>

    </div>

</div>

<!-- ================= MAIN CONTENT ================= -->

<div class="main-content">

    <!-- TITLE -->

    <div class="page-title">

        <h1>

            <i class="bi bi-people-fill"></i>

            Manage Users

        </h1>

    </div>

    <!-- TABLE -->

    <div class="table-box">

        <table class="table table-borderless align-middle">

            <!-- TABLE HEADINGS -->

            <thead>

                <tr>

                    <th>ID</th>

                    <th>Name</th>

                    <th>Email</th>

                    <th>Phone</th>

                    <th>Address</th>

                    <th>Action</th>

                </tr>

            </thead>

            <!-- TABLE BODY -->

            <tbody>

            <?php

            if(mysqli_num_rows($result) > 0){

                while($row = mysqli_fetch_assoc($result)){

            ?>

                <tr>

                    <td>

                        <?php echo $row['id']; ?>

                    </td>

                    <td>

                        <?php echo $row['name']; ?>

                    </td>

                    <td>

                        <?php echo $row['email']; ?>

                    </td>

                    <td>

                        <?php echo $row['phone']; ?>

                    </td>

                    <td>

                        <?php echo $row['address']; ?>

                    </td>

                    <td>

                        <a href="delete_user.php?id=<?php echo $row['id']; ?>"
                           class="btn-delete">

                            <i class="bi bi-trash-fill"></i>

                            Delete

                        </a>

                    </td>

                </tr>

            <?php

                }

            }else{

            ?>

                <tr>

                    <td colspan="6"
                        class="text-center text-white fs-4">

                        No Users Found

                    </td>

                </tr>

            <?php

            }

            ?>

            </tbody>

        </table>
        <div class="text-center mt-4 mb-3">
    <a href="admin_dashboard.php" class="btn btn-primary">
        <i class="bi bi-speedometer2"></i> Go to Dashboard
    </a>
</div>


    </div>

</div>

</body>
</html>