<?php
	session_start();
    //include dirname(__FILE__).'/includes/signup-form2.php';
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
    
</head>
<body>

<header>
	<nav>
		<div class="main-wrapper">
			
			<div class="navigation--left col__medium-3">
				<div class="nav--settings"><a href="settings.php"><i class="fa fa-bars" aria-hidden="true"></i></a>
                </div>
            </div>
            <div class="navigation--center col__medium-3">
                <a href="index.php"><img class="nav--logo" src="images/tour-text.png"></a>
            </div>
            <div class="navigation--right col__medium-6">
                <div class="nav--log">
                    <?php
			             if (isset($_SESSION['u_id'])) {
                              include_once '/includes/database.php'; 
                              $sql = "select avatar from users where user_id='" . $_SESSION['u_id'] . "'";
                              $result = mysqli_query($conn,$sql);
                              $row = mysqli_fetch_array($result);
                            
                              $image = $row['avatar'];
                              $image_src = "images/".$image;
                    ?><div class="nav-avatar">
                        <img class="nav-avatar__img" src='<?php echo $image_src;  ?>' >
                    </div>
                    <?php
                        echo '<div class="nav-id"><a href="settings.php">' . $_SESSION["u_uid"] . '</a></div>';
                        }
                    ?>
                    
				<?php
					if (isset($_SESSION['u_id'])) {
						echo '';
					} else {
						echo '<button type="button" class="button button__trigger" id="login">Sign In</button>
                            <form class="form--login" action="includes/login-form.php" method="POST">
							<input type="text" name="uid" placeholder="Username/e-mail">
							<input type="password" name="pwd" placeholder="password">
							<button type="submit" class="button button__white" name="submit">Login</button>
				        </form>
						<button type="button" class="button button__green"><a href="signup.php">Signup</a></button>';
					}
				?>
                
			     </div>
            </div>
            <div class="clear-me"></div> 
		</div>
	</nav>
</header>