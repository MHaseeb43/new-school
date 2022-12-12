<?php

session_start();
error_reporting(0);
if(!isset($_SESSION['username'])){

    header("location:login.php");
}
elseif($_SESSION['usertype']=='student'){

    header("location:login.php");

}
$server = "localhost";
$user = "root";
$password = "";
$db = "studentproject";

$data = mysqli_connect($server, $user, $password, $db);

$sql="select * from teacher";
$result=mysqli_query($data,$sql);

if($_GET['teacher_id']){

    $t_id=$_GET['teacher_id'];
    $sql2="DELETE from teacher where id='$t_id'";

    $result2=mysqli_query($data,$sql2);

    if($result2){
        header('location:admin_view_teacher.php');
    }
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php
include ("admin_css.php");
?>
    <title>View Teacher</title>
    <style>

.table_td{
    padding: 20px;
    background-color: skyblue;
}

    </style>

</head>
<body>

<?php

include("admin_sidebar.php");

?>


<center>
            <h2>View All Teacher Data</h2>
            <br>
            <table border="1px solid black">
                <tr>
                    <th style="padding: 20px; font-size: 15px;">Teacher Name</th>
                    <th style="padding: 20px; font-size: 15px;">Description</th>
                    <th style="padding: 20px; font-size: 15px;">Image</th>
                    <th style="padding: 20px; font-size: 15px;">Edit</th>
                    <th style="padding: 20px; font-size: 15px;">Delete</th>
                    
                </tr>

                <?php
                error_reporting(0);
                while ($info = $result->fetch_assoc()) {
                ?>

                    <tr>
                        <td style="padding: 20px ;">
                            <?php echo "{$info['name']}"; ?>
                        </td>
                        <td style="padding:20px ; background-color:skyblue;"> <?php echo "{$info['description']}"; ?></td>
                        <td style="padding:20px ; background-color:skyblue;"><img height="100px" width="150px" src=" <?php echo "{$info['image']}"; ?>"></td>
                        <td class="table_td">

                        <?php
                        echo "
                            <a onClick=\"javascript:return confirm('Are you Sure to Update this?')\" class='btn btn-primary' href='admin_update_teacher.php?teacher_id={$info['id']}'>
                            
                            Edit</a>";
                            ?>
                        </td>
                        <td class="table_td">

                        <?php
                        echo "
                            <a onClick=\"javascript:return confirm('Are you Sure to Delete this?')\" class='btn btn-danger' href='admin_view_teacher.php?teacher_id={$info['id']}'>
                            
                            Delete</a>";
                            ?>
                        </td>
                       
                    </tr>
                <?php
                }
                ?>

            </table>
        </center>



  </div> 
</body>
</html>