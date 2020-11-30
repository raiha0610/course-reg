<?php include("server.php"); ?>

<?php
if(isset($_POST['cdata'])) {
   $coname= mysqli_real_escape_string($db, $_POST['cdata']);
 
    $sql = "SELECT COURSE_ID FROM course WHERE COURSE_NAME='$coname'";

    $result =  mysqli_query($db, $sql);
   
  if(mysqli_num_rows($result) > 0) {
    
    while($row = mysqli_fetch_object($result)) {
       
      echo "<option value='$row->COURSE_ID'>".$row->COURSE_ID."</option>";
    }
  }
} else {
  header('location: ./');
}
?>