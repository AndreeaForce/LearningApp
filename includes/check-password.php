<?php

if (isset($_POST['uid'])) {
    include 'database.php';
    
    $msg = [];
    $pwd = mysqli_real_escape_string($conn, $_POST['checkpwd']);
    $uid = mysqli_real_escape_string($conn, $_POST['checkuid']);
    
    //Error handlers
	//Check if inputs are empty
	if (empty($pwd)) {
        
	
        
	} else {     
        $sql = "select user_pwd from users where user_id= '$uid' ";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_fetch_assoc($result);
   
        if ($resultCheck < 1) {
            header("Location: /index.php?login=error");
            echo "nothing found ";
            exit();
        } else {
            if ($resultCheck) {
                //De-hashing the password
                $hashedPwdCheck = password_verify($pwd, $resultCheck['user_pwd']);
                
                if ($hashedPwdCheck == true) {
   
                  echo  $msg['success'] = 1;
                } else {
                    echo 'wrong';
                  
                    $msg['success'] = 0;
                }
            }
        }
    }
    
}  else {
    $msg['error'] = 0; 
}
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    echo json_encode($msg);
}

?>