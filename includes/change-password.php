
<html>
<body>
<?php

    include 'database.php';

    $uid = mysqli_real_escape_string($conn, $_POST['uid']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

    //Error handlers
    //Check if inputs are empty
    if (empty($uid) || empty($pwd)) {
        echo $_POST["pwd"];
//        exit();
    } else {
        echo $_POST["pwd"] . 'din else';
        echo $_POST["npwd"] . 'din else';
        echo $_POST["cpwd"] . 'din else';
        echo $_POST["uid"] . 'din else';
        $sql = "SELECT * FROM users WHERE user_uid='$uid' OR user_email='$uid'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck < 1) {
            header("Location: ../index.php?login=error");
            exit();
        } else {
            if ($row = mysqli_fetch_assoc($result)) {
                //De-hashing the password
                $hashedPwdCheck = password_verify($pwd, $row['user_pwd']);
                if ($hashedPwdCheck == false) {
                    echo 'wrong pwd' . $_POST["pwd"];
//                    header("Location: ../index.php?login=error");
                    exit();
                } elseif ($hashedPwdCheck == true) {
                    if ($_POST["npwd"] === $_POST["cpwd"]) {
                        echo 'Password matched';
                        echo 'Password verified';
                        //Hashing the password
                        $hashedPwd = password_hash($_POST["npwd"], PASSWORD_DEFAULT);
                        echo 'Password hashed' . $hashedPwd;
                        $sqlUpdate="UPDATE users SET user_pwd='$hashedPwd'";
                        mysqli_query($conn, $sqlUpdate);

                        exit();
                    } else {
                        echo 'Incorect password';
                        header("Location: ../settings.php?login=error");

                    }
                }
            }
        }

    }

?>
<!--Welcome --><?php //echo $_POST["pwd"]; ?><!--<br>-->
<!--Your email address is: --><?php //echo $_POST["uid"]; ?>

</body>
</html>
