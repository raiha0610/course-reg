<?php
session_start();
include('connect.php');


// initializing variables
$name = "";
$email = "";
$rno = "";
$pno = "";
$add = "";
$pos = "";
$fee = "";
$dues = "";
$password = "";
$course = "";
$errors = array(); 
$sem = "";


// ... 
// LOGIN USER
if (isset($_POST['login_user'])) {
  $rno = mysqli_real_escape_string($db, $_POST['rno']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($rno)) {
      array_push($errors, "rollno is required");
  }
  if (empty($password)) {
      array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
      $query = "SELECT * FROM logininfo WHERE rollno='$rno' AND password='$password'";
      $results = mysqli_query($db, $query);
      if (mysqli_num_rows($results) == 1) {
        $_SESSION['rollno'] =$rno;
        header('location: register.php');
      }else {
          array_push($errors, "Wrong username/password combination");
      }
  }
}


    // REGISTER USER
    if (isset($_POST['reg_user'])) {
      // receive all input values from the form
      $fee = mysqli_real_escape_string($db, $_POST['fee']);
      $dues = mysqli_real_escape_string($db, $_POST['dues']);
      $pos = mysqli_real_escape_string($db, $_POST['pos']);
      $sem = mysqli_real_escape_string($db, $_POST['sem']);
      $course = mysqli_real_escape_string($db, $_POST['course']);
    


      if (empty($pos)){ 
        array_push($errors, "*Programme of Study is required");
        }
      if (empty($fee)){ 
        array_push($errors, "*Check the INSTITUTE/HOSTEL DUES field");
        }
      if (empty($dues)) { 
        array_push($errors, "*Check the OTHER DUES field");
        }
      if (empty($sem)) { 
        array_push($errors, "*Select the SEMESTER");
        }
      if (empty($course)) { 
        array_push($errors, "*Select the COURSE");
        } 

        if($_POST['sem'] == -1){
        array_push($errors, "*Please select Semester and Course");
        }
        else{
        if($_POST['course'] == -1){
        array_push($errors, "*Please select Course");
        }
      }


     
      
      if (count($errors) == 0) {
      

        $_SESSION['prgofstudy'] =$pos;
        $_SESSION['feestatus'] =$fee;
        $_SESSION['otherdues'] =$dues;
        $_SESSION['semester'] =$sem;
       
     

        header('location: confirmpage.php');
   
        }

      



      }



  
  ?>