<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!-- PHP code to establish connection with the localserver -->
<?php
$host = "localhost"; //IP of your database
$userName = "root"; //Username for database login
$userPass = ""; //Password associated with the username
$database = "registration"; //Your database name

$connectQuery = mysqli_connect($host,$userName,$userPass,$database);

if(mysqli_connect_errno()){
    echo mysqli_connect_error();
    exit();
}else{
    $selectQuery = "SELECT * FROM `find` ORDER BY `id` ASC";
    $result = mysqli_query($connectQuery,$selectQuery);
    if(mysqli_num_rows($result) > 0){
    }else{
        $msg = "No Record found";
    }
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
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: center;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
header{
  background-image: url("new1/success.jpg");
  background-color: #cccccc;
  height: 900px;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}

.filter{
  position: relative;
  float: right;
}
</style>
<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-black w3-card w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="index.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Home</a>
    <!--<a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Home</a>-->
    <a href="find.php" class="w3-bar-item w3-button w3-padding-large w3-white">Find</a>
    <a href="contactus.html" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Contact Us</a>
    <a href="aboutus.html" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">About Us</a>
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
    	<p class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" style="font-size:12px; margin-top:-14px; margin-bottom:-5px;">Welcome <strong><?php echo $_SESSION['username']; ?></strong><br>
		<a href="index.php?logout='1'" style="text-decoration:none;">Log Out</a></p>
    <?php endif ?>
  </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
    <!--<a href="#" class="w3-bar-item w3-button w3-padding-large">Home</a>-->
    <a href="index.php" class="w3-bar-item w3-button w3-padding-large">Home</a>
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
  <h1 class="w3-margin w3-jumbo" style="font-weight:bold;">KNOW Ur School</h1>
  <p class="w3-xlarge" style="font-weight:bold;">Find The Best School For You</p>
</header>

<!--<div class="filter">
  <button><a href="filter.html" style="text-decoration: none;">Filter</a></button> 
</div>-->
<?$msg;?>
<table>
  <tr>
	<th>Images</th>
    <th>School Name</th>
    <th>Address</th>
    <th>Contact</th>
    <th>State</th>
    <th>City</th>
    <th>Board</th>
  </tr>
  <!-- PHP CODE TO FETCH DATA FROM ROWS -->
  <tr>
  <?php
  // LOOP TILL END OF DATA
  while($row = mysqli_fetch_assoc($result))
  {
                $query = "SELECT * FROM images ORDER BY id DESC";
                     echo '  
                               <td>  
                                    <img src="data:image/jpeg;base64,'.base64_encode($row['img'] ).'" height="200" width="200" class="img-thumnail">  
                               </td>
                     ';
                ?>  
  <td><?php echo $row['School_name'];?></td>
  <td><?php echo $row['address'];?></td>
  <td>0<?php echo $row['contact'];?></td>
  <td><?php echo $row['State'];?></td>
  <td><?php echo $row['city'];?></td>
  <td><?php echo $row['Board'];?></td>
</tr>
<?php
  }
?>
</table>
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