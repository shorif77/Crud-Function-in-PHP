<?php include('server.php') ;
?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <div class="header">
	  <h2>Login</h2>
</div>
	
  <form method="post" action="login.php">
  <center>
  <img src="imgs/avatar.png" class= "img"></img></center> <!--set image in login foem-->
  	<div class="input-group">
	 <!-- modified login form fields-->
  	  <label>Username</label>
  	  <input type="text" name="username">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password">
  	</div>
  	
  	<div class="input-group">
  	  <button type="submit"  name="login" class="btu">login</button> <!-- login button set -->
  	</div>
      <p>
  		Not  a member? <a href="register.php">Sign up</a>
  	</p>
  </form>
</body>
</html>