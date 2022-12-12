<?php
session_start();

$server="localhost";
$user="root";
$password="";
$db="studentproject";

$data=mysqli_connect($server,$user,$password,$db);


if($_GET['student_id']){

    $user_id=$_GET['student_id'];
    
    $sql="delete from user where id='$user_id'";

    $result=mysqli_query($data,$sql);

    if($result){
        $_SESSION['message']='Student Deleted from the list!';
        header("location:view_student.php");
    }
}



?>