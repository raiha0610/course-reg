
<?php 
include('server.php');
  ?>
<style>
<?php include 'register_style.css'; ?>
</style>


<!DOCTYPE html>
<html>
<head>

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Amaranth&display=swap" rel="stylesheet">

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
        border: .1vw solid black;
        padding: 1.41vw;
    }

    table tr th {
        border: .1vw solid white;
    }
    
    form
{
        background-color:#f8f8f8;
}

  </style>

</head>
<body>
<form method="post" >
   <div class="header">
  	<center><h2>COURSE REGISTRATION</h2></center>
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
 <?php echo "4.Courses registered : "; ?>
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
          
        ?>
           <tfoot>
          <tr> <td colspan='2'>TOTAL CREDITS:</td> 
          <td> <?php $qry="SELECT SUM(credit) AS vsum FROM temp1";
          $res=mysqli_query($db,$qry);
          $tc=mysqli_fetch_array($res);
          echo $tc['vsum'];

          ?></td></tr>
        </tfoot>
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
        </table><br>
          <div class="back" >
        <button type="submit" class="btn" name="confirm">Confirm  &raquo;</button>
        </div>
    	</div>

     
     

        
        


</form>
<span><button onclick="goBack()" class="btn">&laquo; Back</button></span> 
            <script>
function goBack() {
  window.history.back();
}
</script>
</body>
</html>
