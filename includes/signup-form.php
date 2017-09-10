<?php

$avatar = "";
if (isset($_POST['submit'])) {
	
	include_once 'database.php';

	$first = mysqli_real_escape_string($conn, $_POST['first']);
	$last = mysqli_real_escape_string($conn, $_POST['last']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$uid = mysqli_real_escape_string($conn, $_POST['uid']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    $avatar = ($_FILES['avatar']['name']);
      
    //This is the directory where images will be saved 
    $target = "../images/"; 
    $target = $target . basename( $_FILES['avatar']['name']);

	//Error handlers
	//Check for empty fields
	if (empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd)) {
        header("Location: signup.php?signup=empty");
        exit();

	} else {
		//Check if input characters are valid
		if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
            $firstErr = $lastErr = "valid characters";
			header("Location: /learningApp/signup.php?signup=invalid");
			exit();
            
		} else {
			//Check if email is valid
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				header("Location: signup.php?signup=email");
				exit();
                
			} else {
				$sql = "SELECT * FROM users WHERE user_uid='$uid'";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);

				if ($resultCheck > 0) {
					header("Location: /learningApp/signup.php?signup=usertaken");
					exit();
                    
				} else {
                    move_uploaded_file($_FILES['avatar']['tmp_name'], $target);
                    
					//Hashing the password
					$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                    
					//Insert the user into the database
					$sql = "INSERT INTO users (avatar, user_first, user_last, user_email, user_uid, user_pwd) VALUES ('$avatar', '$first', '$last', '$email', '$uid', '$hashedPwd');";
					mysqli_query($conn, $sql);
                    
                    if (move_uploaded_file($_FILES['avatar']['tmp_name'], $target)) {
                        echo "The file ". basename( $_FILES['avatar']['name']). " has been uploaded, and your information has been added to the directory";
                    }
					header("Location: /learningApp/signup.php?signup=success");
					exit();
				} 
			}
		}
	}

}