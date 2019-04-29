<?php
session_start();
ob_start();
if ((isset($_SESSION['user_id'] ))) {

    header("location:profile.php");
}

else if ((isset($_SESSION['admin_user_id']))){
    header("location:admin.php");
}


else if (!(isset($_SESSION['user_id'])) || !(isset($_SESSION['admin_user_id']))){
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Login</title>

        <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="CSS/login.css">
        <script src="Bootstrap/jquery/jquery.min.js"></script>
        <script src="Bootstrap/ajax/popper.min.js"></script>
        <script src="Bootstrap/js/bootstrap.min.js"></script>


    </head>
    <body>
    <div class="container">

        <br/>

        <body class="text-center">

        <form class="form-inline" action="loginCheck.php" onsubmit="return validateForm()" method="post">
            <div id="log" >Login:</div>
            <div id="email" class="form-group">
                <label for="email">Email:</label>

                <input type="text" class="form-control" name="username">
            </div>
            <div id="pass" class="form-group">
                <label for="pwd">Password: </label>

                <input type="password" class="form-control" id="pwd" name="pass">
            </div>


            <div id="submit"><input type="submit" class="btn btn-primary" value="login"></div>

        </form>

    </div>

   <div class="container" width="100%">




    <script>
        function validateForm() {

            var mailFormat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            var full = document.getElementById("email").getElementsByTagName("input")[0];
          //  console.log(full);
            var fullName = full.value;
           //  console.log(fullName);
            if (fullName == "") {
                alert("Name must be filled out");
                return false;
            }
            else  if( !fullName.match(mailFormat) ){
		        alert("Please follow proper Email format");
		        return false;
		    }

            var passWord = document.getElementById("pass").getElementsByTagName("input")[0].value;
            if (passWord == "") {
                alert("Enter a password");
                return false;
            }
        }

    </script>

    </body>
    </html>

<?php
}

?>


