<?php
session_start();
//include dirname(__FILE__).'/includes/check-password.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://use.fontawesome.com/67e697fef0.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,400,600,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="fonts/flaticon.css">

</head>
<body>

<header>
    <nav>
        <div class="header-wrapper">
            <?php
            if (!isset($_SESSION['u_id'])) {
            ?>
            <div class="col__header--left">
                <div class="nav--settings"><i class="fa fa-bars" aria-hidden="true"></i>
                </div>
                <?php
                }
                ?>

                <?php
                if (isset($_SESSION['u_id'])) {
                ?>
                <div class="col__header--left-login">
                    <div class="nav--settings"><i class="fa fa-bars" aria-hidden="true"></i>
                    </div>
                    <form class="header__form--password">
                        <input class="verify-pass" type="password" name="checkpwd" placeholder="password">
                        <input type="hidden" id="uid" name="checkuid" value="<?php echo $_SESSION['u_id']?>">
                        <input type="hidden" id="checkPass" name="checkPass" value="no-pass">
                        <button class="header--check-pwd button__check-pwd" type="submit" id="checksubmit" name="submit" value="check-pwd">Check</button>
                        <div id="error-name"></div>
                    </form>
                    <?php
                    }
                    ?>

                </div>
                <div class="col__header-2 col__header--center">
                    <div class="row">
                        <div class="logo-center">
                            <a href="index.php"><img src="img/element-5.png"></a>
                        </div>
                    </div>
                </div>
                <?php
                if (!isset($_SESSION['u_id'])) {
                ?>
                <div class="col__header-5 col__header--right">
                    <?php
                    }
                    ?>
                    <?php
                    if (isset($_SESSION['u_id'])) {
                    ?>
                    <div class="col__header--right-login">
                        <?php
                        }
                        ?>
                        <div class="nav--log">
                            <?php
                            if (isset($_SESSION['u_id'])) {
                                include_once 'includes/database.php';
                                $sql = "select avatar from users where user_id='" . $_SESSION['u_id'] . "'";
                                $result = mysqli_query($conn,$sql);
                                $row = mysqli_fetch_array($result);

                                $image = $row['avatar'];
                                $image_src = "images/".$image;
                                ?><div class="nav-avatar">
                                <img class="nav-avatar__img" src='<?php echo $image_src;  ?>' >
                                </div>
                                <?php
                                echo '<div class="nav-id"><a href="#">' . $_SESSION["u_uid"] . '</a></div>';
                            }
                            ?>

                            <?php
                            if (isset($_SESSION['u_id'])) {
                                echo '';
                            } else {
                                echo '<button type="button" class="button button__green" id="login">Sign In</button>
                            <form class="form--login" action="includes/login-form.php" method="POST">
							<input type="text" name="uid" placeholder="Username/e-mail">
							<input type="password" name="pwd" placeholder="password">
							<button type="submit" class="button button__green" name="submit">Login</button>
				        </form>
						';
                            }
                            ?>

                        </div>
                    </div>
                    <div class="clear-me"></div>
                </div>
    </nav>
</header>