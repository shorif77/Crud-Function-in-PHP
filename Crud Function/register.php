<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system </title>
  <link rel="stylesheet" type="text/css" href="styles.css">  <!---link styles.css page-->
</head>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form method="post" action="register.php">
  <center>
  <img src="imgs/avatar.png" class= "img"></img></center> <!--set image in registration foem-->
  <!-- modified registre form fields-->
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>" >
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="confirm password">
  	</div>
	    <!-- image set -->
	  <label for="Image"><b>Image</b></label>
      <input type="file" name= "Image" >
       <hr>
  	<div class="input-group">
  	  <button type="submit"  name="register" class="btu">Register</button> <!-- registre button set -->
  	</div>
      <p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>
</body>
</html>