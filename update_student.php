<?php

session_start();
// error_reporting(0);
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

$id=$_GET['student_id'];

$sql="Select * from user where id='$id'";

$result=mysqli_query($data,$sql);

$info=$result->fetch_assoc();

if(isset($_POST['update'])){

$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$password=$_POST['password'];

$query="update user set username='$name',email='$email',phone='$phone',password='$password' where id='$id'";

$result2=mysqli_query($data,$query);

if($result2){

    header("location:view_student.php");

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
    <title>Update Student page</title>
    <style>


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

<?php

include("admin_sidebar.php");

?>

<center>

    <div class="content">
        <h1>Update Student</h1>
        <br>
        <div class="div_deg">
        <form action="#" method="POST">
            <div>
                <label>Username</label>
                <input type="name" name="name" value="<?php echo"{$info['username']}";?>">
            </div>
            <div>
                <label>Email</label>
                <input type="email" name="email" value="<?php echo"{$info['email']}";?>">
            </div>
            <div>
                <label>Phone</label>
                <input type="number" name="phone" value="<?php echo"{$info['phone']}";?>">
            </div>
            <div>
                <label>password</label>
                <input type="text" name="password" value="<?php echo"{$info['password']}";?>">
            </div>
            <div>
                <input type="submit" class="btn btn-success" name="update" value="update">
            </div>
        </form>
     </div>

    </div> 
</center>
</body>
</html>