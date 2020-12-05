
<?php 
  session_start(); 
include('connect.php');
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
 
  <table>
        <thead id="myh">
            <tr>
                <th>COURSE_ID</th>
                <th>COURSE NAME</th>
                <th>CREDITS</th>
                
            </tr>
        </thead>
        <tbody id="txtHint"> 
         
        </tbody>
        </table>
        <p id="demo"></p> 
  
        <button type="submit" class="btn" name="confirm">Confirm</button>
    	</div>
        <?php if (isset($_POST['confirm'])) {
            header('location: printpg.php');
        }
        ?>


</form>


            <span><button onclick="goBack()">Back</button></span>
            <script>
function goBack() {
  window.history.back();
}
</script>
</body>
</html>
