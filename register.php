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
<body >
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
    <select name="course" id="course">
    

    </select>
 
    <input type="button" class="add-row" value="Add Row" onclick="showUser()">
    
    </div>
    
<br><br>
<div class="input-group">
    <input type="button" class="global" value="CHOOSE GLOBAL ELECTIVE" >
    <select name="ge" id="ge" ></select>
 
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
    <tr> <td colspan='3'><input type="button" value="Total Credits"  onclick="calculateSum()" required></td>
    <td ><p id="sum"></p> </tr>
  </tfoot>
    </table>
    <button type="button" class="delete-row" onclick="removerow()">Delete Row</button>
  
    <br><br>
    <input type="button"  value="SAVE" onclick="saveTable()" required></input>
    </div>

<br><br>

<input type="button" value="REDO COURSES" onclick="myFunction()">
    <div id="redo" style="display:none">
<div class="input-group">
<label >COURSE ID:</label>
<input type="text" name="r_cid"  class="form-control" id="rcid" onkeyup="validatercid();">
<span id="rciderr" style="color: red"></span>
</div>
<div class="input-group">
<label >COURSE NAME:</label>
<input type="text" name="r_cname" class="form-control" id="rcname" onkeyup="validatercname();">
<span id="rcnameerr" style="color: red"></span>
</div>
<div>
<label >COURSE CREDIT:</label>
<input type="text" name="r_credit" class="form-control" id="rcredit" onkeyup="validatercredit();">
<span id="rcrediterr" style="color: red"></span>
</div>
<input type="button" name="send" class="btn btn-primary" value="add data" id="butsend">


<table id="table1" name="table1" class="table table-bordered">
<tbody>
<tr>

<th>COURSE ID</th>
<th>COURSE NAME</th>
<th>CREDITS</th>
<th></th>
<tr>
</tbody>
</table>
<input type="button" name="save" class="btn btn-primary" value="Save" id="butsave" required>
</div>

<br><br>

   

  
  	<div class="input-group">
   
  	  <button type="submit" id="btn" name="reg_user">Register</button>
  	</div>
 
  </form>
  <script type="text/javascript">
    function validatercid() {
        var rcid = document.getElementById("rcid").value;
        var rciderr = document.getElementById("rciderr");
        rciderr.innerHTML = "";
        if(rcid == ""){
          rciderr.innerHTML = " REDO COURSE ID should not be empty ";
        }
        var expr = /^([A-Za-z]{1,2}[0-9]{3,4})+$/;
        if (!expr.test(rcid)) {
            rciderr.innerHTML = " INVALID REDO COURSE ID ";
        }
    }
    function validatercname() {
        var rcname = document.getElementById("rcname").value;
        var rcnameerr = document.getElementById("rcnameerr");
        rcnameerr.innerHTML = "";
        var expr = /^[ A-Za-z]+$/
        rcnamelen=rcname.length;
        if( rcname ==""){
          rcnameerr.innerHTML = " REDO COURSE NAME should not be empty ";
        }
        if (!expr.test(rcname)) {
          if(rcnamelen>=50){
            rcnameerr.innerHTML = " Should not be greater than 50 characters ";
          }
          else{
            rcnameerr.innerHTML = "";
          }
            rcnameerr.innerHTML = " INVALID REDO COURSE NAME ";
      }
    }
    function validatercredit() {
        var rcredit = document.getElementById("rcredit").value;
        var rcrediterr = document.getElementById("rcrediterr");
        rcrediterr.innerHTML = "";
        var expr = /^([1-3]{1})+$/;
        if(rcredit == ""){
          rcrediterr.innerHTML = " REDO COURSE CREDIT should not be empty";
        }
        if (!expr.test(rcredit)) {
            rcrediterr.innerHTML = " INVALID REDO COURSE CREDIT ";
        }
    }

    </script>
</body>
</html>