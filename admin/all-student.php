<h1 class="text-primary"><i class="fa fa-users"></i> All Student</h1>
<ol class="breadcrumb">
    <li><a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="index.php?page=all-student"><i class="fa fa-users"></i> All student</a></li>

</ol>







<div class="table-responsive">
    <table id="data" class="table table-hover table-bordered table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Roll</th>
            <th>Class</th>
            <th>City</th>
            <th>Contact</th>
            <th>Photo</th>
            <th>Action</th>
        </tr>
        </thead>
        <?php
        $query = "SELECT * FROM student_info";
        $result = mysqli_query($link, $query);

        while ($row = mysqli_fetch_assoc($result)){ ?>

        <tbody>
        <tr>
            <td> <?php echo $row['id']; ?> </td>
            <td><?php echo ucwords($row['name']); ?></td>
            <td><?php echo $row['roll']; ?></td>
            <td><?php echo $row['class']; ?></td>
            <td><?php echo ucwords($row['city']); ?></td>
            <td><?php echo $row['p_contact']; ?></td>
            <td><img style="width: 100px;" src="student_image/<?php echo $row['photo'];?>" alt=""></td>
            <td>
                <a href="index.php?page=update-student&id=<?php echo base64_encode($row['id']); ?>" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i> Edit</a>
                &nbsp;&nbsp;
                <a href="delete_student.php?id=<?php echo base64_encode($row['id']); ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>
            </td>
        </tr>

        <?php
        }
        ?>

        </tbody>
    </table>
</div>