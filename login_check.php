<?php
error_reporting(0);
session_start();
$server = "localhost";
$user = "root";
$password = "";

$db = "studentproject";

$data = mysqli_connect($server, $user, $password, $db);

if ($data == false) {
    die("No Connection");
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * from user where username='" . $name . "'AND password='" . $password . "' ";


    $result = mysqli_query($data, $sql);

    $row = mysqli_fetch_array($result);

    if ($row["usertype"] == "student") {
        
        $_SESSION['username'] = "$name";
        
        $_SESSION['usertype'] = "$student";
        
        header("location:studenthome.php");
        
    } elseif ($row["usertype"] == "admin") {
        
        $_SESSION['username'] = "$name";

        $_SESSION['usertype'] = "$admin";

        header("location:adminhome.php");
    } else {
?>
        <script>
            alert("Incorrect Username or Password");
        </script>
<?php
    }
}
?>