<?php
	session_start();
    //include dirname(__FILE__).'/includes/signup-form2.php';
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

<section class="main-container">
	<div class="main-wrapper">
		<h2>Home</h2>
        
		<?php
			if (isset($_SESSION['u_id'])) {
               echo '<form class="signup-form" action="/LearningApp/includes/saveimage.php" method="POST" enctype="multipart/form-data">
                    <div class="avatar">Select your avatar: <input type="file" name="avatar" accept="image/*"></div> 
                    <input type="submit" name="Upload Now" value="Upload">
                </form>';
                
				echo "You are logged in! <br>";
                echo "Welcome user: " . $_SESSION["u_uid"] . "<br>";
                
                include_once '/includes/database.php';
                
                $sql = "select avatar from users where user_id=12";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_array($result);
                
                $image = $row['avatar'];
                $image_src = "images/".$image;    
			}
		?>
        <img src='<?php echo $image_src;  ?>' >
        
	</div>
</section>
<script src="vendor/jquery/dist/jquery.min.js"></script>
<script src="scripts/script.js"></script>
</body>
</html>