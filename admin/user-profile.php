<h1 class="text-primary"><i class="fa fa-user"></i> User Profile <small>My Profile</small></h1>
<ol class="breadcrumb">
    <li><a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href=""><i class="fa fa-user"></i> Profile</a></li>
</ol>

<?php

$session_user = $_SESSION['user_login'];

$user_data = mysqli_query($link, "SELECT * FROM users WHERE username = '$session_user'");
$user_row = mysqli_fetch_assoc($user_data);

?>




<div class="row">
    <div class="col-md-6">
        <table class="table table-bordered">
            <tr>
                <td>User ID</td>
                <td><?= $user_row['id']; ?></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><?= ucwords($user_row['name']); ?></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><?= $user_row['username']; ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?= $user_row['email']; ?></td>
            </tr>
            <tr>
                <td>Status</td>
                <td><?= ucwords($user_row['status']); ?></td>
            </tr>
            <tr>
                <td>SignUp DateTime</td>
                <td><?= $user_row['datetime']; ?></td>
            </tr>
        </table>
        <a href="index.php?page=edit-user-profile&id=<?php echo base64_encode($user_row['id']);?>" class="btn btn-info pull-right btn-sm">Edit Profile</a>
    </div>


<div class="col-md-6">
        <a href="">
            <img src="images/<?= $user_row['photo']; ?>" alt="" class="img-thumbnail" width="350px">
        </a>
    <br>

    <?php
        if(isset($_POST['upload'])){
            $photo = explode('.',$_FILES['photo']['name']);
            $photo = end($photo);

            $photo_name = $session_user.'.'.$photo;

            $upload = mysqli_query($link, "UPDATE users SET photo='$photo_name' WHERE username='$session_user'");

            if($upload){
                move_uploaded_file($_FILES['photo']['tmp_name'],'images/'.$photo_name);
               // header('Location:index.php?page=user-profile');
            }
        }


    ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <label for="photo">Profile Picture</label>
        <input type="file" name="photo" id="photo">
        <br>
        <input type="submit" name="upload" value="Upload" class="btn btn-info btn-sm ">
    </form>
</div>

</div>