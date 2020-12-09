<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>LOGIN</title>
  <link rel="stylesheet" type="text/css" href="register_style.css">
</head>
<body>
  <div class="header">
  	<h2>Login</h2>
  </div>
	 
  <form method="post" action="testlogin.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>RollNo</label>
  		<input type="text" name="rno" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
	  <?php
	 mysqli_query($db,'TRUNCATE TABLE temp1;');
	 mysqli_query($db,'TRUNCATE TABLE rtemp;');
	  ?>
  </form>
</body>
</html>