<?php

session_start();
// error_reporting(0);
if (!isset($_SESSION['username'])) {

    header("location:login.php");
} 
elseif ($_SESSION['usertype']=='admin')
 {
    header("location:login.php");
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Home</title>
    <?php include('student_css.php') ?>
</head>
<body>
<?php
include ('student_sidebar.php');
?>

   
</body>
</html>