<?php
include 'header.php';
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
                    <form class="signup-form" action="signup.php" method="POST">
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
                <div div class="profiles-min-content">
                    <img class="profiles-min__img" src="images/avatar.png">
                    <img class="profiles-min__img" src="images/avatar.png">
                    <img class="profiles-min__img" src="images/avatar.png">
                    <img class="profiles-min__img" src="images/avatar.png">
                </div>
            </div><!-- col__medium-2 -->
            
            <div class="col__medium-8" id="profiles">
                <div class="profiles-content">
                    <form div class="" action="/LearningApp/includes/profiles.php" method="POST">
                        <span>Name</span><input type="text" name="name"><br>
                        <span>Gender</span>
                        <input type="radio" name="gender" checked="checked" value="male">Male
                        <input type="radio" name="gender" value="female">Female<br>
                        <span>Age:</span><input type="number" name="quantity" min="1" max="20"><br>
                        <button type="submit">Save</button>
                    </form>
                
                </div><!-- profiles-content -->
            </div><!-- col__medium-8 -->
            
            <div class="col__medium-10" id="about">
                <div>about</div>
            </div>
            <div class="clear-me"></div>
        </div><!-- row -->
    </div><!-- main-wrapper -->
</div><!-- page-settings -->
<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
<script src="scripts/settings.js"></script>