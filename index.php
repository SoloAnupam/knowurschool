<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: registration.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: registration.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<title>Know Ur School</title>
<link rel="icon" type="image/x-icon" href="new1/school logo.jpg">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
.w3-bar,h1,button {font-family: "Montserrat", sans-serif}
.fa-anchor,.fa-coffee {font-size:200px}
.imgcontainer {
  text-align: right;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 20%;
  border-radius: 50%;
}
header{
  background-image: url("new1/school2.jpg");
  background-color: #cccccc;
  height: 900px;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}
</style>
<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-black w3-card w3-left-align w3-large"> 
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="index.php" class="w3-bar-item w3-button w3-padding-large w3-white">Home</a>
    <!--<a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Home</a>-->
    <a href="find.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Find</a>
    <a href="contactus.html" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Contact Us</a>
    <a href="aboutus.html" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">About Us</a>
	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3 style="padding-left:900px;">
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" style="font-size:12px; margin-top:-3px; margin-bottom:-5px;">Welcome <strong><?php echo $_SESSION['username']; ?></strong><br>
		<a href="index.php?logout='1'" style="text-decoration:none;">Log Out</a></p>
    <?php endif ?>
    </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
    <!--<a href="#" class="w3-bar-item w3-button w3-padding-large">Home</a>-->
    <a href="find.php" class="w3-bar-item w3-button w3-padding-large">Find</a>
    <a href="contactus.html" class="w3-bar-item w3-button w3-padding-large">Contact Us</a>
    <a href="aboutus.html" class="w3-bar-item w3-button w3-padding-large">About Us</a>
	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p class="w3-bar-item w3-button w3-padding-large">Welcome <strong><?php echo $_SESSION['username']; ?></strong><br>
		<a href="index.php?logout='1'" style="text-decoration:none;">Log Out</a></p>
    <?php endif ?>
  </div>
</div>

<!-- Header -->
<header class="w3-container w3-gray w3-center" style="padding:128px 16px">
  <h1 class="w3-margin w3-jumbo">KNOW UR SCHOOL</h1>
  <p class="w3-xlarge">Find the best school for U :)</p>
  <button class="w3-button w3-black w3-padding-large w3-large w3-margin-top"><a href="getstarted.html" style="text-decoration:none;">Get Started</a></button>
</header>

<!-- First Grid -->
<div class="w3-row-padding w3-padding-64 w3-container">
  <div class="w3-content">
    <div class="w3-twothird">
      <h1>Anupam Yadav</h1>
      <p>I am a creator of this website</p>
    </div>
    <div class="imgcontainer">
    <img src="new1/anupam.jpg" style="height:170px;"alt="Avatar" class="avatar">
  </div>

    <!--<div class="w3-third w3-center">
      <i class="fa fa-anchor w3-padding-64 w3-text-red"></i>
    </div>-->
  </div>
</div>

<!-- Second Grid -->
<div class="w3-row-padding w3-light-grey w3-padding-64 w3-container">
  <div class="w3-content">
    <!--<div class="w3-third w3-center">
      <i class="fa fa-coffee w3-padding-64 w3-text-red w3-margin-right"></i>
    </div>-->

    <div class="w3-twothird">
      <h1>Kuldeep Singh</h1>
      <p>I am moderator of this website.</p>
    </div>
    <div class="imgcontainer">
    <img src="new1/kuldeep.jpg" alt="Avatar" class="avatar">
  </div>
  </div>
</div>

<div class="w3-container w3-black w3-center w3-opacity w3-padding-64">
    <h1 class="w3-margin w3-xlarge">Quote of the day: live life</h1>
</div>

<!-- Footer -->
<footer class="w3-container w3-padding-64 w3-center w3-opacity">  
  <div class="w3-xlarge w3-padding-32">
    <a href="https://www.facebook.com/gaming/Alexboy0786" target="_blank"><i class="fa fa-facebook-official w3-hover-opacity"></a></i>
    <a href="https://www.instagram.com/ay_softalex/" target="_blank"><i class="fa fa-instagram w3-hover-opacity"></a></i>
    <!--<a href="https://www.w3schools.com/w3css/default.asp" target="_blank"><i class="fa fa-snapchat w3-hover-opacity"></a></i>
    <a href="https://www.w3schools.com/w3css/default.asp" target="_blank"><i class="fa fa-pinterest-p w3-hover-opacity"></a></i>-->
    <a href="https://twitter.com/AY_Soft_Alex" target="_blank"><i class="fa fa-twitter w3-hover-opacity"></a></i>
    <a href="https://www.linkedin.com/in/anupam-yadav-a720a7152/" target="_blank"><i class="fa fa-linkedin w3-hover-opacity"></a></i>
 </div>
 <!--<p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>-->
</footer>

<script>
// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>

</body>
</html>
