<?php

if (isset($_POST['form_name']) && $_POST['form_name'] === 'add_user') {
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
    
    $sql = " INSERT INTO `profile` (`profile_name`, `profile_age`, `profile_gender`, `profile_avatar`)  
        VALUES('$name', '$age', '$gender', '$avatar'); ";
    $result = mysqli_query($conn, $sql);
    //Error check query
    if(!$result) {
         echo("Error description: " . mysqli_error($conn));
    }
    
        $msg['success'] = 1;
        
    } else {
    
        $msg['error'] = 0;
    }
    echo json_encode($msg);




?>