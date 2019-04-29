<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog1";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);


// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error()) . "<br>";
}
//echo "Connected successfully" . "<br>";


//$sql = "SELECT * FROM teacher";
//$result = $conn->query($sql);
//
//if ($result->num_rows > 0) {
//    // output data of each row
//    while ($row = $result->fetch_assoc()) {
//        echo "id: " . $row["ID"] . " - Name: " . $row["TEC_NAME"] . " " . $row["ROOM_NO"] . "<br>";
//    }
//} else {
//    echo "0 results";
//}

//mysqli_close($conn);





?>