<h1 class="text-primary"><i class="fa fa-users"></i> All Users</h1>
<ol class="breadcrumb">
    <li><a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="index.php?page=all-student"><i class="fa fa-users"></i> All users</a></li>

</ol>







<div class="table-responsive">
    <table id="data" class="table table-hover table-bordered table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>User name</th>
            <th>Photo</th>
        </tr>
        </thead>
        <?php
        $query = "SELECT * FROM users";
        $result = mysqli_query($link, $query);

        while ($row = mysqli_fetch_assoc($result)){ ?>

        <tbody>
        <tr>

            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><img style="width: 100px;" src="images/<?php echo $row['photo'];?>" alt=""></td>
        </tr>

        <?php
        }
        ?>

        </tbody>
    </table>
</div>