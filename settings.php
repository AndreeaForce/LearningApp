<?php
include 'header.php';
//include dirname(__FILE__).'/settings/profiles.php';
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
                                <td colspan="2">
                                    <img class="profile-avatar__img" src='<?php echo $image_src;  ?>' >
                                </td>
                        
                                <td colspan="2">
                                    <?php echo $row["profile_name"]; ?>
                                </td>
                        
                                <td>
                                    <button type="button" name="edit-profile" value="edit" id="<?php echo $row['profile_id'] ?>" class="button button--edit-profile"><i class="fa fa-pencil" aria-hidden="true"></i>
                                    </button>
                                </td>
                                <td>
                                    <button type="button" name="delete-profile" value="delete" id="<?php echo $row['profile_id'] ?>" class="button button--edit-profile"><i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </button>
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
                    
                    <form id="insert-profile" class="insertProfile" action="/LearningApp/settings/profiles.php" method="POST">
                        
                        <input type="hidden" id="profileId" name="profileId" value="">
                        
                        <label for="profileName">Name</label><br>
                        <input type="text" name="profileName" id="profileName" class=""><br><br>
                        
                        <label for="profileGender">Select Gender</label><br>
                        <select name="profileGender" id="profileGender" class="">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select><br><br>
                        
                        <label> Select Age</label><br>
                        <input type="number" name="profileAge" id="profileAge" class="" min="1" max="20"><br><br>
                        <input  id="avatar" type="file" name="avatar" accept="image/*"><br><br>
                        
                        <input type="hidden" id="formName" name="formName" value="add_user">
                        
                        <button type="submit" id="saveProfile" name="saveProfile" class="button" valus="Save"></button>
                    </form><br>
                    
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
