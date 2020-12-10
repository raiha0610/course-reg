<?php
session_start();
include('connect.php');


// initializing variables

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
    
    
      $sem = mysqli_real_escape_string($db, $_POST['sem']);

 $qry="SELECT * FROM temp1";
 $sol= mysqli_query($db, $qry);
if(mysqli_num_rows($sol) == 0)
{
  array_push($errors, "*Courses not selected/saved");
}
 if(!isset($_POST['pos'])){ 
  array_push($errors, "*Programme of Study is required");
    } else{
      $pos= mysqli_real_escape_string($db, $_POST['pos']);
    }
    if(!isset($_POST['fee'])){ 
      array_push($errors, "*Check the INSTITUTE/HOSTEL DUES field");
        } else{
          $fee= mysqli_real_escape_string($db, $_POST['fee']);
        }
        if(!isset($_POST['dues'])){ 
          array_push($errors, "*Check the OTHER DUES field");
            } else{
              $dues= mysqli_real_escape_string($db, $_POST['dues']);
            }
      
     
  
      

        if($_POST['sem'] == -1){
        array_push($errors, "*Please select Semester and Course");
        }
        else{
        if(!isset($_POST['course'])){
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

     


       if (isset($_POST['confirm'])) {
         $date=date("Y-m-d");
         $rollno=$_SESSION['rollno'];
        $sem=$_SESSION['semester'];
        $fee=$_SESSION["feestatus"];
        $dues=$_SESSION["otherdues"];
        $query1= "INSERT INTO `fee_details`(`ROLL_NO`, `INSTITUTE/HOSTEL_FEE_STATUS`, `OTHER_FEE`, `SEMESTER`, `DATE_OF_REGISTRATION`) VALUES 
        ('$rollno', '$fee', '$dues','$sem','$date')";
        mysqli_query($db,$query1);
        $sql = "SELECT * FROM temp1"; 
        $res = mysqli_query($db,$sql);
        while($list = mysqli_fetch_array($res)){
          $c_id=$list['cid'];
          $sql1="INSERT INTO course_reg (ROLL_NO,COURSE_ID, DATE_OF_REGISTRATION) VALUES ('$rollno','$c_id','$date')";
          mysqli_query($db, $sql1);
          
        }   
        $sql2 = "SELECT * FROM rtemp"; 
        $res1 = mysqli_query($db,$sql2);
        while($list1 = mysqli_fetch_array($res1)){
          $c_id=$list1['rcid'];
          $sql3="INSERT INTO course_redo (ROLL_NO,COURSE_ID, DATE_OF_REGISTRATION) VALUES ('$rollno','$c_id','$date')";
          mysqli_query($db, $sql3);
          
        }   


        header('location: printpg.php');
    }



  
  ?>