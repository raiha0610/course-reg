<?php 
  session_start(); 
  ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<style>
* {
  box-sizing: border-box;
}

table, th, td {
  border: 1px solid black;
  border-collapse: collapse;

}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Style the header */
.header {
 
  padding: 30px 0px 0px 30px;
  text-align: center;

}
img{
    position:relative;
    width: 150px;
    height: auto;
    float: left;
    margin-left: 10%;
}
.title{
    text-align: center;
    padding:0px;
    margin-right:2%;
    font-size: 15px;
    line-height: 0.3;
}
.content{
  margin-left: 10%;
  margin-top: 5%;
  line-height: 2.5;
}
.footer{
  margin-left: 10%;
  margin-top: 5%;
}
.print{
  text-align: center;
}

.btn {
  border: none;
  color: white;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  margin: 4px 2px;
  transition-duration: 0.5s;
  cursor: pointer;
}

.button1 {
  font-size: 15px;
  background-color: white;
  color: black;
  border: 2px solid #4CAF50;
  border-radius: 8px;
}

.button1:hover {
  background-color: #e7e7e7;
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}
.button:active {
  transform: translateY(4px);
}
</style>
<script>
 function printpage() {
        var printButton = document.getElementById("printpagebutton");
        printButton.style.visibility = 'hidden';
        window.print()
        printButton.style.visibility = 'visible';
    }
    </script>
</head>
<body>

    <div class="header">
        <div class="logo" >
            <img src="nitpy.jpg" alt="nitpy" style="width:15%;height:15%;" >
        </div>

        <div class="title">
              <h4>राष्ट्रीय प्रौद्योगिकी संस्थान पुदुचेरी</h4>
              <h3>NATIONAL INSTITUTE OF TECHNOLOGY PUDUCHERRY</h3>
              <h4>(An Institute of National Importance under MHRD,Govt.of.India)</h4>
              <h3>KARAIKAL-609 609</h3>
              </div>
      </div>
    <hr>
    <br>
    <div class="main-content">
        <?php
          date_default_timezone_set('Asia/Kolkata');
          $month = date('m'); 
          if($month == 12 or $month == 11 or $month == 10 or $month == 9 or $month == 8 or $month == 7){ 
            $x="ODD SEMESTER"; 
            }
            else {
              $x="EVEN SEMESTER";
                }
         ?>
          <h3 style="text-decoration: underline;text-align:center;">
             <?php echo "COURSE REGISTRATION FORM ". date("Y") ."-".date('Y', strtotime('+1 year')). $x;?>
          </h3>
          <div class="content">
              <label>1. Programme of Study :<?php echo $_SESSION["prgofstudy"] ; ?></label>
              <br>
              <label ><?php echo "2. Date of Registration :" . date("d-m-Y") . "<br>";?> </label>
              <label>3. Roll Number : <?php echo $_SESSION["rollno"] ; ?></label>
              <br>
              <label>4. Full Name of the Student (as per 10th Mark Sheet) :<?php echo $_SESSION["name"] ; ?></label>
              <br>
              <div class="contact">
                <table style="height:50%;width:80%;text-align:left;">
                    <tr>
                      <td style="text-align:center;">5.</td>
                      <td style="text-align:center;" rowspan="2">Address for Communication:<br>  <?php echo $_SESSION["address"] ; ?>
                      </td>
                      <td>Mobile Number:<br>
                    <?php echo $_SESSION["mno"] ; ?>
                      </td>
                      </tr>
                      <tr>
                      <td colspan="2" >
                      </td>
                      <td>Email ID : :<br>
                    <?php echo $_SESSION["email"] ; ?>
                      </td>
                      </tr>
                  </table>
                </div>
              <label>6. Whether paid</label>
              <br>
              <label>a) Institute and Hostel dues of previous semester(s) : <?php echo $_SESSION["feestatus"] ; ?> </label>
              <br>
              <label>b) Any other dues : <?php echo $_SESSION["otherdues"] ; ?> </label>
              <br>
              <label>7. Course Registered : </label>
              <table style="height:50%;width:80%;text-align:left;">
              <tr>
              <td style="text-align:center;">Subject Code</td>
              <td style="text-align:center;">Title</td>
              <td style="text-align:center;">Credit</td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              </table>
          </div>
          <br>
          <div class="footer">
              <h4 style="text-align:left;"><?php echo "Date :" . date("d-m-Y") . " ";?>
              <span style="float:right;">Signature of the Candidate</span></h4>
              <br>
              <h4 style="text-align:left;">Signature of the Class Advisor
              <span style="float:right;">Signature of the HoD</span></h4>
          </div>
      </div>
      <br>
      
            <div class="print">
                <button class="btn button1" id="printpagebutton" onclick="printpage()">Print</button>
             </div>
  
        


</body>
</html>