<?php

$name = "";
$gender = "";
$age = "";
$strong = "";
$weak = "";
$likes = "";
$dislikes = "";
$avatar_src = "images/profiledefault.jpg";
$avatar = "";
$id = 0;
$edit = false;

if (isset($_POST['form_name']) && $_POST['form_name'] === 'add_user') {
    session_start();
    include '../includes/database.php';
    $msg = [];
    $name = mysqli_real_escape_string($conn, $_POST["profileName"]);
    $gender = mysqli_real_escape_string($conn, $_POST["profileGender"]);
    $age = mysqli_real_escape_string($conn, $_POST["profileAge"]);
    $strong = mysqli_real_escape_string($conn, $_POST["profileStrong"]);
    $weak = mysqli_real_escape_string($conn, $_POST["profileWeak"]);
    $likes = mysqli_real_escape_string($conn, $_POST["profileLikes"]);
    $dislikes = mysqli_real_escape_string($conn, $_POST["profileDislikes"]);
    $extenstion = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
    $avatar = uniqid('', true).".".$extenstion;
    
    //This is the directory where images will be saved 
    $target_dir = "../images/"; 
    $target = $target_dir . $avatar;
    
    
    move_uploaded_file($_FILES['avatar']['tmp_name'], $target); 
    
    $sql = " INSERT INTO `profile` (`profile_name`, `profile_age`, `profile_gender`, `profile_strong`, `profile_weak`, `profile_likes`, `profile_dislikes`, `profile_avatar`, `user_id`)  
        VALUES('$name', '$age', '$gender', '$strong', '$weak', '$likes', '$dislikes', '$avatar', '{$_SESSION['u_id']}') 
        ";
    
    $result = mysqli_query($conn, $sql);
    //Error check query
    if(!$result) {
         echo("Error description: " . mysqli_error($conn));
    }
    $msg['success'] = 1;
     echo json_encode($msg);   
    } 
    else if (isset($_POST['form_name']) && $_POST['form_name'] === 'edit_user') {
    
    include '../includes/database.php';

    $name = mysqli_real_escape_string($conn, $_POST["profileName"]);
    $gender = mysqli_real_escape_string($conn, $_POST["profileGender"]);
    $age = mysqli_real_escape_string($conn, $_POST["profileAge"]);
    $strong = mysqli_real_escape_string($conn, $_POST["profileStrong"]);
    $weak = mysqli_real_escape_string($conn, $_POST["profileWeak"]);
    $likes = mysqli_real_escape_string($conn, $_POST["profileLikes"]);
    $dislikes = mysqli_real_escape_string($conn, $_POST["profileDislikes"]);
    $extenstion = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
    $avatar = uniqid('', true).".".$extenstion;
    $id = mysqli_real_escape_string($conn, $_POST["profileId"]);
    
    //This is the directory where images will be saved 
    $target_dir = "../images/"; 
    $target = $target_dir . $avatar;
    
    
    move_uploaded_file($_FILES['avatar']['tmp_name'], $target); 
    
    $sql = "UPDATE profile ". 
            "SET profile_name = '$name', profile_gender = '$gender', profile_age = '$age', profile_strong = '$strong', profile_weak = '$weak', profile_likes = '$likes', profile_dislikes = '$dislikes', profile_avatar = '$avatar' ".
            "WHERE profile_id = $id";
    
    $result = mysqli_query($conn, $sql);
        
    
    //Error check query
    if(!$result) {
         echo("Error description: " . mysqli_error($conn));
    }
        
    $msg['success'] = 1;
     echo json_encode($msg);   
    } else {
        
    }
    

?>