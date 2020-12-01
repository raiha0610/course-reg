<?php include("server.php"); 


if(isset($_POST['mydata'])) {
 
    $sql = "SELECT COURSE_NAME FROM global_electives ";

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