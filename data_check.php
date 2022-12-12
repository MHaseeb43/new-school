<?php
session_start();

$server="localhost";
$user="root";
$password="";

$db="studentproject";

$data=mysqli_connect($server,$user,$password,$db);
if($data==false){

    echo "No Connection ";
}


if(isset($_POST['apply'])){

    $data_name=$_POST['name'];
    $data_email=$_POST['email'];
    $data_phone=$_POST['phone'];
    $data_message=$_POST['message'];

    $sql="insert into admission (name,email,phone,message)
           VALUES ('$data_name','$data_email','$data_phone','$data_message')";

           $result=mysqli_query($data,$sql);
           if($result){
    $_SESSION['message']="your application sent successfully";


    header("location:index.php");
           }else{
echo "Not Apply";
           }

}



?>
