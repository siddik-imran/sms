<?php

require_once "./dbconnection.php";

$id = base64_decode($_GET['id']);

mysqli_query($link, "DELETE FROM student_info WHERE id = '$id'");

header("Location:index.php?page=all-student");


?>