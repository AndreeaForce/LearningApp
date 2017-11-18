<?php
include 'header.php';
include dirname(__FILE__).'/settings/profiles.php';
include dirname(__FILE__).'/settings/select-profiles.php';
include dirname(__FILE__).'/settings/delete-profiles.php';
include dirname(__FILE__).'/settings/select-profiles-min.php';
include dirname(__FILE__).'/settings/change-password.php';
?>

<?php

if (isset($_SESSION['u_id']) && isset( $_SESSION['u_email']) && isset($_SESSION['u_uid']) && isset($_SESSION['u_last']) && isset($_SESSION['u_first'])) {
    include_once '/includes/database.php';
}

//if (isset($_POST['checkPass']) && $_POST['checkPass'] = 'pass') {
?>
<div class="settings-wrapper">
    <div class="links__fixed">
        <a class="user--a__fixed" href="/settings.php#account-profile"><img src="img/005-people.png"></a>
        <a class="kids--a__fixed" href="/settings.php#kids"><img src="img/003-boy-hand-drawn-face.png"></a>
        <a class="about--a__fixed" href="/settings.php#about"><img src="img/001-question-mark-outline-in-a-circle-hand-drawn-button.png"></a>
    </div>

<div class="page-section" id="account-profile">
    <div class="main-wrapper">
        <div class="row"> 
            <div class="section-title--wrapper">
                <h3 class="section-title__h3">Account Profile</h3> 
                <div class="flaticon-arrows-4" id="account-arrow--up" aria-hidden="true"></div>
                <div class="flaticon-arrows-5" id="account-arrow--down" aria-hidden="true"></div>
            </div>
            
            <div class="section__header">  
                <?php
			      if (isset($_SESSION['u_id'])) {
                       include_once '/includes/database.php'; 
                       $sql = "select avatar from users where user_id='" . $_SESSION['u_id'] . "'";
                       $result = mysqli_query($conn,$sql);
                       $row = mysqli_fetch_array($result);
                     
                       $image = $row['avatar'];
                       $image_src = "images/".$image;
                    ?>
   
                    <div class="account-avatar">
                        <div class="profile-avatar">
                            <img class="account-avatar__img" src='<?php echo $image_src;  ?>' >
                 
                            <form class="form__avatar" action="includes/saveimage.php" method="post" enctype="multipart/form-data">
                                <input class="input__avatar" id="user-avatar" type="file" name="avatar" accept="image/*">
                                <label for="user-avatar" id="input__avatar--label"><i class="fa fa-camera fa-lg" aria-hidden="true"></i></label>
                                <input class="button button__avatar" type="submit" name="avatarsave" value="Upload">
                            </form>
                        </div>
                    </div>
          
                    <div class="account-username">
                        <h3 class="account-username__h3"><?php echo $_SESSION["u_uid"] ?></h3>
                    </div>

                <?php
                } 
                ?>
                <form class="logout" action="includes/logout-form.php" method="POST">
                    <button type="submit" class="account__logout" name="submit">Logout</button>
                </form>
            </div><!-- col__medium-2 -->

                <div class="account--content">
                  
                        <div class="settings__form--wrapper">
                            <input type="text" name="first" id="firstName" class="settings__input" placeholder="First name" value="<?php echo $_SESSION['u_first']?>" disabled>
                            <div class="error"></div>
                            <br>
                            <input type="text" name="last" id="lastName" class="settings__input" placeholder="Last name" value="<?php echo $_SESSION['u_last']?>" disabled>
                            <div class="error"></div>
                            <br>
                            <input type="text" name="email" id="email" class="settings__input" placeholder="E-mail" value="<?php echo $_SESSION['u_email']?>" disabled>
                            <div class="error"></div>
                            <br>
                            <input type="text" name="uid" id="userName" class="settings__input" placeholder="Username" value="<?php echo $_SESSION['u_uid']?>" disabled>
                            <div class="error"></div>
                            <br>
                            <br>
                        </div>
                            <!-----------------------------------------------
                            <button type="submit" name="submit" value="register">Update</button>
                            <br>
                            <br>
                            <br>
                            <form class="account--delete" action="includes/delete-account.php" method="post">
                                <input type="submit" name="uid" id="uid">
                            </form>
                            ------------------------------------------------>
      
                    <form class="account__form" id="settings__form--password" action="/settings/change-password.php" method="POST">
                        <div class="settings__form--wrapper">
                            <input type="text" name="pwd" id="password" class="settings__input" placeholder="Old Password" value="">
                            <div class="error"></div>
                            <input type="text" name="npwd" id="password" class="settings__input" placeholder="New Password">
                            <div class="error"></div>
                            <input type="text" name="cpwd" id="password" class="settings__input" placeholder="Confirm Password">
                            <input type="hidden" id="uid" name="uid" value="<?php echo $_SESSION['u_uid']?>">
                            
                            <div class="error"></div>
                        </div>
                        <input class="button--width" type="submit" id="change-password-btn" value="Update Password">
                    </form>
                </div>
        </div><!-- row -->
    </div><!-- main-wrapper -->
