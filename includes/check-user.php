<?php
include 'database.php';

// Check if username is taken
// get the uid parameter 
$uid = ($_GET["uid"]);

mysqli_select_db($conn,"script");
$sql = "SELECT * FROM users WHERE user_uid='".$uid."'";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

if ($resultCheck > 0) {
    echo "Username taken";
} else {
    echo "Username is free";
}

?>