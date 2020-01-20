<?php
require_once "dbconnection.php";
session_start();

    if(isset($_POST['registration'])){
        $name =$_POST['name'];
        $email =$_POST['email'];
        $username =$_POST['username'];
        $password =$_POST['password'];
        $c_password =$_POST['c_password'];

        $photo = explode('.',$_FILES['photo']['name']);
        $photo = end($photo);

        $photo_name = $username.'.'.$photo;


//Error Message
        $input_error = array();

        if(empty($name)){
            $input_error['name'] = "Name is required";
        }
        if(empty($email)){
            $input_error['email'] = "Email is required";
        }
        if(empty($username)){
            $input_error['username'] = "Username is required";
        }
        if(empty($password)){
            $input_error['password'] = "Password is required";
        }
        if(empty($c_password)){
            $input_error['c_password'] = "Confirm your password ";
        }


//check email, username etc
        if(count($input_error)== 0){
            $check_email = mysqli_query($link, "SELECT * FROM 'users' WHERE  'email' = $email");
            if(mysqli_num_rows($check_email) == 0){
                    $check_username = mysqli_query($link, "SELECT * FROM 'users' WHERE  'username' = $username");
                if(mysqli_num_rows($check_username) == 0){
                    $query = "INSERT INTO `users`( `name`, `email`, `username`, `password`, `photo`) VALUES ('$name', '$email', '$username', '$password', '$photo_name')";
                    $result = mysqli_query($link, $query);
                    if($result){
                        $_SESSION['data-insert-success']= "Data Insert Success";
                        move_uploaded_file($_FILES['photo']['tmp_name'],'images/'.$photo_name);
                        header('location:resgistation.php');
                    }
                    else{
                        $_SESSION['data insert error']= "Data Insert Error";
                    }
                }
                else{
                    $username_error = "This username is already exists";
                }
            }

            else{
               $email_error = "This email is already exists";
            }
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
    <link rel="stylesheet" href="style.css">
    <title>Student Management system</title>

</head>
<body>
<div class="container">
    <br>
    <h1 style="text-align: center">User Registration Form</h1>
    <?php
        if(isset($_SESSION['data-insert-success'])){
            echo '<div class=\"alert alert-success\">'.$_SESSION['data insert success'].'</div>';
        }
    ?>
    <?php
    if(isset($_SESSION['data-insert-error'])) {
        echo '<div class=\"alert alert-warning\">' . $_SESSION['data insert error'] . '</div>';
    }
    ?>

    <br/>
    <div class="row">
        <div class="col-md-6">
            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="form-group">
                    <label for="name" class="control-label col-md-2">Name</label>
                    <div class="col-md-8">
                        <input class="form-control" type="text" name="name" placeholder="Enter your Name" value="<?php if(isset($name)){echo $name;}?>">
                    </div>
                    <label for="" class="error">
                        <?php if (isset($input_error['name'])){echo $input_error['name'];} ?>
                    </label>
                </div>
                <div class="form-group">
                    <label for="email" class="control-label col-md-2">Email</label>
                    <div class="col-md-8">
                        <input class="form-control" type="email" name="email" placeholder="Email" value="<?php if(isset($email)){echo $email;}?>" >
                    </div>
                    <label for="" class="error">
                        <?php if (isset($input_error['email'])){echo $input_error['email'];} ?>
                    </label>
                    <label for="" class="error">
                        <?php if (isset($email_error)){echo $email_error; }?>
                    </label>
                </div>
                <div class="form-group">
                    <label for="username" class="control-label col-md-2">Username</label>
                    <div class="col-md-8">
                        <input class="form-control" type="text" name="username" placeholder="Username" value="<?php if(isset($username)){echo $username;}?>"  >
                    </div>
                    <label for="" class="error">
                        <?php if (isset($input_error['username'])){echo $input_error['username'];} ?>
                    </label>
                    <label for="" class="error">
                        <?php if (isset($username_error)){echo $username_error;} ?>
                    </label>
                </div>
        </div>
        <div class="col-md-6">
                <div class="form-group">
                    <label for="password" class="control-label col-md-2">Password</label>
                    <div class="col-md-8">
                        <input class="form-control" type="password" name="password" placeholder="Password" value="<?php if(isset($password)){echo $password;}?>" >
                    </div>
                    <label for="" class="error">
                        <?php
                        if (isset($input_error['password'])){
                            echo $input_error['password'];
                        }
                        ?>
                    </label>
                </div>
                <div class="form-group">
                    <label for="c_password" class="control-label col-md-4">Confirm Password</label>
                    <div class="col-md-8">
                        <input class="form-control" type="password" name="c_password" placeholder="Confirm Password" value="<?php if(isset($c_password)) {echo $c_password;} ?>" >
                    </div>
                    <label for="" class="error">
                        <?php
                        if (isset($input_error['c_password'])){
                            echo $input_error['c_password'];
                        }
                        ?>
                    </label>
                </div>
                <div class="form-group">
                    <label for="photo" class="control-label col-md-2">Photo</label>
                    <div class="col-md-6">
                        <input  type="file" name="photo">
                    </div>
                </div>
                <div class="col-md-4">
                    <input type="submit" value="Registration" name="registration" class=" btn btn-info "  >
                </div>


            </form>
        </div>
    </div>
    <br>
    <p style="text-align: center";>If you already register !! Then <a href="login.php">click here</a> </p>
    <hr>
    <footer>
        <p style="text-align: center";>@copy <?php echo date('Y');?> All right reserved</p>
    </footer>
</div>

</body>
</html>