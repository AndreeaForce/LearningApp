<?php
session_start();
include_once ($_SERVER['DOCUMENT_ROOT']."header.php");
include_once ($_SERVER['DOCUMENT_ROOT']."includes/delete-account.php");

?>

<div class="page-section" id="settings">
    <div class="main-wrapper">
        <div class="row">

            <div class="col__medium-2">
                <ul class="settings__ul">
                    <span class="settings--title">SETTINGS</span>
                    <li class="settings__li settings__li--top-margin" id="settings__li1">Account</li>
                        <div class="horizontal-line">
                            <ul class="settings__account">
                                <li class="settings__account__li--username" id="settings__li1__username">Username</li>
                                <li class="settings__account__li--username" id="settings__li2__email">Email</li>
                                <li class="settings__account__li--username" id="settings__li3__psw">Password</li>
                                <li class="settings__account__li--username" id="settings__li4__npsw">New Password</li>
                                <li class="settings__account__li--username" id="settings__li5__cpsw">Confirm Password</li>
                                <li class="settings__account__li--username" id="settings__li6__sounds">Sounds</li>
                                <?php while($row = mysqli_fetch_array($result))
                                echo "<li><a href='/includes/delete-account.php?del=$row[id]'>Deactivate Account</a></li>"?>
                            </ul>
                        </div>
                    <li class="settings__li" id="settings__li2">Profiles</li>
                        <div class="horizontal-line"></div>
                    <li class="settings__li" id="settings__li3">Security</li>
                        <div class="horizontal-line"></div>
                    <li class="settings__li" id="settings__li4">Notifications</li>
                        <div class="horizontal-line"></div>
                    <li class="settings__li" id="settings__li5">About</li>
                        <div class="horizontal-line"></div>
                    <form class="logout" action="/includes/logout-form.php" method="POST">
                        <button type="submit" class="settings__li button--no-btn" name="submit">Logout</button>
                    </form>
                </ul><!-- settings-ul -->
            </div><!-- col__medium-2 -->
        </div>
    </div><!-- main-wrapper -->
</div><!-- page-settings -->
<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
<script src="/scripts/settings.js"></script>