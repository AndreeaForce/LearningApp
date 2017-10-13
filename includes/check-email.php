<?php
include 'database.php';

// Check if username is taken
// get the uid parameter 
$email = mysqli_real_escape_string($conn, $_GET["email"]);

mysqli_select_db($conn,"script");
$sql = "SELECT * FROM users WHERE user_email='".$email."'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if (empty($email)) {
    echo "Please provide an email adress";
} elseif ($row > 0) {
    echo "Email taken";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email";
} else {
    echo "Email is free";
}



?>