<?php include("server.php"); 


if(isset($_POST['mydata'])) {
  $rno=$_SESSION['rollno'];
  
    $sql = "SELECT COURSE_NAME FROM global_electives c,student_details s WHERE c.DEPARTMENT!=s.COURSE_ALLOTTED and s.ROLL_NO='$rno'";

    $res =  $db->query($sql);
  
  if(mysqli_num_rows($res) > 0) {
    echo "<option value=''>------- Select --------</option>";
    while($row = mysqli_fetch_object($res)) {
       
      echo "<option value='$row->COURSE_NAME'>".$row->COURSE_NAME."</option>";
    }
  }
} else {
  header('location: ./');
}
?>