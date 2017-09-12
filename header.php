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
                              echo '<li class="navigation--li navigation--li__no-margin-right"><a href="index.php">' . $_SESSION["u_uid"] . '</a></li>';
                         }
                    ?>
                    
                    
			    </ul>
				<?php
					if (isset($_SESSION['u_id'])) {
						echo '<form class="logout" action="includes/logout-form.php" method="POST">
							<button type="submit" class="button button__green" name="submit">Logout</button>
						</form>';
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