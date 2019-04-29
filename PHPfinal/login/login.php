<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
 
	 <link rel="stylesheet" type="text/css" href="style.css">
	 <link rel="stylesheet" type="text/css" href="../wedding.css">
</head>
<body>
  <div class="header">
  	<h2>Login</h2>
  </div>
	<div class="headerArea">
				<div class="topnav" id="myTopnav">
					  <a href="../weddingPHP.html" class="active">Home</a>
					  <a href="../weddingParty.html">The Wedding Party</a>
					  <a href="../theVenue.html">The Venue</a>
					  <a href="login.php">Sign In!</a> 
					  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
				</div>
			</div>
	
	 
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p>
		Not yet a member? <a href="register.php">Sign up</a></br>
	 <a href="administration/login.php">Admin login</a>
  	</p>
  </form>
</body>
</html>