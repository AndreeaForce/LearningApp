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

<section class="main-container">
	<div class="main-wrapper">

		<?php
			if (isset($_SESSION['u_id'])) {
                include_once '/includes/database.php'; 
                
                echo '<h2 class="profile-">Profile</h2>';
                
                $sql = "select avatar from users where user_id='" . $_SESSION['u_id'] . "'";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_array($result);
                
                $image = $row['avatar'];
                $image_src = "images/".$image;
        ?>
            <div class="profile-avatar">
                <img class="profile-avatar__img" src='<?php echo $image_src;  ?>' >
        <?php
                echo '<form class="form__avatar" action="/LearningApp/includes/saveimage.php" method="post" enctype="multipart/form-data">
                    <input class="input__avatar" id="avatar" type="file" name="avatar" accept="image/*">
                    <label for="avatar" id="input__avatar--label"><i class="fa fa-camera fa-lg" aria-hidden="true"></i></label>
                    <input class="button button__avatar" type="submit" name="btnsave" value="Upload">
                </form></div>';
                echo '<div class="profile-user">' . $_SESSION['u_first'] .'  '. $_SESSION['u_last']. '</div> ';      
       
			}
		?>
        
        
	</div>
</section>
<script src="vendor/jquery/dist/jquery.min.js"></script>
<script src="scripts/script.js"></script>
</body>
</html>