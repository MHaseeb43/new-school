<?php

session_start();
// error_reporting(0);
if (!isset($_SESSION['username'])) {
    header("location:login.php");
} elseif ($_SESSION['usertype'] == 'student') {

    header("location:login.php");
}


$server = "localhost";
$user = "root";
$password = "";
$db = "studentproject";

$data = mysqli_connect($server, $user, $password, $db);

if (isset($_POST['add_student'])) {

    $username = $_POST['name'];
    $user_email = $_POST['email'];
    $user_phone = $_POST['phone'];
    $user_password = $_POST['password'];
    $usertype = "student";

    $check = "select * from user where username='$username'";
    $check_user = mysqli_query($data, $check);

    $row_count = mysqli_num_rows($check_user);

    if ($row_count==1) {
        echo "<script type='text/javascript'>
        alert ('Username Already exist. Try Another one');
        </script>";
        
    } else {
        $sql = "insert into user (username,email,phone,usertype,password) VALUES('$username','$user_email','$user_phone','$usertype','$user_password')";

        $result = mysqli_query($data, $sql);
        if ($result) {
            echo "<script type='text/javascript'>
        alert ('Data upload Successfull');
        </script>";
        } else {
            echo "Upload Failed";
        }
    }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <?php
    include("admin_css.php");
    ?>
    <title>Add Students</title>

    <style type="text/css">
        label {
            display: inline-block;
            text-align: right;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .div_deg {

            background-color: skyblue;
            width: 400px;
            padding-top: 50px;
            padding-bottom: 50px;



        }
    </style>
</head>

<body>
    <!-- <div class="logout">
        <a href="logout.php" class="btn btn-warning">Logout</a>
    </div> -->
    <?php

    include("admin_sidebar.php");

    ?>


    <div class="content">
        <center>

            <h1>Add Students</h1>

            <div class="div_deg">
                <form action="#" method="POST">
                    <div>
                        <label>Username</label>
                        <input type="text" name="name">
                    </div>
                    <div>
                        <label>Email</label>
                        <input type="email" name="email">
                    </div>
                    <div>
                        <label>Phone</label>
                        <input type="number" name="phone">
                    </div>
                    <div>
                        <label>Password</label>
                        <input type="text" name="password">
                    </div>
                    <div>

                        <input type="submit" class="btn btn-primary" name="add_student" value="Add Student">
                    </div>
                </form>
            </div>
        </center>
    </div>
</body>

</html>