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
$sql = "select * from admission";

$result = mysqli_query($data, $sql);

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin DASHBOARD</title>

    <?php
    include("admin_css.php");
    ?>

</head>

<body>

    <?php

    include('admin_sidebar.php');


    ?>


    <div class="content">
        <center>
            <h1>Applied for Admission</h1>
            <br>
            <table border="1px solid black">
                <tr>
                    <th style="padding: 20px; font-size: 15px;">Name</th>
                    <th style="padding: 20px; font-size: 15px;">Email</th>
                    <th style="padding: 20px; font-size: 15px;">Phone</th>
                    <th style="padding: 20px; font-size: 15px;">Message </th>
                </tr>

                <?php
                error_reporting(0);
                while ($info = $result->fetch_assoc()) {
                ?>

                    <tr>
                        <td style="padding: 20px ;">
                            <?php echo "{$info['name']}"; ?>
                        </td>
                        <td style="padding:20px ;"> <?php echo "{$info['email']}"; ?></td>
                        <td style="padding:20px ;"> <?php echo "{$info['phone']}"; ?></td>
                        <td style="padding:20px ;"> <?php echo "{$info['message']}"; ?></td>
                    </tr>
                <?php
                }
                ?>

            </table>
        </center>
    </div>
</body>

</html>