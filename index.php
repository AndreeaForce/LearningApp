<?php
	session_start();
    
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<header>
	<nav>
		<div class="main-wrapper">
			
			<div class="navigation">
                <ul class="navigation--ul">
				    <li class="navigation--li"><a href="index.php">Home</a></li>
                    <li class="navigation--li"><a href="index.php">Courses</a></li>
                    <li class="navigation--li"><a href="index.php">About Us</a></li>
                    <div class="vertical-line"></div>
                    
			    </ul>
				<?php
					if (isset($_SESSION['u_id'])) {
						echo '<form class="logout" action="includes/logout-form.php" method="POST">
							<button type="submit" class="button button__green" name="submit">Logout</button>
						</form>
                        <img src="'.$_SESSION['avatar'].'">';
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

<section class="main-container">
	<div class="main-wrapper">
		<h2>Home</h2>
        <div>
            <img src="<?php echo $_SESSION['avatar']; ?>" alt="picture"/>
        </div>
		<?php
			if (isset($_SESSION['u_id'])) {
				echo "You are logged in! <br>";
                echo "Welcome user: " . $_SESSION["u_uid"] . "<br>";
                echo '<img src="'.$_SESSION['avatar'].'">';
			}
		?>
	</div>
</section>

<script src="scripts/script.js"></script>
</body>
</html>
    