
<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
<title>Register or LogIn</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="hero">
<div class="form-box">
<div class="button-box">
<div id="btn"></div>
<button type="button" class="toggle-btn" onclick="login()">LogIn</button>
<button type="button" class="toggle-btn" onclick="register()">Register</button>
</div>
<div class="social-icons">
<img src="fb.png">
<img src="tw.png">
<img src="gg.png">
</div>
<form action="registration.php" method="post" id="login" class="input-group">
<?php include('errors.php'); ?>
<input type="email" class="input-field" placeholder="Enter Email" name="email" required>
<input type="password" class="input-field" placeholder="Password" name="password" required>
<input type="checkbox" class="check-box"><span>Remember Me</span>
<button type="submit" class="submit-btn" name="login_user">Log In</button>
</form>
<form action="registration.php" method="post" id="register" class="input-group">
<input type="text" class="input-field" placeholder="Enter Name" name="username" required>
<input type="email" class="input-field" placeholder="Enter Email" name="email" required>
<input type="password" class="input-field" placeholder="Password" name="password_1" required>
<input type="password" class="input-field" placeholder="Confirm Password" name="password_2" required>
<input type="checkbox" class="check-box"><span>I agree to the terms & conditions</span>
<button type="submit" class="submit-btn" name="reg_user">Register</button>
</form>
</div>
</div>
<script>
var x = document.getElementById("login");
var y = document.getElementById("register");
var z = document.getElementById("btn");

function register(){
	x.style.left = "-400px";
	y.style.left = "50px";
	z.style.left = "110px";
}
function login(){
	x.style.left = "50px";
	y.style.left = "450px";
	z.style.left = "0";
}
</script>
</body>
</html>