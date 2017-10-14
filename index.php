<?php
include 'header.php';
?>

<section class="main-container">
	<div class="main-wrapper main-wrapper--margin">

		<?php
	    if (isset($_SESSION['u_id'])) {
                 
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
	
    </div>
</section>
<?php
include 'footer.php';
?>