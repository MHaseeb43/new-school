<?php


error_reporting(0);
session_start();
session_destroy();

if($_SESSION['message']){

$message=$_SESSION['message'];
echo "<script type='text/javascript'>

alert('$message');
</script>";
}

$server="localhost";
$user="root";
$password="";
$db="studentproject";

$data=mysqli_connect($server,$user,$password,$db);


$sql="select * from teacher";

$result=mysqli_query($data,$sql);






?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" href="style.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

<body>
    <nav>
        <label class="logo">Garrisons</label>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Admission Now</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="login.php" class="btn btn-warning">Login</a></li>
        </ul>
    </nav>


    <div class="section1">
        <label class="img_text">we Teach student with care</label>
        <img class="main_img" src="school_management.jpg" alt="">
    </div>

    <div class="container">

        <div class="row">

            <div class="col-md-4">
                <img class="welcome_img" src="school2.jpg" alt="">
            </div>
            <div class="col-md-8">
                <h1>Welcome to Garrison School</h1>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia sequi expedita beatae mollitia aliquam recusandae natus corporis repudiandae adipisci voluptas, molestiae quam quos eaque placeat repellat ex ducimus aperiam quisquam blanditiis Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore nostrum eius repellendus nisi id in est, dignissimos ipsum animi, commodi labore eaque autem. A, sunt reprehenderit. Distinctio molestiae officia dolor voluptate eum ipsam, aut quidem fuga perspiciatis vero earum sunt harum ipsa libero, consequuntur blanditiis et, possimus nemo? Quas ipsam similique eum debitis eos ipsum id vel minima nis.</p>
            </div>
        </div>
    </div>

    <center>
        <h2> Our Teacher's</h2>
    </center>


    <div class="container">
        <div class="row">
<?php

while($info=$result->fetch_assoc()){

?>
            <div class="col-md-4">
                <img class="teacher" src="<?php echo "{$info['image']}" ?>" >
                <h3><?php echo "{$info['name']}" ?></h3>
                <h5><?php echo "{$info['description']}" ?></h5>
                
            </div>
            <?php
}
            ?>
            
        </div>
    </div>
    <center>
        <h2> Our Course's</h2>
    </center>


    <div class="container">
        <div class="row">

            <div class="col-md-4">
                <img class="teacher" src="web.jpg" alt="">
                <h3>Web Developer</h3>
            </div>
            <div class="col-md-4">
                <img class="teacher" src="graphic.jpg" alt="">
                <h3>Graphic Designer</h3>
            </div>
            <div class="col-md-4">
                <img class="teacher" src="marketing.png" alt="">
                <h3>Media Marketing</h3>
            </div>
        </div>
    </div>

    <center>
        <h1>Admission Form</h1>

        <div align="" center class="admission_form">
            <form action="data_check.php" method="POST">
                <div class="adm_int">
                    <label class="label_text">Name</label>
                    <input class="input_deg" type="text" name="name">
                    <div>
                        <label class="label_text">Email</label>
                        <input class="input_deg" type="email" name="email">
                    </div>
                </div>
                <div class="adm_int">
                    <label class="label_text">Phone</label>
                    <input class="input_deg" type="Number" name="phone">
                </div class="adm_int">
                <div class="adm_int">
                    <label class="label_text">Message</label>
                    <textarea class="input_txt" name="message"></textarea>
                </div>
                <div>

                    <input class="btn btn-primary" id="submit" type="submit" value="Apply" name="apply">
                </div>
            </form>
    </center>


    <footer>
        <h6 class="footer_text">All @copyright reserved by Garrisons</h6>
    </footer>
</body>

</html>