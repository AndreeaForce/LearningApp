<?php
session_start();
include_once 'database.php';
$id = $_SESSION['u_id'];

if (isset($_POST['avatarsave'])) {

$avatar = $_FILES['avatar']['name'];
    
//This is the directory where images will be saved 
$target_dir = "../images/"; 
$target = $target_dir . basename($_FILES['avatar']['name']);
    
 // Select file type
$imageFileType = pathinfo($target,PATHINFO_EXTENSION);
        
    // Allow certain file formats
    if ($imageFileType = "jpg" && $imageFileType = "png" && $imageFileType = "jpeg" && $imageFileType = "gif" ) {
       
        //Insert  into the database
        $sql = "UPDATE users SET avatar = '$avatar' WHERE user_id = $id";
        
        mysqli_query($conn, $sql);
        
        // Upload file
        move_uploaded_file($_FILES['avatar']['tmp_name'], $target); 
        
        header("Location: /settings.php");
        exit();
    } else {
        header("Location: /settings.php?avatar=wrong type");
        exit();
    }
        
 } else {
    header("Location: /settings.php?avatar=something wrong");
    exit();
}
    
?>