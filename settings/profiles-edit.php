<?php

if (isset($_POST['form_name']) && $_POST['form_name'] === 'edit_user') {
    $msg = [];
    include '../includes/database.php';
    
    $name = mysqli_real_escape_string($conn, $_POST["profileName"]);
    $gender = mysqli_real_escape_string($conn, $_POST["profileGender"]);
    $age = mysqli_real_escape_string($conn, $_POST["profileAge"]); 
    
    $extenstion = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
    $avatar = uniqid('', true).".".$extenstion;
    
    //This is the directory where images will be saved 
    $target_dir = "../images/"; 
    $target = $target_dir . $avatar;
    
    move_uploaded_file($_FILES['avatar']['tmp_name'], $target); 
    
    $sql = " UPDATE `profile` (`profile_name`, `profile_age`, `profile_gender`, `profile_avatar`)  
        VALUES('$name', '$age', '$gender', '$avatar'); ";
    $result = mysqli_query($conn, $sql);
    //Error check query
    if(!$result) {
         echo("Error description: " . mysqli_error($conn));
    } 
        $msg['success edit'] = 1;
    
    } else {
        $msg['error edit'] = 0;
 
    }

?>