<h1 class="text-primary"><i class="fa fa-pencil-square"></i> User Profile <small>update user profile</small></h1>
<ol class="breadcrumb">
    <li><a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>

</ol>
<?php

$id = base64_decode($_GET['id']);
$users_data = mysqli_query($link, "SELECT * FROM users WHERE id = '$id'");
$db_row = mysqli_fetch_assoc($users_data);

if(isset($_POST['update-user'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];


    //update studnt info in database
    $query = "UPDATE users SET name='$name', email='$email', username='$username', password='$password' WHERE id='$id'";
    $result = mysqli_query($link, $query);
    if($result){
        header("Location:index.php?page=user-profile");
    }

}


?>


<div class="row">
    <div class="col-md-6">
        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class="form-group">
                <label for="name" class="control-label col-md-2">Name</label>
                <div class="col-md-8">
                    <input class="form-control" type="text" name="name" placeholder="Enter your Name" value="<?php echo $db_row['name'];?>">
                </div>

            </div>
            <div class="form-group">
                <label for="email" class="control-label col-md-2">Email</label>
                <div class="col-md-8">
                    <input class="form-control" type="email" name="email" placeholder="Email" value="<?php echo $db_row['email'];?>" >
                </div>

                <label for="" class="error">
                    <?php if (isset($email_error)){echo $email_error; }?>
                </label>
            </div>
            <div class="form-group">
                <label for="username" class="control-label col-md-2">Username</label>
                <div class="col-md-8">
                    <input class="form-control" type="text" name="username" placeholder="Username" value="<?php echo $db_row['username'];?>"  >
                </div>

            </div>

        <div class="form-group">
            <label for="password" class="control-label col-md-2">Password</label>
            <div class="col-md-8">
                <input class="form-control" type="password" name="password" placeholder="Password" value="<?php echo $db_row['password'];?>" >
            </div>
        </div>

        <div class="col-md-4">
            <input type="submit" value="Update User Info" name="update-user" class=" btn btn-info " >
        </div>
</div>

        </form>
</div>
