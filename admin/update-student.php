
<h1 class="text-primary"><i class="fa fa-pencil-square"></i> Update Student <small>update student info</small></h1>
<ol class="breadcrumb">
    <li><a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="index.php?page=all-student"><i class="fa fa-user"></i> All student</a></li>
    <li><a href="index.php?page=add-student"><i class="fa fa-pencil"></i> Update student</a></li>

</ol>


<?php

$id = base64_decode($_GET['id']);
$student_data = mysqli_query($link, "SELECT * FROM student_info WHERE id = '$id'");
$db_row = mysqli_fetch_assoc($student_data);


if(isset($_POST['update-student'])){
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $city = $_POST['city'];
    $pcontact = $_POST['pcontact'];
    $class = $_POST['class'];


    //update studnt info in database
    $query = "UPDATE student_info SET name='$name', roll='$roll', class='$class', city='$city', p_contact='$pcontact' WHERE id=$id";
    $result = mysqli_query($link, $query);
    if($result){
        header("Location:index.php?page=all-student");
    }

}





?>


    <div class="row">
    <div class="col-md-6">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Student Name</label>
                <input type="text" name="name" placeholder="Student name" id="name" class="form-control" value="<?php echo $db_row['name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="roll">Student Roll</label>
                <input type="text" name="roll" placeholder="Roll" id="roll" class="form-control" pattern="[0-9]{6}" value="<?= $db_row['roll']; ?>" required>
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" name="city" placeholder="city" id="city" class="form-control" value="<?= $db_row['city']; ?>" required>
            </div>
            <div class="form-group">
                <label for="pcontact">Parent Contact</label>
                <input type="text" name="pcontact" placeholder="01*******" id="pcontact" class="form-control" pattern="01[1|3|4|5|6|7|8|9][0-9]{8}" value="<?= $db_row['p_contact']; ?>" required>
            </div>
            <div class="form-group">
                <label for="class">Class</label>
                <select name="class" id="class" class="form-control" required>
                    <option value="">Select</option>
                    <option <?php echo $db_row['class']=='1st' ? 'selected':''; ?> value="1st">1st</option>
                    <option <?php echo $db_row['class']=='2nd' ? 'selected':''; ?> value="2nd">2nd</option>
                    <option <?php echo $db_row['class']=='3rd' ? 'selected':''; ?> value="3rd">3rd</option>
                    <option <?php echo $db_row['class']=='4th' ? 'selected':''; ?> value="4th">4th</option>
                    <option <?php echo $db_row['class']=='5th' ? 'selected':''; ?> value="5th">5th</option>
                </select>
            </div>

            <div class="for-group">
                <input type="submit" value="Update Student Info" name="update-student" class="btn btn-primary pull-right">
            </div>
        </form>
    </div>
</div>