<?php include('server.php');?>

<!DOCTYPE html>
<html>
<head>
<style type="text/css">
    table {
        width: 100%;
        border-collapse: collapse;
    }
    table tr td,
    table tr th {
        border: 1px solid black;
        padding: 25px;
    }
    .hide{
        visibility:hidden;
    }
</style>
  <title>COURSE REGISTRATION</title>
  <script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="ajax.js"></script>
<script type="text/javascript" src="ajax1.js"></script>
<script type="text/javascript" src="ajax2.js"></script>
<script>
    $(document).ready(function(){
        $(".add-row").click(function(){
            var cname = $("#course").val();
            var cid = $("#cid").val();   
            var credit=$("#credit").val();    
               
            var markup = "<tr><td><input type='checkbox' name='record'></td><td>" + cid +"</td><td>"+cname+"</td><td>"+credit+ "</td></tr>";
            $("table tbody").append(markup);
        });
    
        
        // Find and remove selected table rows
        $(".delete-row").click(function(){
            $("table tbody").find('input[name="record"]').each(function(){
            	if($(this).is(":checked")){
                    $(this).parents("tr").remove();
                }
            });
        });
    });    
</script>
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
      <p><?php echo $rno?></p>
      <div class="input-group">
      <h2>WHETHER PAID</h2><br>
      <label >a. INSTITUTE/HOSTEL FEE</label><br>
      <input type="radio" id="fee" name="fee" value="paid">paid
      <input type="radio" id="fee" name="fee" value="not paid" >not paid
      <br>
      <label >b. OTHER FEE</label><br>
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

<br><br>
<label>COURSE :</label>
    <select name="course" id="course" required></select>
 
   <input type="button" class="fetch" value="Fetch course">
    <input type="button" class="add-row" value="Add Row">

    <div class='hide'>
    
    <select name="cid" id="cid" ></select>
 
    
    <select name="credit" id="credit"></select>
    </div>

    
    </div>
    <div class="c-info"></div>
    <input type="button" class="global" value="CHOOSE GLOBAL ELECTIVE">
    <select name="ge" id="ge" required></select>

     <br><br>
     <table>
        <thead>
            <tr>
                <th>Select</th>
                <th>COURSE_ID</th>
                <th>COURSE NAME</th>
                <th>CREDITS</th>
                
            </tr>
        </thead>
        <tbody>
           
        </tbody>
    </table>
    <button type="button" class="delete-row">Delete Row</button>


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