<?php
session_start();
include('connect.php');


// initializing variables
$name = "";
$email= "";
$rno="";
$pno="";
$add="";
$dor="";
$pos="";
$fee_status="";
$other_fee="";
$errors = array(); 
$sem="";


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
      $password = md5($password);
      $query = "SELECT * FROM logininfo WHERE rollno='$rno' AND password='$password'";
      $results = mysqli_query($db, $query);
      if (mysqli_num_rows($results) == 1) {
        $_SESSION['rollno'] =$rno;
        header('location: register.php');
      }else {
          array_push($errors, "Wrong username/password combination");
      }
  }


// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $fee_status=mysqli_real_escape_string($db, $_POST['fee']);;
$other_fee=mysqli_real_escape_string($db, $_POST['dues']);;

  
  $dor = mysqli_real_escape_string($db, $_POST['dor']);
  $pos=mysqli_real_escape_string($db, $_POST['pos']);
  $sem = mysqli_real_escape_string($db, $_POST['sem']);
 
}

}
  
  ?>