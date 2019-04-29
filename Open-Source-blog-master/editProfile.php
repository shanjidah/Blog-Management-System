<!DOCTYPE html>
<?php
require 'database.php';
session_start();
ob_start();

if (!(isset($_SESSION['user_id']))) {
    header("location:index.php");
}
else {

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>EditProfile</title>
    <script src="Bootstrap/jquery/jquery.min.js"></script>
    <script src="Bootstrap/ajax/popper.min.js"></script>
    <script src="Bootstrap/js/bootstrap.min.js"></script>
    <script src="Bootstrap/css/bootstrap.min.css"></script>

    <style>
    </style>
</head>
<body>

<div class="container" style="width: 100%;">
    <div style="width: 100%;" id="log"><h2>Edit Profile:</h2></div>
    <br/>
    <form class="form-inline" action="editProfileSave.php" enctype="multipart/form-data" onsubmit="return validateForm()" method="post"
          name="registration_form">


        <div style="width: 100%;" id="fname" class="form-group">
            <label for="usr">Fullname: </label>

            <input type="text" class="form-control" id="usr" name="fullname" value="<?php echo $_SESSION["full_name"];?>">
        </div>



        <?php
            if($_SESSION["gender"]=='male')
            {
                ?>
                    <div style="width: 100%;" id="gender" class="form-group">
                        <label for="gender"> Gender: </label>

                        <input type="radio" name="gender" value="female" id="female">Female
                        <input type="radio" name="gender" value="male" id="male" checked>Male
                    </div>
                <?php

            }
            else
            {
                 ?>
                    <div style="width: 100%;" id="gender" class="form-group">
                        <label for="gender"> Gender: </label>

                        <input type="radio" name="gender" value="female" id="female" checked>Female
                        <input type="radio" name="gender" value="male" id="male">Male
                    </div>
                <?php
            }
        ?>




        <div id="dob" class="form-group">
            <label for="dob"> Date Of Birth: </label>

            <input type="date" name="bday" class="form-control" id="usr" value="<?php echo $_SESSION["dob"];?>">
        </div>


        <div id="phone" class="form-group">
            <label for="email"> Phone: </label>
            <input type="text" class="form-control" id="usr" name="phone" value="<?php echo $_SESSION["phone_number"];?>">


        </div>

        <div id="pass" class="form-group">
            <label for="pwd">Password: </label>
            <input type="password" class="form-control" id="pwd" name="pass" value="<?php echo $_SESSION["password"];?>" onchange="passClear()" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">


        </div>


        <div id="repass" class="form-group">
            <label for="pwd">Confirm Password: </label>
            <input type="password" class="form-control" id="pwd" name="repass" value="<?php echo $_SESSION["password"];?>" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">


        </div>


        <div id="pic" class="form-group">
            <label for="file">Profile Picture: </label>
            <input type="file" class="form-control" id="pwd" name="propic">

        </div>

        <div id="occupation" class="form-group">
            <label for="file">Occupation: </label>
            <input type="text" class="form-control" id="pwd" name="occupation" value="<?php echo $_SESSION["occupation"];?>">

        </div>


        <div id="Submit" class="form-group">
            <label for="file"></label>
            <input type="submit" class="form-control" id="pwd" value="Submit">

        </div>


        <div id="Reset" class="form-group">
            <label for="file"></label>
            <button type="reset" class="form-control" id="pwd">Reset</button>

        </div>

        <div class="container" width="100%">
            <div id="back" style="width:100%">
                <button type="button" class="btn btn-secondary" id="back" onclick="location.href='profile.php';">Back</button></div>
        </div>


    </form>

</div>


<script>


    function validateForm() {

        var fullName = document.getElementById("fname").getElementsByTagName("input")[0].value;

        if (fullName == "") {
            alert("Name must be filled out");
            return false;
        }



        var phoneNumber = document.getElementById("phone").getElementsByTagName("input")[0].value;
        if (phoneNumber == "" || phoneNumber.length!=11) {
            alert("Phone Error");
            return false;
        }

        var Email = document.getElementById("email").getElementsByTagName("input")[0].value;
        if (!Email){
            alert("Enter Email");
            return false;
        }


        var Mgender = document.getElementById("gender").getElementsByTagName("input")[0].checked;
        var Fgender = document.getElementById("gender").getElementsByTagName("input")[1].checked;
        if (!Mgender && !Fgender) {
            alert("Choose gender");
            return false;
        }


        var birthDay = document.getElementById("dob").getElementsByTagName("input")[0].value;
        if (!birthDay) {
            alert("Choose Birthday");
            return false;
        }


        var passWord = document.getElementById("pass").getElementsByTagName("input")[0].value;
        var repassWord = document.getElementById("repass").getElementsByTagName("input")[0].value;
        if (passWord == "") {
            alert("Enter a password");
            return false;
        }
        if (repassWord == "") {
            alert("Renter password");
            return false;
        }

        if(passWord!=repassWord){
            alert("Password Doesn't match");
            return false;
        }



        var occupation = document.getElementById("occupation").getElementsByTagName("input")[0].value;
        if(occupation== "") {
            alert("please write your occupation");
            return false;
        }

    }
</script>

<script>
    function passClear(){
            document.getElementById("repass").getElementsByTagName("input")[0].value="";
    }
</script>

</body>
</html>


<?php
}

?>