</div><!-- page-settings -->
            
            
<div class="page-section" id="kids">
    <div class="main-wrapper">
        <div class="row">             
            <div class="section-title--wrapper">
                <h3 class="section-title__h3">Kids</h3>  
                <div class="flaticon-arrows-4" id="kids-arrow--up" aria-hidden="true"></div>
                <div class="flaticon-arrows-5" id="kids-arrow--down" aria-hidden="true"></div>
            </div>
            <div id="profiles-min">
                <div class="slide-viewer">
                    <div class="profiles-min-content slide-group">
                     
                
                        <?php 
                        echo $table;
                        ?>
                              
                    </div><!-- profiles-min-content -->
                </div><!-- profiles-min -->
                <div class="slide-arrow slide-arrow--left"><i class="flaticon-arrows-2" aria-hidden="true"></i></div>
                    <div class="slide-arrow slide-arrow--right"><i class="flaticon-arrows" aria-hidden="true"></i></div>
            </div>
            <div class="" id="profiles">
                <div class="profiles--content">
                    <form class="settings__form" class="insertProfile">
                        <div class="settings__form--wrapper">
                            <input type="hidden" id="profileId" name="profileId" value="<?php echo $id ?>">
                            
                            <div class="profile-avatar-change">
                                <img class="profile-content__img" id="profileImg" src='<?php echo $avatar_src; ?>' >
                                <label for="avatar" id="profile-avatar__label"><img src="" class="fa fa-camera fa-lg"></label>
                                <input class="settings__input" id="avatar" type="file" name="avatar" accept="image/*" value="<?php echo $avatar ?>"><br><br>
                            </div>
                             
                            <div class="just-space"></div>
                            <label for="profile-name">Name</label><br>
                            <input type="text" class="settings__input" name="profileName" id="profile-name" value="<?php echo $name ?>">
                            <div id="error-name"></div>
                            <br><br><br><br>
                            
                            <div class="profile__input--50">
                                <label for="profile-gender">Gender</label><br>
                                <select class="settings__input" name="profileGender" id="profile-gender">
                                    <option  <?=($gender == "Male") ? 'selected="selected"' : "" ?> value="Male">Male</option>
                                    <option  <?=($gender == "Female") ? 'selected="selected"' : "" ?> value="Female">Female</option>
                                </select>
                                <div id="error-gender"></div>
                                <br><br>
                            </div>
                            <div class="profile__input--50">
                                <label for="profile-age">Age</label><br>
                                <input class="settings__input" type="number" name="profileAge" id="profile-age" min="1" max="20" value="<?php echo $age ?>">
                                <div id="error-age"></div>
                                <br><br>
                            </div>
                            
                            <?php
			                if (isset($_SESSION['u_id'])) {
                                include_once '/includes/database.php'; 
                                $sql = "select * from tags_category";
                                $result = mysqli_query($conn,$sql);
            
                                while($row = mysqli_fetch_array($result)) {
                                    $category = $row['name'];
                                    $categoryId = $row['id'];
                                    //print_r(json_encode($categoryId));
                                
                             ?>    
                            <label for="profile-strong"><?php echo $category ?></label><br>
                            <select class="settings__input" name="profileStrong" id="profile-strong">
                            <?php    
                                $sql = "select * from tags where category_id = '$categoryId'";
                                $result2 = mysqli_query($conn,$sql);
                                
                                while($row2 = mysqli_fetch_array($result2)) {
                                    $tagName = $row2['name'];
                                    $tagId = $row2['id'];
                                    //print_r(json_encode($tagName));
                             ?>   
                                <option  value="<?php echo $tagId ?>"><?php echo $tagName ?></option>
                            <?php
                                    }
                            ?>    
                            </select>
                            <div id="error-strong"></div>
                            <br><br>
            
                            <p id="result"></p>
                            <?php
                                }
                            } 
                            ?>
                            
                            <input type="hidden" id="form_name" name="form_name" value="add_user">
                            </div>
                            <button class="button--width profile-save-btn" type="submit" id="save-profile" name="save-profile" value="<?php echo $_SESSION["u_id"] ?>">Save</button> 
                    </form>
                
                </div><!-- profiles-content -->
            </div><!-- col__medium-8 -->
       </div><!-- row -->
    </div><!-- main-wrapper -->
</div><!-- page-settings -->
<div class="page-section" id="about">
    <div class="main-wrapper">
        <div class="row"> 
            <div class="section-title--wrapper">
                <h3 class="section-title__h3">About</h3>
                <div class="flaticon-arrows-4" id="about-arrow--up" aria-hidden="true"></div>
                <div class="flaticon-arrows-5" id="about-arrow--down" aria-hidden="true"></div>
            </div>
            <div class="section__header-about">
                <div class="about-content--min">
                    <h2 class="about-content--min__h2">Something</h2>
                    <h3 class="about-content--min__h3">about the persons behind this website</h3>
                </div>
            </div>
            <div class="about--content">
                <div class="about--text">
                    <h3 class="about--h3">Andreea</h3>
                    <p class="about--p">Text about Andreea me goes here.</p>
                    
                    <form class="about__form--upload" action="settings/upload.php" method="post" enctype="multipart/form-data">
                        <input type="file" name="files[]" id="files" multiple="" directory="" webkitdirectory="" mozdirectory="">
                        <label for="user-avatar" id="about__label"><i class="fa fa-camera fa-lg" aria-hidden="true"></i></label>
                        <input type="submit" value="Upload File" name="submit">
                    </form>
                </div>
            </div>
    
       </div><!-- row -->
    </div><!-- main-wrapper -->
</div><!-- page-settings -->
            <div class="clear-me"></div>  

</div>
<?php
//}
?>
<?php
include 'footer.php';
?>
