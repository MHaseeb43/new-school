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


$server="localhost";
$user="root";
$password="";

$db="studentproject";

$data=mysqli_connect($server,$user,$password,$db);

$name= $_SESSION['username'];
$sql="Select * from user where username='$name' ";
$result=mysqli_query($data,$sql);

$info=mysqli_fetch_assoc($result);


if(isset($_POST['update_profile'])){
    $s_email=$_POST['email'];
    $s_phone=$_POST['phone'];
    $s_password=$_POST['password'];

    $sql2="UPDATE user SET email='$s_email',phone='$s_phone',password='$s_password' WHERE username='$name'";

$result2=mysqli_query($data,$sql2);

if($result2){
    header("location:student_profile.php");
    
}



}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin DASHBOARD</title>
    <?php include('student_css.php') ?>
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
include ('student_sidebar.php');
?>
<center>

    <div class="content">
        <h2>Update Profile</h2>
        <br>
        <br>
<form action="#" method="POST">
    <div class="div_deg">

       
        <div>
            <label>Email</label>
            <input type="email" name="email" value="<?php echo "{$info['email']}" ?>">
        </div>
        <div>
        <label>Phone</label>
        <input type="Number" name="phone" value="<?php echo "{$info['phone']}" ?>">
    </div>
    <div>
        <label>Password</label>
        <input type="text" name="password" value="<?php echo "{$info['password']}" ?>">
    </div>
    <div>
    
        <input type="submit" class="btn btn-success" name="update_profile" value="Update">
    </div>
</div>
</form>


</div>
</center>

</body>
</html>