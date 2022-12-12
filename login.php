<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Login Form</title>
</head>
<body background="school2.jpg" class="body_deg">
   <center>
    <div class="form_deg">
        <center><div class="title_deg">LOGIN FORM</div></center>
        <form action="login_check.php" method="POST" class="login_form">
        <div>
            <label class="label_deg">Username:</label>
            <input type="text" name="username" placeholder="Enter Username">
        </div>
        <div>
            <label class="label_deg">Password:</label>
            <input type="password" name="password" placeholder="Enter Password">
        </div>
        <div>
           <input class="btn btn-primary" type="submit" name="submit" value="Login">
        </div>
        </form>
    </div>
   </center>
</body>
</html>