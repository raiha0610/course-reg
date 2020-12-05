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
  <script type="text/javascript" src="globals.js"></script>
  
  <script type="text/javascript" src="redocourse.js"></script>




</head>
<body>
  <div class="header">
  	<h2>COURSE REGISTRATION</h2>
  </div>
	
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
    <div class="input-group">
          <div class="radiobtn">
                <label >PROGRAMME OF STUDY</label>
                <input type="radio" id="pos" name="pos" 
                <?php if (isset($pos) && $pos=="Btech") echo "checked";?> value="Btech" >Btech
                <input type="radio" id="pos" name="pos"
                <?php if (isset($pos) && $pos=="Mtech") echo "checked";?> value="Mtech" >Mtech
                <input type="radio"  id="pos" name="pos" 
                <?php if (isset($pos) && $pos=="Phd") echo "checked";?> value="Phd" >PHD
                <br><br>
           </div> 
        </div>
     <br><br>
     <div class="input-group">
            <div class="radiobtn">
                    <label>WHETHER PAID</label><br>
                    <label >a. INSTITUTE/HOSTEL FEE</label>
                    <input type="radio" id="fee" name="fee" 
                    <?php if (isset($fee) && $fee=="Paid") echo "checked";?> value="Paid">Paid
                    <input type="radio" id="fee" name="fee" 
                    <?php if (isset($fee) && $fee=="Not paid") echo "checked";?> value="Not paid" >Not paid
                    <br>
                    <label >b. OTHER DUES</label>
                    <input type="radio" id="dues" name="dues"
                    <?php if (isset($dues) && $dues=="Paid") echo "checked";?> value="Paid">Paid
                    <input type="radio" id="dues" name="dues"
                    <?php if (isset($dues) && $dues=="Not paid") echo "checked";?> value="Not paid" >Not paid
                    <br><br> 
                </div>
            </div>
            <br><br>
      <div class="input-group">
      <label >SEMESTER</label>
<br>      <select name="sem" id="sem" >
  <option selected value="base">SELECT SEMESTER</option>
  <option  <?php if($sem == '1') echo "selected"; ?> value="1">1</option>
        <option  <?php if($sem == '2') echo "selected"; ?>  value="2">2</option>
        <option  <?php if($sem == '3') echo "selected"; ?> value="3">3</option>
        <option  <?php if($sem == '4') echo "selected"; ?>  value="4">4</option>
        <option  <?php if($sem == '5') echo "selected"; ?>  value="5">5</option>
        <option  <?php if($sem == '6') echo "selected"; ?>  value="6">6</option>
        <option  <?php if($sem == '7') echo "selected"; ?>  value="7">7</option>
        <option  <?php if($sem == '8') echo "selected"; ?> value="8">8</option>
  
</select>
</div>
<br><br>
<div class="input-group">
<label>COURSE :</label>
    <select name="course" id="course" required>
    
    </select>
 
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
     <table id="c-table" >
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
    <button type="button" id="butsave" name="save" onclick="saveTable()">Save</button>
  	  <button type="submit" id="btn" name="reg_user">Register</button>
  	</div>
 
  </form>
</body>
</html>