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
?>

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
                     
                       $imagee = $row['avatar'];
                       $imagee_src = "images/".$imagee;
                    ?>
   
                    <div class="account-avatar">
                        <img class="account-avatar__img" src='<?php echo $imagee_src;  ?>' >
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
                    <form class="settings__form" action="/settings/account-settings.php" method="POST">
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
                            <!-----------------------------------------------
                            <button type="submit" name="submit" value="register">Update</button>
                            <br>
                            <br>
                            <br>
                            <form class="account--delete" action="includes/delete-account.php" method="post">
                                <input type="submit" name="uid" id="uid">
                            </form>
                            ------------------------------------------------>
                        </div>
                    </form>
                    <form class="settings__form" id="settings__form--password" action="/settings/change-password.php" method="POST">
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
                                <label for="avatar" id="profile-avatar__label"><img src="images/002-app-1.png" class="fa fa-camera fa-lg"></label>
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
                            
                            <label for="profile-strong">Strong Points</label><br>
                            <select class="settings__input" name="profileStrong" id="profile-strong">
                                <option  <?=($strong == "StrongPoint1") ? 'selected="selected"' : "" ?> value="StrongPoint1">StrongPoint1</option>
                                <option  <?=($strong == "StrongPoint2") ? 'selected="selected"' : "" ?> value="StrongPoint2">StrongPoint2</option>
                                <option  <?=($strong == "StrongPoint3") ? 'selected="selected"' : "" ?> value="StrongPoint3">StrongPoint3</option>
                                <option  <?=($strong == "StrongPoint4") ? 'selected="selected"' : "" ?> value="StrongPoint4">StrongPoint4</option>
                            </select>
                            <div id="error-strong"></div>
                            <br><br>
                            
                            <label for="profile-weak">Weak Points</label><br>
                            <select class="settings__input" name="profileWeak" id="profile-weak">
                                <option  <?=($weak == "WeakPoint1") ? 'selected="selected"' : "" ?> value="WeakPoint1">WeakPoint1</option>
                                <option  <?=($weak == "WeakPoint2") ? 'selected="selected"' : "" ?> value="WeakPoint2">WeakPoint2</option>
                                <option  <?=($weak == "WeakPoint3") ? 'selected="selected"' : "" ?> value="WeakPoint3">WeakPoint3</option>
                                <option  <?=($weak == "WeakPoint4") ? 'selected="selected"' : "" ?> value="WeakPoint4">WeakPoint4</option>
                            </select>
                            <div id="error-weak"></div>
                            <br><br>
                            
                            <label for="profile-likes">Likes</label><br>
                            <select class="settings__input" name="profileLikes" id="profile-likes">
                                <option  <?=($likes == "Likes1") ? 'selected="selected"' : "" ?> value="Likes1">Likes1</option>
                                <option  <?=($likes == "Likes2") ? 'selected="selected"' : "" ?> value="Likes2">Likes2</option>
                                <option  <?=($likes == "Likes3") ? 'selected="selected"' : "" ?> value="Likes3">Likes3</option>
                                <option  <?=($likes == "Likes4") ? 'selected="selected"' : "" ?> value="Likes4">Likes4</option>
                            </select>
                            <div id="error-likes"></div>
                            <br><br>
                            
                            <label for="profile-dislikes">Dislikes</label><br>
                            <select class="settings__input" name="profileDislikes" id="profile-dislikes">
                                <option  <?=($dislikes == "Dislikes1") ? 'selected="selected"' : "" ?> value="Dislikes1">Dislikes1</option>
                                <option  <?=($dislikes == "Dislikes2") ? 'selected="selected"' : "" ?> value="Dislikes2">Dislikes2</option>
                                <option  <?=($dislikes == "Dislikes3") ? 'selected="selected"' : "" ?> value="Dislikes3">Dislikes3</option>
                                <option  <?=($dislikes == "Dislikes4") ? 'selected="selected"' : "" ?> value="Dislikes4">Dislikes4</option>
                            </select>
                            <div id="error-dislikes"></div>
                            <br><br>
                            <p id="result"></p>
                            
                            <input type="hidden" id="form_name" name="form_name" value="add_user">
                            </div>
                            <button class="button--width profile-save-btn" type="submit" id="save-profile" name="save-profile" class="button" value="<?php echo $_SESSION["u_id"] ?>">Save</button> 
                    </form>
                
                </div><!-- profiles-content -->
            </div><!-- col__medium-8 -->
       </div><!-- row -->
    </div><!-- main-wrapper -->
</div><!-- page-settings -->
<div class="page-section" id="settings">
    <div class="main-wrapper">
        <div class="row"> 
            <h3 class="section-title__h3">About</h3>
            <div class="col__medium-10" id="about">
                <div>about</div>
            </div>
       </div><!-- row -->
    </div><!-- main-wrapper -->
</div><!-- page-settings -->
            <div class="clear-me"></div>  



<script src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script src="scripts/settings.js"></script>
<script src="scripts/profiles.js"></script>
