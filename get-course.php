<?php include("connect.php"); ?>

<?php
if(isset($_POST['mydata'])) {
   
    $sql = "SELECT COURSE_NAME FROM course_details WHERE SEMESTER=".mysqli_real_escape_string($db, $_POST['mydata']);

    $res =  $db->query($sql);
  
  if(mysqli_num_rows($res) > 0) {
    echo "<option >------- Select --------</option>";
    while($row = mysqli_fetch_object($res)) {
       
      echo "<option >".$row->COURSE_ID." ".$row->COURSE_NAME."</option>";
    }
  }
} else {
  header('location: ./');
}
?>
