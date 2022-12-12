<?php

session_start();
error_reporting(0);
if(!isset($_SESSION['username'])){

    header("location:login.php");
}
elseif($_SESSION['usertype']=='student'){

    header("location:login.php");

}

$server="localhost";
$user="root";
$password="";
$db="studentproject";

$data=mysqli_connect($server,$user,$password,$db);

$sql="select * from user where usertype='student'";

$result=mysqli_query($data,$sql);



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php
include ("admin_css.php");
?>
    <title>View_Student</title>
</head>
<body>

<?php

include("admin_sidebar.php");

?>


<center>
  <div class="content">
      <h1>Student Data</h1>

<?php

if($_SESSION['message']){
    echo $_SESSION['message'];
}
unset($_SESSION['message']);

?>





      <br>
      <table border="1px solid black">
                <tr>
                    <th style="padding: 20px; font-size: 15px;">UserName</th>
                    <th style="padding: 20px; font-size: 15px;">Email</th>
                    <th style="padding: 20px; font-size: 15px;">Phone</th>
                    <th style="padding: 20px; font-size: 15px;">password </th>
                    <th style="padding: 20px; font-size: 15px;">Update </th>
                    <th style="padding: 20px; font-size: 15px;">Delete </th>
                </tr>

                <?php
                error_reporting(0);
                while ($info = $result->fetch_assoc()) {
                ?>

                    <tr>
                        <td style="padding: 20px; background-color:skyblue ;">
                            <?php echo "{$info['username']}"; ?>
                        </td>
                        <td style="padding:20px; background-color:skyblue ;"> <?php echo "{$info['email']}"; ?></td>
                        <td style="padding:20px; background-color:skyblue ;"> <?php echo "{$info['phone']}"; ?></td>
                        <td style="padding:20px; background-color:skyblue ;"> <?php echo "{$info['password']}"; ?></td>
                        <td style="padding:20px; background-color:skyblue ;"> <?php echo "<a class='btn btn-success' href='update_student.php?student_id={$info['id']}'>Update</a>"; ?></td>
                        <td style="padding:20px; background-color:skyblue ;"> <?php echo "<a class='btn btn-danger' onClick=\" javascript: return confirm('Are you Sure to delete this?');\" href='delete.php?student_id={$info['id']}'>Delete</a>"; ?></td>
                    </tr>
                <?php
            }
                ?>

            </table>
        </center>

  </div> 
</body>
</html>