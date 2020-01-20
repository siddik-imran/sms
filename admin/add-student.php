
<h1 class="text-primary"><i class="fa fa-user-plus"></i> Add Student <small>add new student</small></h1>
<ol class="breadcrumb">
    <li><a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="index.php?page=add-student"><i class="fa fa-user-plus"></i> Add student</a></li>

</ol>


<?php
if(isset($_POST['add-student'])){
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $city = $_POST['city'];
    $pcontact = $_POST['pcontact'];
    $class = $_POST['class'];

    $picture = explode('.',$_FILES['picture']['name']);
    $picture_ex = end($picture);

    $picture_name = $roll.'.'.$picture_ex;

    //value insert in database
    $query = "INSERT INTO student_info (name, roll, class, city, p_contact, photo) VALUES ('$name', '$roll', '$class', '$city', '$pcontact', '$picture_name')";
    $result = mysqli_query($link, $query);
    if($result){
        $success = "Data Insert Successfully";
        move_uploaded_file($_FILES['picture']['tmp_name'],'student_image/'.$picture_name);
    }
    else{
        $error = "Insert Failed";
    }
}


?>


<!-- show message -->
<div class="row">
    <?php
    if(isset($success)){
        echo '<p class="alert alert-success col-md-6">'.$success.'</p>';
    }
    ?>
    <?php
    if(isset($error)){
        echo '<p class="alert alert-danger col-md-6">'.$error.'</p>';
    }
    ?>

</div>



<div class="row">
    <div class="col-md-6">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Student Name</label>
                <input type="text" name="name" placeholder="Student name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="roll">Student Roll</label>
                <input type="text" name="roll" placeholder="Roll" id="roll" class="form-control" pattern="[0-9]{6}" required>
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" name="city" placeholder="city" id="city" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="pcontact">Parent Contact</label>
                <input type="text" name="pcontact" placeholder="01*******" id="pcontact" class="form-control" pattern="01[1|3|4|5|6|7|8|9][0-9]{8}" required>
            </div>
            <div class="form-group">
                <label for="class">Class</label>
                <select name="class" id="class" class="form-control" required>
                    <option value="">Select</option>
                    <option value="1st">1st</option>
                    <option value="2nd">2nd</option>
                    <option value="3rd">3rd</option>
                    <option value="4th">4th</option>
                    <option value="5th">5th</option>
                </select>
            </div>
            <div class="form-group">
                <label for="picture">S_picture</label>
                <input type="file" name="picture" id="picture" required>
            </div>
            <div class="for-group">
                <input type="submit" value="Add Student" name="add-student" class="btn btn-primary pull-right">
            </div>
        </form>
    </div>
</div>