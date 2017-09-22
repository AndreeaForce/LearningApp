<?php

if (isset($_POST['key'])) {
    include '../includes/database.php';
    
    $name = mysqli_real_escape_string($conn, $_POST["profileName"]);
    $gender = mysqli_real_escape_string($conn, $_POST["profileGender"]);
    $age = mysqli_real_escape_string($conn, $_POST["profileAge"]);
    $extenstion = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
    $avatar = uniqid('', true).".".$extenstion;
    $msg = [];
    
    if ($_POST['key'] == 'saveProfile') {

        $extenstion = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
        $avatar = uniqid('', true).".".$extenstion;
        
        //This is the directory where images will be saved 
        $target_dir = "../images/"; 
        $target = $target_dir . $avatar;
        
        move_uploaded_file($_FILES['avatar']['tmp_name'], $target); 
        
        // Check if username is taken

        mysqli_select_db($conn,"script");
        $sql = "SELECT * FROM profile WHERE profile_name='".$name."'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0) {
            echo "Name taken";
        } else {
            
            $sql = " INSERT INTO `profile` (`profile_name`, `profile_age`, `profile_gender`, `profile_avatar`) 
            VALUES('$name', '$age', '$gender', '$avatar'); ";
            
            $result = mysqli_query($conn, $sql);
            
        
        
        }    
    }
}

?>