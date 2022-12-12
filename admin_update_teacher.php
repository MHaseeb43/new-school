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

if($_GET['teacher_id']){

    $t_id=$_GET['teacher_id'];
    $sql="select * from teacher where id='$t_id'";

    $result=mysqli_query($data,$sql);

    $info=$result->fetch_assoc();
}

if(isset($_POST['update_teacher']))
{
$id=$_POST['id'];
$t_name=$_POST['name'];
$t_des=$_POST['description'];
$file=$_FILES['image']['name'];

$dst="./image/".$file;

$dst_db="image/".$file;

move_uploaded_file($_FILES['image']['tmp-name'],$dst);


if($file)
{
$sql2="update teacher set name='$t_name',description='$t_des',image='$dst_db' where id='$id'";
}else{
    $sql2="update teacher set name='$t_name',description='$t_des' where id='$id'";
}

$result2=mysqli_query($data,$sql2);

if($result2){

   header("location:admin_update_teacher.php");

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
    <title>Update Teacher Data</title>
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
width: 600px;
padding-top: 50px;
padding-bottom: 50px;



}
    </style>
</head>
<body>

<?php

include("admin_sidebar.php");

?>


  <div class="content">
    <center>
      <h1>Update Teacher Data</h1>
<br>
<br>
      <form class="div_deg" action="admin_update_teacher.php" method="POST" enctype="multipart/form-data" >

      <input type="text" name="id" value="<?php echo "{$info['id']}" ?>"hidden>
        <div>
            <label>Teacher Name:</label>
            <input type="text" name="name" value="<?php echo "{$info['name']}"?>">
        </div>
        <div>
            <label>About Teacher</label>
            <textarea name="description" rows="3">"<?php echo "{$info['description']}"?>"</textarea>
        </div>
        <div>
            <label>Teacher old Image:</label>
            <img width="100px" height="100px" src="<?php echo "{$info['image']}"?>">
        </div>
        <div>
            <label>Choose teacher new Image:</label>
           <input type="file" name="image">
        </div>
        <div>
            
           <input type="submit" name="update_teacher" class="btn btn-primary">
        </div>
      </form>
    </center>
  </div> 
</body>
</html>