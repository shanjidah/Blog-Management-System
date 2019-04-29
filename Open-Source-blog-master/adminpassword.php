<?php
require 'database.php';
session_start();
ob_start();

if (!(isset($_SESSION['admin_user_id']))) {
    header("location:index.php");
}
else {

?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>adminpassword</title>

        <link rel="stylesheet" href="Bootstrap_Files/css/bootstrap.min.css">
        <script src="Bootstrap_Files/jquery/jquery.min.js"></script>
        <script src="Bootstrap_Files/ajax/popper.min.js"></script>
        <script src="Bootstrap_Files/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="CSS/adminpassword.css">


    </head>
    <body>



    <div class="container">
        <div id="log"><h2>Change Password:</h2></div>
        <br/>
        <form class="form-inline" action="adminpasswordsave.php" onsubmit="return validateForm()" method="post">


            <div class="form-group" id="oldpass1">
                <label for="pwd">Old Password: </label>

                <input type="password" class="form-control" id="oldpass" name="opass">
            </div>

            <br/>

            <div class="form-group" id="newpass1">
                <label for="pwd">New Password: </label>

                <input type="password" class="form-control" id="newpass" name="npass">
            </div>

            <br/>

            <div class="form-group" id="repass1">
                <label for="pwd">Retype Password: </label>

                <input type="password" class="form-control" id="repass" name="rpass">
            </div>
            <br/>


            <br/>
            <div id="submit"><input type="submit" class="btn btn-primary" value="submit"></div>
            <br/>

        </form>
        <div class="container">
            <div id="back" style="width:100%">
                <button type="button" class="btn btn-secondary" onclick="location.href='admin.php'";><--Back</button></div>
        </div>



    </div>




    <script>
        function validateForm() {


            var oldpassWord = document.getElementById("oldpass1").getElementsByTagName("input")[0].value;
            if (oldpassWord == "") {
                alert("Enter old password");
                return false;
            }


            var newpassWord = document.getElementById("newpass1").getElementsByTagName("input")[0].value;
            if (newpassWord == "") {
                alert("Enter new password");
                return false;
            }


            var RepassWord = document.getElementById("repass1").getElementsByTagName("input")[0].value;
            if (RepassWord == "") {
                alert("Enter the password again");
                return false;
            }

            if (newpassWord.valueOf() !== RepassWord.valueOf()) {
                alert("Password doesn't match");
                return false;
            }

//            if (newpassWord === oldpassWord) {
//                alert("old Password can't be same as new password);
//                return false;
//            }
        }

    </script>

    </body>
    </html>

<?php
}

?>
