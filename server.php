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


// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $fee_status=mysqli_real_escape_string($db, $_POST['fee']);;
$other_fee=mysqli_real_escape_string($db, $_POST['dues']);;

  
  $dor = mysqli_real_escape_string($db, $_POST['dor']);
  $pos=mysqli_real_escape_string($db, $_POST['pos']);
  $sem = mysqli_real_escape_string($db, $_POST['sem']);
 
}
  
  ?>