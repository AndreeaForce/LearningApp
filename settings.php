<?php
include 'header.php';
include dirname(__FILE__).'/settings/profiles.php';

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
    /*if($da = mysqli_num_rows($sql)) {
       print_r($da);
    }*/

    while ($result = mysqli_fetch_assoc($sql)) {
        $name = $result['profile_name'];
        $gender = $result['profile_gender'];
        $age = $result['profile_age'];
        $id = $result['profile_id'];
        $updateType ="edit_user";
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
                    <form class="signup-form" action="/LearningApp/signup.php" method="POST">
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
                        <button type="button" name="add-profile" id="add-profile" class="button button-add">Add</button>
                    </div>
                    <div class="avatar-table">
                        <table class="table table-avatar">
                            <tbody id="userData">
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
                            <tr>
                                <td>
                                    <div class="profile-avatar">
                                        <img class="profile-avatar__img" src='<?php echo $image_src;  ?>' >
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><?php echo $row["profile_name"]; ?></td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="/LearningApp/settings.php?edit=<?php echo $row['profile_id'] ?>" id="<?php echo $row['profile_id'] ?>" class="button button--edit-profile"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    
                                    <a href="/LearningApp/settings.php?edit=<?php echo $row['profile_id'] ?>" id="<?php echo $row['profile_id'] ?>" class="button button--edit-profile"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                    
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
                    </div><br>
                    <form id="insert-profile" class="insertProfile">
                        <input type="hidden" id="profileId" name="profileId" value="<?php echo $id ?>">
                        
                        <label for="profile-name">Name</label><br>
                        <input type="text" name="profileName" id="profile-name" value="<?php echo $name ?>"><br><br>
                        
                        <label for="profile-gender">Select Gender</label><br>
                        <select name="profileGender" id="profile-gender">
                            <option  <?=($gender == "Male") ? 'selected="selected"' : "" ?> value="Male">Male</option>
                            <option <?=($gender == "Female") ? 'selected="selected"' : "" ?> value="Female">Female</option>
                        </select><br><br>
                        
                        <label> Select Age</label><br>
                        <input type="number" name="profileAge" id="profile-age" min="1" max="20" value="<?php echo $age ?>"><br><br>
                        <input  id="avatar" type="file" name="avatar" accept="image/*" value="<?php echo $avatar ?>"><br><br>
                        
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