<?php
	//session_start();

    include dirname(__FILE__).'/includes/signup-form.php';
?>
<?php
include 'header.php';
?>
<section class="main-container">
	<div class="main-wrapper">
		<h2>Signup</h2>
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
</section>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script src="scripts/script.js"></script>
</body>
</html>
    