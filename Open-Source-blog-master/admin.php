<?php
require 'database.php';
session_start();
ob_start();

if (!(isset($_SESSION['admin_user_id']))) {
    header("location:index.php");
}
else {

?>


<html lang="en">
<head>
    <title>ADMIN</title>

    <link rel="stylesheet" href="Bootstrap_Files/css/bootstrap.min.css">
    <script src="Bootstrap_Files/jquery/jquery.min.js"></script>
    <script src="Bootstrap_Files/ajax/popper.min.js"></script>
    <script src="Bootstrap_Files/js/bootstrap.min.js"></script>

    <style>



        body {
            background-image: url("Backgrounds/admin.jpg");
            background-repeat: no-repeat;
            background-size:cover;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);


        }
        h1 {
            text-align: center;
        }

    </style>

</head>
<body>
<h1>Welcome <?php echo $_SESSION['admin_user_name']?></h1>
<div class="container">

    <form class="form-inline" action="" method="post">


        <button type="submit" id="postr" class="btn btn-primary" value="post_report" formaction="post_report.php">See post reports</button>

        <button type="submit" id="suggestion" class="btn btn-success" value="user_suggestion"  formaction="user_suggestion.php">User_Suggestion</button>

        <button type="submit" id="pass" class="btn btn-dark" value="adminpassword" formaction="adminpassword.php">Change Password</button>

        <button type="submit" id="logout" class="btn btn-danger" value="logout" formaction="logout.php">LogOut</button>

    </form>

</div>
</body>
</html>


    <?php
}

?>