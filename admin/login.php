<?php
require_once "dbconnection.php";

session_start();

if(isset($_SESSION['user_login'])){
    header("location:index.php");
}

if(isset($_POST['login'])){

    $username =$_POST['username'];
    $password =$_POST['password'];

    $check_username = mysqli_query($link, "SELECT * FROM users WHERE username = '$username'");
    if(mysqli_num_rows($check_username) > 0){
        $row = mysqli_fetch_assoc($check_username);
        if($row['password']== md5($password)){
            if($row['status']== 'active'){
                $_SESSION['user_login']= $username;
                header("location:index.php");
            }else{
                $status =" your status inactive";
            }
        }else{
            $mes ="incorrect password!";
        }

    }else{
       $message ="username not register!";
    }
}

?>




<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="StudentManagementSystem/css/animated.css">
    <title>Student Management system</title>
</head>
<body>
<div class="container animated shake" >
    <h1 class="text-center">Student Management System</h1>
    <br />
        <div class="row">
            <div class="col-md-4 offset-4">
                <h2 class="text-center" >Admin Login</h2>
                <br>
                <form action="" method="post">
                    <div>
                        <input type="text" placeholder="Username" name="username" value="<?php if(isset($username)){echo $username;}?>" required class="form-control">
                    </div>
                    <br>
                    <div>
                        <input type="password" placeholder="password" name="password" value="<?php if(isset($password)){echo $password;}?>" required class="form-control">
                    </div>
                    <br/>
                    <div>
                        <a href="../index.php">Back</a>
                        <input type="submit" value="Login" name="login" class="btn btn-info pull-right" style="float: right"; >
                    </div>
                </form>
            </div>
        </div>

    <br/>

    <?Php if(isset($message)){
        echo '<div class="alert alert-danger col-sm-4 col-sm-offset-4">'.$message.'</div>';
    }
    ?>
    <?Php if(isset($mes)){
        echo '<div class="alert alert-danger col-sm-4 col-sm-offset-4">'.$mes.'</div>';
    }
    ?>
    <?Php if(isset($status)){
        echo '<div class="alert alert-danger col-sm-4 col-sm-offset-4">'.$status.'</div>';
    }
    ?>

</div>



</body>
</html>