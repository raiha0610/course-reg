<?php include("server.php"); 


if(isset($_POST['mydata'])) {
   $sem=mysqli_real_escape_string($db, $_POST['mydata']);
   $rno=$_SESSION['rollno'];
  
    $sql = "SELECT * FROM course c,student_details s WHERE c.SEMESTER='$sem' and c.DEPARTMENT=s.COURSE_ALLOTTED and s.ROLL_NO='$rno' ";

    $res =  $db->query($sql);
    
  
  if(mysqli_num_rows($res) > 0) {
    echo "<option value=''>------- Select --------</option>";
    while($row = mysqli_fetch_object($res)) {
       
      echo "<option value='$row->COURSE_NAME'>".$row->COURSE_ID." ".$row->COURSE_NAME."</option>";
    }

  }
} else {
  header('location: ./');
}
?>