
<?php 

include('server.php');
  ?>
<!DOCTYPE html>
<html>
<head>
<title>Confirmation</title>
<style>
  table {
      margin-left:10%;
      margin-right:10%;
        width: 80%;
        border-collapse: collapse;
    }
    table tr td,
    table tr th {
        border: 1px solid black;
        padding: 25px;
    }

</style>

</head>
<body>
<form method="post" >
   <div class="header">
  	<h2>COURSE REGISTRATION</h2>
  </div>
  <?php echo "1. Programme of Study : " . $_SESSION["prgofstudy"] . "<br>"; ?>
  <?php echo "2. Whether paid <br> a.Institute/Hostel fees : " . $_SESSION["feestatus"] . "<br>"; ?>
  <?php echo "b. Other Dues : " . $_SESSION["otherdues"] . "<br>"; ?>
  <?php echo "3.Semester : " . $_SESSION["semester"] . "<br>"; ?>
  <?php 
  $rno=$_SESSION["rollno"];
    $sql="SELECT * FROM student_details WHERE 	ROLL_NO='$rno'";
    $result = mysqli_query($db,$sql);
    $row=mysqli_fetch_array($result);
    $name=$row['NAME_OF_CANDIDATE_10TH'];
    $address=$row['ADDRESS'];
    $mno=$row['MOB_NO'];
    $email=$row['EMAIL_ID'];
  
    $_SESSION["name"]=$name;
    $_SESSION["address"]=$address;
    $_SESSION["mno"]=$mno;
    $_SESSION["email"]=$email;
  ?>
 <?php echo "4.Course registered : "; ?>
 <br><br>
  <table>
        <thead id="myh">

        </thead>
        <tbody id="txtHint"> 
        <?php
          $query = "SELECT * FROM temp1"; //You don't need a ; like you do in SQL
          $result = mysqli_query($db,$query);

          echo "<table>"; // start a table tag in the HTML
          echo "<tr>";
          echo "<th>COURSE_ID</th>";
          echo "<th>COURSE NAME</th>";
          echo "<th>CREDITS</th>";
          
          echo "</tr>";

          while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
          echo "<tr><td>" . $row['cid'] . "</td><td>" . $row['cname'] . "</td> <td>" . $row['credit'] . "</td></tr>";  
          }
          echo " <tfoot>
          <tr> <td colspan='3'>TOTAL CREDITS:" . $_SESSION["tcred"] . "</td> </tr>
        </tfoot>";

          echo "</table>"; //Close the table in HTML
        ?>
        </tbody>
        </table>
        <?php echo "5.Redo Courses : "; ?>
 <br><br>
  <table>
        <thead id="myh">

        </thead>
        <tbody id="redotbl"> 
        <?php
          $query = "SELECT * FROM rtemp"; //You don't need a ; like you do in SQL
          $result = mysqli_query($db,$query);
          echo "<table>"; // start a table tag in the HTML
          echo "<tr>";
          echo "<th>COURSE ID</th>";
          echo "<th>COURSE NAME</th>";
          echo "<th>CREDIT</th>";  
          echo "</tr>";
          if($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
          echo "<tr><td>" . $row['rcid'] . "</td><td>" . $row['rcname'] . "</td> <td>" . $row['rcredit'] . "</td></tr>";  
          }
          else{
            echo "<tr style='text-align:center;font-weight:bold;'><td colspan='3'>No REDO COURSES</td></tr>";
          }
          echo "</table>"; //Close the table in HTML
        ?>
        </tbody>
        </table>
  
        <button type="submit" class="btn" name="confirm">Confirm</button>
    	</div>
        
        


</form>


            <span><button onclick="goBack()">Back</button></span>
            <script>
function goBack() {
  window.history.back();
}
</script>
</body>
</html>
