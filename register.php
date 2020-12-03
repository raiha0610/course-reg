<?php include('server.php');?>

<!DOCTYPE html>
<html>
<head>
<style>
table {
        width: 100%;
        border-collapse: collapse;
    }
    table tr td,
    table tr th {
        border: 1px solid black;
        padding: 25px;
        text-align:center;
    }
</style>
  <title>COURSE REGISTRATION</title>
  <script type="text/javascript" src="jquery.min.js"></script>

  <script type="text/javascript" src="ajax.js"></script>
  <script type="text/javascript" src="ajax3.js"></script>
  <script type="text/javascript" src="test.js"></script>
  <script type="text/javascript" src="global.js"></script>

  <script type="text/javascript" src="redocourse.js"></script>




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
     <br><br>
      <div class="input-group">
      <label>WHETHER PAID</label><br>
      <label >a. INSTITUTE/HOSTEL FEE</label><br>
      <input type="radio" id="fee" name="fee" value="paid">paid
      <input type="radio" id="fee" name="fee" value="not paid" >not paid
      <br>
      <label >b. OTHER FEE</label><br>
      <input type="radio" id="dues" name="dues" value="paid">paid
      <input type="radio" id="dues" name="dues" value="not paid" >not paid
      </div><br><br>
      <div class="input-group">
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
</div>
<br><br>
<div class="input-group">
<label>COURSE :</label>
    <select name="course" id="course" required></select>
 
    <input type="button" class="add-row" value="Add Row" onclick="showUser()">
    
    </div>
    
<br><br>
<div class="input-group">
    <input type="button" class="global" value="CHOOSE GLOBAL ELECTIVE" >
    <select name="ge" id="ge" required></select>
 
    <input type="button"  value="Add" onclick="showglobal()">
   </div>
     <br><br>
     <div class="input-group">
     <table id="table" >
        <thead id="myh">
            <tr>
                <th>Select</th>
                <th>COURSE_ID</th>
                <th>COURSE NAME</th>
                <th>CREDITS</th>
                
            </tr>
        </thead>
      
        <tfoot>
    <tr> <td colspan='3'><input type="button" value="Total Credits" onclick="calculateSum()"></td><td ><p id="sum"></p></td> </tr>
  </tfoot>
    </table>
    <button type="button" class="delete-row" onclick="removerow()">Delete Row</button>
  
    <br><br>

    </div>
    <div class="input-group">
    <p>
<input type="button" value="CHOOSE REDO COURSES" onclick="createTable()" />
</p>
<div id="cont"></div>     
<p>
<input type="button" id="addRow" value="Add New Row" onclick="newRow()" />
</p>
​</div>
    
    
<br><br>

      
  
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
 
  </form>
</body>
</html>
