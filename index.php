<?php
include 'header.php';
?>

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
            ?>
                
        <?php    
			} else {
                 echo '<h2>Some welcome text</h2>';
            }
		?>
	       </div>
    </div>
</section>
<?php
include 'footer.php';
?>