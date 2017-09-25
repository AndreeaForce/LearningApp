<?php
include 'header.php';
?>

<section class="main-container">
	<div class="main-wrapper">

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
          <tbody id="userData">
          <tr>
              <td>
                  <div class="profile-avatar">
                      <img class="profiles-min__img" src='<?php echo $image_src;  ?>' >
                  </div>
              </td>
          </tr>
          <tr>
              <td><?php echo $row["profile_name"]; ?></td>
          </tr>
          <tr>
              <td>
                  <a href="/settings.php?edit=<?php echo $row['profile_id'] ?>" id="<?php echo $row['profile_id'] ?>" class=" button--edit-profile"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                  
                
              </td>
          </tr>
          </tbody>
          
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