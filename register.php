<?php include('server.php');?>
<style>
<?php include 'register_style.css'; ?>
</style>

<!DOCTYPE html>
<html>
<head>

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Amaranth&display=swap" rel="stylesheet">

  <title>COURSE REGISTRATION</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <script type="text/javascript" src="jquery.min.js"></script>

  <script type="text/javascript" src="ajax.js"></script>
  <script type="text/javascript" src="ajax3.js"></script>
  <script type="text/javascript" src="test.js"></script>
  <script type="text/javascript" src="globals.js"></script>  
  <script type="text/javascript" src="redocourse.js"></script>

</head>
<body >
  
	
  <form method="post" action="register.php">
  <div class="header">
  	<center><h2>COURSE REGISTRATION</h2></center>
  </div>
  	<?php include('errors.php'); ?>
    <div class="input-group">
          <div class="radiobtn">
                <label >PROGRAMME OF STUDY:</label><br>
                <div class="sp">
                <input type="radio" id="pos" name="pos" class="radio"
                <?php if (isset($pos) && $pos=="Btech") echo "checked";?> value="Btech" >Btech
                <input type="radio" id="pos" name="pos" class="radio"
                <?php if (isset($pos) && $pos=="Mtech") echo "checked";?> value="Mtech" >Mtech
                <input type="radio"  id="pos" name="pos" class="radio"
                <?php if (isset($pos) && $pos=="Phd") echo "checked";?> value="Phd" >PHD
                </div> 
           </div> 
        </div>
     <br><br>
     <div class="input-group">
            <div class="radiobtn">
                    <label>WHETHER PAID:</label><br><br>
                    <label >a. INSTITUTE/HOSTEL FEE</label><br>
                    <input type="radio" id="fee" name="fee" class="radio"
                    <?php if (isset($fee) && $fee=="Paid") echo "checked";?> value="Paid">Paid
                    <input type="radio" id="fee" name="fee" class="radio"
                    <?php if (isset($fee) && $fee=="Not paid") echo "checked";?> value="Not paid" >Not paid
                    <br><br>
                    <label >b. OTHER DUES</label><br>
                    <input type="radio" id="dues" name="dues" class="radio"
                    <?php if (isset($dues) && $dues=="Paid") echo "checked";?> value="Paid">Paid
                    <input type="radio" id="dues" name="dues" class="radio"
                    <?php if (isset($dues) && $dues=="Not paid") echo "checked";?> value="Not paid" >Not paid
                    
                </div>
            </div>
            <br><br>
      <div class="bg" class="input-group">
      <label >SEMESTER:</label><br>
      
    <select name="sem" id="sem" >
        <option class="dropbtn" selected value="-1">SELECT SEMESTER:</option>
        
        <option  value="1">1</option>
        <option   value="2">2</option>
        <option   value="3">3</option>
        <option    value="4">4</option>
        <option    value="5">5</option>
        <option   value="6">6</option>
        <option  value="7">7</option>
        <option   value="8">8</option>
        
</select>

</div>
<br>
<div class="bg" class="input-group">
<label>COURSE:</label><br>
    <select name="course" id="course">
    

    </select>
 
    <input type="button" class="add-row" value="Add Row" onclick="showUser()">
    
    </div>
    
<br>
<div class="bg" class="input-group">
    <input type="button" class="global" value="Choose Global Elective" >
    <select name="ge" id="ge" ></select>
 
    <input type="button" class="add" value="Add" onclick="showglobal()">
   </div>
     <br>
     <div class="input-group">
       <div  class="bg">
     <table id="c-table" class="table table-bordered" >
        <thead id="myh">
            <tr>
                <th>SELECT</th>
                <th>COURSE ID</th>
                <th>COURSE NAME</th>
                <th>CREDITS</th>
                
            </tr>
        </thead>
      
        <tfoot>
    <tr> <td colspan='3'><input type="button" class="total_credits" value="Total Credits"  onclick="calculateSum()" required></td>
    <td ><p id="sum"></p> </tr>
  </tfoot>
    </table>
</div><br>
<div  class="bg">
    <button type="button" class="delete-row" onclick="removerow()">Delete Row</button></div>
  
    <br>
    <div  class="bg">
    <input type="button" class="save" value="Save" onclick="saveTable()" required></input>
    </div></div>

<br>
<div  class="bg">
<input type="button" class="redo_courses" value="Redo Courses" onclick="myFunction()">
    <div id="redo" style="display:none">
<div class="input-group"><br>
<label >COURSE ID:</label>
<input type="text" name="r_cid" class="textbox" class="form-control" id="rcid" onkeyup="validatercid();">
<span id="rciderr" style="color: red"></span>
</div>
<div class="input-group"><br>
<label >COURSE NAME:</label>
<input type="text" name="r_cname" class="textbox" class="form-control" id="rcname" onkeyup="validatercname();">
<span id="rcnameerr" style="color: red"></span>
</div>
<div><br>
<label >COURSE CREDIT:</label>
<input type="text" name="r_credit" class="textbox" class="form-control" id="rcredit" onkeyup="validatercredit();">
<span id="rcrediterr" style="color: red"></span>
</div><br>
<input type="button" name="send" class="bton" value="Add data" id="butsend">


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
<input type="button" name="save" class="bton" value="Save" id="butsave" >
</div></div>

<br>

   

  
  	<div class="input-group">
   
     <center> <button  class="button button1" type="submit" id="btn" name="reg_user">REGISTER</button></center>
     
  	</div>
 
  </form>
  <script type="text/javascript">
    function validatercid() {
        var rcid = document.getElementById("rcid").value;
        var rciderr = document.getElementById("rciderr");
        rciderr.innerHTML = "";
        if(rcid == ""){
          rciderr.innerHTML = " **REDO course ID should not be empty ";
        }
        var expr = /^([A-Za-z]{1,2}[0-9]{3,4})+$/;
        if (!expr.test(rcid)) {
            rciderr.innerHTML = " **Invalid REDO Course ID ";
        }
    }
    function validatercname() {
        var rcname = document.getElementById("rcname").value;
        var rcnameerr = document.getElementById("rcnameerr");
        rcnameerr.innerHTML = "";
        var expr = /^[ A-Za-z]+$/
        rcnamelen=rcname.length;
        if( rcname ==""){
          rcnameerr.innerHTML = " **REDO course name should not be empty ";
        }
        if (!expr.test(rcname)) {
          if(rcnamelen>=50){
            rcnameerr.innerHTML = " **Should not be more than 50 characters ";
          }
          else{
            rcnameerr.innerHTML = "";
          }
          rcnameerr.innerHTML = "**Invalid REDO Course name";
      }
    }
    function validatercredit() {
        var rcredit = document.getElementById("rcredit").value;
        var rcrediterr = document.getElementById("rcrediterr");
        rcrediterr.innerHTML = "";
        var expr = /^([1-3]{1})+$/;
        if(rcredit == ""){
          rcrediterr.innerHTML = " **REDO course credit should not be empty";
        }
        if (!expr.test(rcredit)) {
            rcrediterr.innerHTML = " **Invalid REDO Course credit ";
        }
    }

    </script>
</body>
</html>