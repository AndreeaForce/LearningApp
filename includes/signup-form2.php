<?php
include_once 'database.php';

$first = mysqli_real_escape_string($conn, $_POST['first']);
$last = mysqli_real_escape_string($conn, $_POST['last']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$uid = mysqli_real_escape_string($conn, $_POST['uid']);
$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
$check = true;
     
//Error handlers
//Check for empty fields
if (empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd)) {
    echo "Empty fields";
    $check = false;
}
//Check if input characters are valid
if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
    echo "Characters are not valid";
    $check = false;
}
//Check if email is valid
mysqli_select_db($conn,"script");
$sql = "SELECT * FROM users WHERE user_email='".$email."'";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

if (empty($email)) {
    echo "Please provide an email adress";
    $check = false;
} 
if ($resultCheck > 0) {
    echo "Email taken";
    $check = false;
} 
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email";
    $check = false;
}

$sql = "SELECT * FROM users WHERE user_uid='$uid'";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result
if ($resultCheck > 0) {
    echo "Username taken";
    $check = false;             
} 
if ($check = true){
//Hashing the password
$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
               
//Insert the user into the database
$sql = "INSERT INTO users (avatar, user_first, user_last, user_email, user_uid, user_pwd) VALUES ('$avatar', '$first', '$last', '$email', '$uid', '$hashedPwd');";
mysqli_query($conn, $sql);            

} 


