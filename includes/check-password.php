<?php

if (isset($_POST['submit'])) {
    echo 'first step';
    include 'database.php';
    
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    $uid = mysqli_real_escape_string($conn, $_POST['uid']);
    
    //Error handlers
	//Check if inputs are empty
	if (empty($pwd)) {
        
		header("Location: index.php?login=empty");
		exit();
        
	} else {
      
        $sql = "select user_pwd from users where user_id= '$uid' ";

    }
}

?>