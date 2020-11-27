<?php include('server.php') ?>

<!DOCTYPE html>
<html>
<head>
  <title>COURSE REGISTRATION</title>
  <script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="ajax.js"></script>
 
</head>
<body>
  <div class="header">
  	<h2>COURSE REGISTRATION</h2>
  </div>
	
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  
      <div class="input-group">
      <label >PROGRAM OF STUDY</label><br>
      <input type="radio" id="pos" name="pos" value="btech" >Btech
      <input type="radio" id="pos" name="pos" value="mtech" >Mtech
      <input type="radio"  id="pos" name="pos" value="phd" >PHD

      </div>
      <div class="input-group">
      <h2>WHETHER PAID</h2><br>
      <label >a. INSTITUTE/HOSTEL FEE</label><br>
      <input type="radio" id="fee" name="fee" value="paid">paid
      <input type="radio" id="fee" name="fee" value="not paid" >not paid
      <br>
      <label >a. OTHER FEE</label><br>
      <input type="radio" id="dues" name="dues" value="paid">paid
      <input type="radio" id="dues" name="dues" value="not paid" >not paid
      </div><br><br>
      <label >SEMESTER</label>
<br>      <select name="sem" id="sem" >
  <option selected value="base">SELECT SEMESTER</option>
  <option  value="1">1</option>
  <option   value="2">2</option>
  <option   value="3">3</option>
  <option   value="4">4</option>
  <option   value="5">5</option>
  <option   value="6">6</option>
  <option   value="7">7</option>
  <option  value="8">8</option>
  
</select>
<p id="demo"></p>
<br><br>
<label>COURSE :</label>
    <select name="course" id="course">
    <option>------- Select --------</option>
    </select>

     <br><br>
      <div class="input-group">
      <label >DATE</label>
      <input type="date"  name="dor" value="<?php echo $dor; ?>">
      </div>
  
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
 
  </form>
</body>
</html>