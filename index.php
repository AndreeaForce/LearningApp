<?php
include 'header.php';
?>

<section class="container-col-12"> 
    <div class="row"> 
        <?php
        if (empty($_SESSION['u_id'])) { 
        ?>
        <div class="col-7-sm col__height">
            <div id="left-img">
                <img src="img/element-4.png">
            </div>
            <div id="left-text">
                <h1>ABOUT THE APP</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
        </div><!--- col-7-sm --->
        
        <div class="col-5-sm col__height">
            <div class="right-signup">
		        <h2 class="signup-form__h2">Signup</h2>
		        <form class="signup-form" action="/signup.php" method="POST">
		        	<input type="text" name="first" id="firstName" placeholder="Firstname">
                      <div class="error"></div>
                      <br>
		        	<input type="text" name="last" id="lastName" placeholder="Lastname">
                      <div class="error"></div>
                      <br>
		        	<input type="text" name="email" id="email" placeholder="E-mail">
                      <div class="error"></div>
                      <br>
		        	<input type="text" name="uid" id="userName" placeholder="Username">
                      <div class="error"></div>
                      <br>
		        	<input type="password" name="pwd" id="password" placeholder="Password">
                      <div class="error"></div>
                      <br>
                    <button class="signup-form--button" type="submit" name="submit" value="register">Sign up</button>
		        	
		        </form>
	       </div>
        </div>
        
        <?php } ?>
    
        <div class="index-avatar--wrapper">
    
    
		<?php
	    if (isset($_SESSION['u_id'])) {
              include_once '/includes/database.php';   
            
              $sql = "select * from profile where user_id='" . $_SESSION['u_id'] . "'";
              $result = mysqli_query($conn,$sql);
              
              if (mysqli_num_rows($result) > 0) {
                  //output data of each row
                  while($row = mysqli_fetch_array($result)) {
                      $image = $row['profile_avatar'];
                      $image_src = "images/".$image;
          ?>
        <div class="index-avatar">
            <div class="index-avatar-outer">
               <a href="games-page.php?id=<?php echo $row["profile_id"]; ?>"><img data-id="<?php echo $row["profile_id"]; ?>" class="profiles-min__img" src="<?php echo $image_src;  ?>" ></a>
                <div class="index-profile-name"><?php echo $row["profile_name"]; ?></div>
            </div>     
        </div>
     
        <?php
                }
            }                                                                          
        }
 
        ?>
            <div class="clear-me" >
            </div>
        </div>
        
    </div>
</section>
<?php
include 'footer.php';
?>