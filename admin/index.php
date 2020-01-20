<?php

session_start();
require_once "./dbconnection.php";
if(!isset($_SESSION['user_login'])){
    header("location:login.php");
}

$session_user = $_SESSION['user_login'];

$user_data = mysqli_query($link, "SELECT * FROM users WHERE username = '$session_user'");
$user_row = mysqli_fetch_assoc($user_data);

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>SMS Dashboard</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">

<!-- javascript -->
    <script type="text/javascript" src="../js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/script.js"></script>
</head>
<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">SMS</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php?page=user-profile"><i class="fa fa-user"></i> Welcome <?= $user_row['username']; ?></a></li>
                <li><a href="resgistation.php"><i class="fa fa-user-plus"></i> Add User</a></li>
                <li><a href="index.php?page=user-profile"><i class="fa fa-user"></i> Profile</a></li>
                <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
                <a href="index.php?page=dashboard" class="list-group-item active"> <i class="fa fa-dashboard"></i> Dashboard</a>
                <a href="index.php?page=add-student" class="list-group-item"> <i class="fa fa-user-plus"></i> Add Student</a>
                <a href="index.php?page=all-student" class="list-group-item"> <i class="fa fa-user"></i> All Students</a>
                <a href="index.php?page=all-users" class="list-group-item"> <i class="fa fa-user"></i> All Users</a>
            </div>
        </div>
        <div class="col-md-9">
                <div class="content" style="min-height: 600px;">

                 <?php

                 if(isset($_GET['page'])){
                     $page = $_GET['page'].'.php';
                 }
                 else{
                     $page = "dashboard.php";
                 }


                 if(file_exists($page)){
                     require_once $page;
                     }
                 else{
                     echo "File Not Found";
                 }

                 ?>

                </div>
        </div>
    </div>
</div>


<footer class="footer-area">
    <p style="background: deepskyblue; text-align: center; padding: 20px 0; font-size: 15px; color: white;"> copyright &copy 2019; Student Management System.All right Reserved</p>
</footer>


</body>
</html>