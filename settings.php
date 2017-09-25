<?php
include 'header.php';
include dirname(__FILE__).'/settings/profiles.php';

// when user click edit link->form_name value changes
$updateType ="add_user";
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    if(!is_numeric($id)) {
        exit();
    }
    $sql = mysqli_query($conn, "SELECT * FROM profile WHERE profile_id= $id LIMIT 1");
    if($sql === false) {
        echo "Error description: ". mysqli_error($conn);
    }
    while ($result = mysqli_fetch_assoc($sql)) {
        $name = $result['profile_name'];
        $gender = $result['profile_gender'];
        $age = $result['profile_age'];
        $strong = $result['profile_strong'];
        $weak = $result['profile_weak'];
        $likes = $result['profile_likes'];
        $dislikes = $result['profile_dislikes'];
        $id = $result['profile_id'];
        $avatar = $result['profile_avatar'];
        $image_src = "images/".$avatar;
        $updateType ="edit_user"; //form_name value changes
    }
    echo $result;
}


?>
<div class="page-section" id="settings">
    <div class="main-wrapper">
        <div class="row"> 
            
            <div class="col__medium-2">
                <ul class="settings__ul">
                    <span class="settings--title">SETTINGS</span>
                    <li class="settings__li settings__li--top-margin" id="settings__li1">Account</li>
                        <div class="horizontal-line"></div>
                    <li class="settings__li" id="settings__li2">Profiles</li>
                        <div class="horizontal-line"></div>
                    <li class="settings__li" id="settings__li3">About</li>
                        <div class="horizontal-line"></div>
                    <form class="logout" action="includes/logout-form.php" method="POST">
                        <button type="submit" class="settings__li button--no-btn" name="submit">Logout</button>
                    </form>
                </ul><!-- settings-ul -->
            </div><!-- col__medium-2 -->
            
            <div class="col__medium-10" id="account">
                <div class="account--content">
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
			             <button type="submit" name="submit" value="register">Sign up</button>
		          </form>
                </div>
            </div><!-- col__medium-10 -->
            
            <div class="col__medium-2" id="profiles-min">
                <div class="profiles-min-content">
                    <div class="profiles-add">
                        <a href="/settings.php" name="add-profile" id="add-profile" class="button-add"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                    </div>
                    <div class="avatar-table">
                        <table class="table table-avatar">
                            
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
                                    <a href="/settings.php?edit=<?php echo $row['profile_id'] ?>" id="<?php echo $row['profile_id'] ?>" class="button button--edit-profile"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    
                                     <a href="/settings.php?delete=<?php echo $row['profile_id'] ?>" id="<?php echo $row['profile_id'] ?>" class="button button--delete-profile"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                  
                                </td>
                            </tr>
                            
                            <?php
                                    }
                                }                                                                          
                            }
                            ?>
                            </tbody>
                        </table>
                    </div><!-- avatar-table -->
                </div><!-- profiles-min-content -->
            </div><!-- col__medium-2 -->
            
            <div class="col__medium-8" id="profiles">
                <div class="profiles-content">
                    <div class="profiles-header" id="profiles-header">
                        <h4 class="">Profile</h4>
                    </div>
                    <form id="insert-profile" class="insertProfile">
                        <input type="hidden" id="profileId" name="profileId" value="<?php echo $id ?>">
                        
                        <div class="profile-avatar">
                            <img class="profile-content__img" src='<?php echo $image_src;  ?>' >
                            <label for="avatar" id="profile-avatar__label"><i class="fa fa-camera fa-lg"></i></label>
                            <input class="profile-input" id="avatar" type="file" name="avatar" accept="image/*" value="<?php echo $avatar ?>"><br><br>
                        </div>
                         
                        
                        <label for="profile-name">Name</label><br>
                        <input type="text" class="profile-input" name="profileName" id="profile-name" value="<?php echo $name ?>"><br><br>
                        
                        <label for="profile-gender">Gender</label><br>
                        <select class="profile-input" name="profileGender" id="profile-gender">
                            <option  <?=($gender == "Male") ? 'selected="selected"' : "" ?> value="Male">Male</option>
                            <option  <?=($gender == "Female") ? 'selected="selected"' : "" ?> value="Female">Female</option>
                        </select><br><br>
                        
                        <label for="profile-age">Age</label><br>
                        <input class="profile-input" type="number" name="profileAge" id="profile-age" min="1" max="20" value="<?php echo $age ?>"><br><br>
                        
                        <label for="profile-strong">Strong Points</label><br>
                        <select class="profile-input" name="profileStrong" id="profile-strong">
                            <option  <?=($strong == "StrongPoint1") ? 'selected="selected"' : "" ?> value="StrongPoint1">Strong Point 1</option>
                            <option  <?=($strong == "StrongPoint2") ? 'selected="selected"' : "" ?> value="StrongPoint2">Strong Point 2</option>
                            <option  <?=($strong == "StrongPoint3") ? 'selected="selected"' : "" ?> value="StrongPoint3">Strong Point 3</option>
                            <option  <?=($strong == "StrongPoint4") ? 'selected="selected"' : "" ?> value="StrongPoint4">Strong Point 4</option>
                        </select><br><br>
                        
                        <label for="profile-weak">Weak Points</label><br>
                        <select class="profile-input" name="profileWeak" id="profile-weak">
                            <option  <?=($weak == "WeakPoint1") ? 'selected="selected"' : "" ?> value="WeakPoint1">Weak Point 1</option>
                            <option  <?=($weak == "WeakPoint2") ? 'selected="selected"' : "" ?> value="WeakPoint2">Weak Point 2</option>
                            <option  <?=($weak == "WeakPoint3") ? 'selected="selected"' : "" ?> value="WeakPoint3">Weak Point 3</option>
                            <option  <?=($weak == "WeakPoint4") ? 'selected="selected"' : "" ?> value="WeakPoint4">Weak Point 4</option>
                        </select><br>
                        
                        <label for="profile-likes">Likes</label><br>
                        <select class="profile-input" name="profileLikes" id="profile-likes">
                            <option  <?=($likes == "Likes1") ? 'selected="selected"' : "" ?> value="Likes1">Likes 1</option>
                            <option  <?=($likes == "Likes2") ? 'selected="selected"' : "" ?> value="Likes2">Likes 2</option>
                            <option  <?=($likes == "Likes3") ? 'selected="selected"' : "" ?> value="Likes3">Likes 3</option>
                            <option  <?=($likes == "Likes4") ? 'selected="selected"' : "" ?> value="Likes4">Likes 4</option>
                        </select><br><br>
                        
                        <label for="profile-dislikes">Dislikes</label><br>
                        <select class="profile-input" name="profileDislikes" id="profile-dislikes">
                            <option  <?=($dislikes == "Dislikes1") ? 'selected="selected"' : "" ?> value="Dislikes1">Dislikes 1</option>
                            <option  <?=($dislikes == "Dislikes2") ? 'selected="selected"' : "" ?> value="Dislikes2">Dislikes 2</option>
                            <option  <?=($dislikes == "Dislikes3") ? 'selected="selected"' : "" ?> value="Dislikes3">Dislikes 3</option>
                            <option  <?=($dislikes == "Dislikes4") ? 'selected="selected"' : "" ?> value="Dislikes4">Dislikes 4</option>
                        </select><br><br>
                        
                        <input type="hidden" id="form_name" name="form_name" value="<?=$updateType; ?>">
                        
                        <button type="submit" id="save-profile" name="save-profile" class="button">Save</button>
                    </form>
                    <p id="result"></p>
                
                </div><!-- profiles-content -->
            </div><!-- col__medium-8 -->
            
            <div class="col__medium-10" id="about">
                <div>about</div>
            </div>
            <div class="clear-me"></div>
        </div><!-- row -->
    </div><!-- main-wrapper -->
</div><!-- page-settings -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script src="scripts/settings.js"></script>
<script src="scripts/profiles.js"></script>