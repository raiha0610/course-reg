<?php include("server.php"); ?>

<?php
if(isset($_POST['c_id'])) {
   $cid= mysqli_real_escape_string($db, $_POST['c_id']);
 
    $sql = "SELECT COURSE_CREDIT FROM course WHERE COURSE_ID='$cid'";

    $result =  mysqli_query($db, $sql);
  
  if(mysqli_num_rows($result) > 0) {
  
    while($row = mysqli_fetch_object($result)) {
       
      echo "<option value='$row->COURSE_CREDIT'>".$row->COURSE_CREDIT."</option>";
    }
  }
} else {
  header('location: ./');
}
?>