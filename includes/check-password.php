<?php

if (isset($_POST['checkpwd']) && $_POST['checkpwd'] != '') {
    include 'database.php';
    $msg = [];
    $pwd = mysqli_real_escape_string($conn, $_POST['checkpwd']);
    $uid = mysqli_real_escape_string($conn, $_POST['checkuid']);
    
    //Error handlers
	//Check if inputs are empty
	if (empty($pwd)) {
        //header("Location: /index.php?pwd=empty");	
        //exit();
        $msg['success'] = "empty";
	} else {     
        $sql = "select user_pwd from users where user_id= '$uid' ";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_fetch_assoc($result);
   
        if ($resultCheck < 1) {
            //header("Location: /index.php?pwd=error1");
            //exit();
        } else {
            if ($resultCheck) {
                //De-hashing the password
                $hashedPwdCheck = password_verify($pwd, $resultCheck['user_pwd']);
                
                if ($hashedPwdCheck == true) {
                    $msg['success'] = 1;
                    //header("Location: /settings.php");
			        //exit();
                } else {
                    $msg['success'] = 0;
                    //header("Location: /index.php?pwd=incorect-pwd");
                    //exit();
                }
            }
        }
    }
} else {
    $msg['success'] = 2;
    //header("Location: /index.php?pwd=error3");
    //exit();
} 
echo json_encode($msg);

?>