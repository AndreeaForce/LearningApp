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
</head>
<body>

<header>
	<nav>
		<div class="main-wrapper">
			
			<div class="navigation">
                <ul class="navigation--ul">
				    <li class="navigation--li"><a href="index.php">Home</a></li>
                    <div class="vertical-line"></div>
                    <?php
			             if (isset($_SESSION['u_id'])) {
                              include_once '/includes/database.php'; 
                              echo '<li class="navigation--li navigation--li__no-margin-right"><a href="settings.php">' . $_SESSION["u_uid"] . '</a></li>';
                              $sql = "select avatar from users where user_id='" . $_SESSION['u_id'] . "'";
                              $result = mysqli_query($conn,$sql);
                              $row = mysqli_fetch_array($result);
                            
                              $image = $row['avatar'];
                              $image_src = "images/".$image;
                    ?>
                            <img class="profile-avatar__img" src='<?php echo $image_src;  ?>' >
                    <?php
                        }
                    ?>
                    
			    </ul>
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
						<button type="button" class="button button__green"><a href="signup.php">Get Started</a></button>';
					}
				?>
                
			</div>
            
		</div>
	</nav>
</header>