<?php
session_start();
ob_start();


if ((isset($_SESSION['user_id']))) {

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
    <title>Signup</title>

    <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
    <script src="Bootstrap/jquery/jquery.min.js"></script>
    <script src="Bootstrap/ajax/popper.min.js"></script>
    <script src="Bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="CSS/signup1.css">

    <style>


    </style>
</head>
<body>

    <div class="container">
        <div id="log"><h2>Register:</h2></div>
        <br/>
        <form class="form-inline" action="registration.php" enctype="multipart/form-data" onsubmit="return validateForm()"  onclick="clearError()" method="post"
              name="registration_form">

<!--        <form class="form-inline" action="registration.php" enctype="multipart/form-data" method="post"-->
<!--              name="registration_form">-->


            <div id="fname" class="form-group">
                <label for="usr">Fullname: </label>


                <input type="text" class="form-control" id="usr" name="fullname" onchange="generateUsername(this.value)">
            </div>
            <div id="uname" class="form-group">
                <label for="usr">Username: </label>


                <input type="text" class="form-control" id="usr" name="username" value="" readonly>
            </div>


            <div id="email" class="form-group">
                <label for="email"> Email: </label>


                <input type="email" class="form-control" id="emailvarify" name="email" onblur="checkInput()">
            </div>

            <div id="gender" class="form-group">
                <label for="gender"> Gender: </label>

                <input type="radio" name="gender" value="female" id="female">Female
                <input type="radio" name="gender" value="male" id="male">Male
            </div>


            <div id="dob" class="form-group">
                <label for="dob"> Date Of Birth: </label>

                <input type="date" name="bday" class="form-control" id="usr">
            </div>


            <div id="phone" class="form-group">
                <label for="email"> Phone: </label>
                <input type="text" class="form-control" id="usr" name="phone">


            </div>

            <div id="pass" class="form-group">
                <label for="pwd">Password: </label>
                <input type="password" class="form-control" id="pwd" name="pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">


            </div>


            <div id="repass" class="form-group">
                <label for="pwd">Confirm Password: </label>
                <input type="password" class="form-control" id="pwd" name="repass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">


            </div>


            <div id="pic" class="form-group">
                <label for="file">Profile Picture: </label>
                <input type="file" class="form-control" id="pwd" name="propic">

            </div>

            <div id="occupation" class="form-group">
                <label for="file">Occupation: </label>
                <input type="text" class="form-control" id="pwd" name="occupation">

            </div>

            <div class="container">

                <div id="sub"><p>Subscriptions:</p></div>
                <div id="check1" class="form-group">
                    <div class="form-check">

                        <label class="form-check-label">

                            <input type="checkbox" class="form-check-input" value="Raw_Science" name='check[]' id="1">Raw
                            Science
                        </label>
                    </div>


                    <div class="form-check">

                        <label class="form-check-label">

                            <input type="checkbox" class="form-check-input" value="Computer_Science" name='check[]' id="2">Computer
                            Science
                        </label>
                    </div>

                    <div class="form-check">

                        <label class="form-check-label">

                            <input type="checkbox" class="form-check-input" value="EEE" name='check[]' id="3">EEE
                        </label>
                    </div>


                    <div class="form-check">

                        <label class="form-check-label">

                            <input type="checkbox" class="form-check-input" value="Others" name='check[]' id="4">Others
                        </label>
                    </div>


                </div>
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
                    <button type="button" class="btn btn-secondary" id="back" onclick="location.href='index.php';"><--Back</button></div>
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

            var userName = document.getElementById("uname").getElementsByTagName("input")[0].value;
            if (userName == "") {
                alert("UserName must be filled out");
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


            var profilePicture = document.getElementById("pic").getElementsByTagName("input")[0].value;
            if(profilePicture== "") {
                alert("Upload a profile picture");
                return false;
            }

            var occupation = document.getElementById("occupation").getElementsByTagName("input")[0].value;
            if(occupation== "") {
                alert("please write your occupation");
                return false;
            }

            var science = document.getElementById("check1").getElementsByTagName("input")[0].checked;
            var cs = document.getElementById("check1").getElementsByTagName("input")[1].checked;
            var eee = document.getElementById("check1").getElementsByTagName("input")[2].checked;
            var other = document.getElementById("check1").getElementsByTagName("input")[3].checked;

            if(!science && !cs && !eee && !other){
                alert("Yoy have to subscribe at least in one");
                return false;
            }


        }
    </script>


<script>
    function checkInput() {
        let email = document.getElementById("emailvarify").value;
        let xhr = new XMLHttpRequest();
        xhr.open("GET", "mailuniqueCheck.php?e="+email, true);
        xhr.send();

        xhr.onload = function () {
            if (this.status === 200) {
                if (this.responseText == 0) {
                    document.getElementById('emailvarify').value = 'Email already exists';

                }
                else if (this.responseText == 1) {
                    document.getElementById('emailvarify').value = 'Invalid email or empty';

                }
            }
        }

    }



    function generateUsername(value){

        if(value==""){
            document.getElementById("uname").getElementsByTagName("input")[0].value="";
        }
        else{
            document.getElementById("uname").getElementsByTagName("input")[0].value=value.replace(/ /g,'')+
                (Math.floor(Math.random() * 50000) + 1).toString();
        }


    }
    function clearError() {
        let email = document.getElementById("emailvarify").value;
        if(email=='Email already exists' || email=='Invalid email or empty' ) {
            document.getElementById('emailvarify').value = '';
        }
    }
</script>
</body>
</html>
    <?php
}

?>