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





<html lang="en">
<head>
    <title>Bootstrap Example</title>

    <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">


</head>
<body>
<?php include('nav.php');?>

<form class="form-inline" action="" method="post">
    <div class="container">

                <div>
                    <h2>Profile Picture</h2>
                    <div class="card" style="width:400px">
                        <!--                    <img  alt="Card image"   src="--><?php //?><!--">-->
                        <?php echo '<img class="card-img-top" src="'.$_SESSION["profile_pic"].'" alt="Profile Picture"  style="width:100%" />'; ?>
                        <div class="card-body">
                            <p class="card-text"><b>Welcome </b></p>
                            <h4 class="card-title"><?php echo $_SESSION["full_name"] ?></h4>

                            <a href="editProfile.php" class="btn btn-primary">Edit Profile</a>
                        </div>
                    </div>
                    <br>
                </div>
                <div id="textfieldforprofile">
                    <div id="" class="form-group">
                        <label for="usr">Username:</label>

                        <input type="text" class="form-control" id="" value=<?php echo $_SESSION["user_name"] ?> readonly>
                    </div>

                    <div id="" class="form-group">
                        <label for="usr">Fullname:</label>

                        <input type="text" class="form-control" id="" value="<?php echo $_SESSION["full_name"]?>" readonly>
                    </div>

                    <div id="" class="form-group">
                        <label for="usr">Email:</label>

                        <input type="text" class="form-control" id="" value=<?php echo $_SESSION["email"] ?> readonly>
                    </div>


                    <div id="" class="form-group">
                        <label for="usr">Phone:</label>

                        <input type="text" class="form-control" id="" value=<?php echo $_SESSION["phone_number"] ?> readonly>
                    </div>


                    <div id="" class="form-group">
                        <label for="usr">Gender:</label>

                        <input type="text" class="form-control" id="" value=<?php echo $_SESSION["gender"] ?> readonly>
                    </div>


                    <div id="" class="form-group">
                        <label for="usr">Occupation:</label>

                        <input type="text" class="form-control" id="" value=<?php echo $_SESSION["occupation"] ?> readonly>
                    </div>


                    <div id="" class="form-group">
                        <label for="usr">Date Of Birth:</label>

                        <input type="text" class="form-control" id="" value=<?php echo $_SESSION["dob"] ?> readonly>
                    </div>
                </div>

            </div>
            <div class="form-group" id="comment2">
                <label for="comment">Suggestion:</label>
                <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="sendbtn btn" onclick="return validateForm()" formaction="send_suggestion.php">Send</button>
            </div>

        </div>

</form>


<script>


    function validateForm() {
        let comment = document.getElementById("comment2").getElementsByTagName("textarea")[0].value;
        if (comment == "")  {
            alert("Please write something");
            return false;
        }

    }
</script>
</body>
</html>

<?php
}

?>