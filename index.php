
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>StudentManagementSystem</title>
</head>
<body>
<div class="container">
    <br />
    <a class="btn btn-primary pull-right" style="float: right";  href="admin/login.php">Login</a>
    <br />
    <br />
    <h1 class="text-center">Welcome to Student Management System</h1>


    <div class="row">
        <div class="col-md-5 offset-3">
            <form action="" method="post">
                <table class="table table-bordered">
                    <tr>
                        <td colspan="2" class="text-center"><label for="student information">Student Information</label></td>
                        <br />
                    </tr>
                    <tr>
                        <td><label for="choose">Choose Class</label></td>
                        <td>
                            <select class="form-control" name="choose" id="choose">
                                <option value="">Select</option>
                                <option value="1st">1st</option>
                                <option value="2nd">2nd</option>
                                <option value="3rd">3rd</option>
                                <option value="4th">4th</option>
                                <option value="5th">5th</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td><label for="roll">Roll</label></td>
                        <td><input class="form-control" type="text" name="roll" pattern="[0-9]{6}" placeholder="Roll"></td>
                    </tr>

                    <tr>
                        <td colspan="2" class="text-center"><input class="form-control btn-dark" type="submit" value="Show Info" name="show_info"></td>
                    </tr>


                </table>
            </form>
        </div>
    </div>

    <?php
    require_once "./admin/dbconnection.php";
    if(isset($_POST['show_info'])){

        $choose = $_POST['choose'];
        $roll = $_POST['roll'];

        $result = mysqli_query($link, "SELECT * FROM student_info WHERE class = '$choose' and roll='$roll'");

        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_assoc($result);

            ?>

            <div class="row">
                <div class="col-md-8 offset-2">
                    <table class="table table-bordered">
                        <tr>
                            <td rowspan="5">
                                <img src="admin/images/<?php echo $row['photo']; ?>" width="200px"; alt="">
                            </td>
                            <td >Name</td>
                            <td ><?= ucwords($row['name']); ?></td>

                        </tr>
                        <tr>

                            <td >Roll</td>
                            <td ><?= $row['roll']; ?></td>

                        </tr>
                        <tr>

                            <td >Class</td>
                            <td ><?= $row['class']; ?></td>

                        </tr>
                        <tr>

                            <td >City</td>
                            <td ><?= ucwords($row['city']); ?></td>

                        </tr>

                        <tr>

                            <td >Parent Contact</td>
                            <td ><?= $row['p_contact']; ?></td>
                        </tr>
                    </table>
                </div>
            </div>

            <?php
        }
        else{
?>
            <script type="text/javascript">
                alert('Data Not Found');
            </script>
    <?php
        }
    }
    ?>




</div>














<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>