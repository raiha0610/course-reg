<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Amaranth&display=swap" rel="stylesheet">

  <title>LOGIN</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" type="text/css" href="login_style.css">

</head>
<body>

<div class="flex-container">
  	
 	<form method="post" action="testlogin.php" name="login">
  <div class="header">
  	<center><h2>Login</h2></center>
  </div>
  <div class="contain">
  	<?php include('errors.php'); ?>
  	<div id="labels">
		  <label>Roll No. :</label><br>
  		<label>Password :</label>
  	</div>
  	<div id="inputs">
		  <input type="text" name="rno" class="textbox" >
  		<input type="password" name="password" class="textbox" >
	  </div></div>
	

  	<div class="clear">
	<br>  <center><button type="submit" class="button button1" name="login_user">Login</button></center>
  	</div>
	  <?php
	 mysqli_query($db,'TRUNCATE TABLE temp1;');
	 mysqli_query($db,'TRUNCATE TABLE rtemp;');
	  ?>
  </form></div>
</body>
</html>