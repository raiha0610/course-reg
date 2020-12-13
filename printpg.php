<?php 
  session_start(); 
  include('connect.php');
  ?>
<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
* {
  box-sizing: border-box;
}

table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  margin-left: 10%;
  margin-right: 10%;
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
  margin-right: 10%;
  margin-top: 5%;
  line-height: 2.5;
}
.footer{
  margin-left: 10%;
  margin-right: 10%;
  margin-top: 5%;
}
.print{
  text-align: center;
}


.btn {
background-color: #4CAF50; /* Green */
border-style: none;
color: white;
border-radius: 5%;
padding: .72vw 1.35vw;
text-align: center;
text-decoration: none;
display: inline-block;
font-size: .85vw;
font-weight:bold;
margin: .1125vw .1125vw;
transition-duration: 0.4s;
cursor: pointer;
}

.button1:hover,.btn:hover {
background-color: white; 
color: #4CAF50; 
border: .1125vw solid #4CAF50;
box-shadow: 0 .675vw .9vw 0 rgba(0,0,0,0.24),0 .954vw 2.8125vw 0 rgba(0,0,0,0.19);
}

.button1:active,.btn:active {
background-color: #3e8e41;
box-shadow: 0 .28125vw #666;
transform: translateY(.0225vw);
color:white;
}

.button1 {
background-color: #4CAF50;
color: black;
}


@media (min-width: 1024px)
{
  
}

@media (min-width: 769px) and (max-width: 1023px)
{
  
  .btn
  {
    font-size: 1.3vw;
  }

.button1:active,.btn:active { 
box-shadow: 0 .58125vw #666;
transform: translateY(.525vw);
}

}
  

@media (max-width: 768px)
{
  div[class="footer"] h4
  {
    font-size:3vw;
  }

  .btn
  {
    font-size: 2.5vw;
  }

  .button1:active,.btn:active { 
    box-shadow: 0 .98125vw #666;
    transform: translateY(.525vw);
  }
  
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
</head>
<body>

    <div class="header">
        <div class="logo" >
            <img src="nitpy_img.jpg" alt="nitpy" style="width:15%;height:15%;" >
        </div>

        <div class="title">
              <h5>राष्ट्रीय प्रौद्योगिकी संस्थान पुदुचेरी</h5>
              <h4>NATIONAL INSTITUTE OF TECHNOLOGY PUDUCHERRY</h4>
              <h5>(An Institute of National Importance under MHRD,Govt.of.India)</h5>
              <h4>KARAIKAL-609 609</h4>
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
             <?php echo "COURSE REGISTRATION FORM ". date("Y") ."-".date('Y', strtotime('+1 year')). " ".$x;?>
          </h3>
          <div class="content">
              <label>1. Programme of Study :<?php echo $_SESSION["prgofstudy"] ; ?></label>
              <br>
              <label ><?php echo "2. Date of Registration :" . date("d-m-Y") . "<br>";?> </label><br>
              <label>3. Roll Number : <?php echo $_SESSION["rollno"] ; ?></label>
              <br>
              <label>4. Full Name of the Student (as per 10th Mark Sheet) :<?php echo $_SESSION["name"] ; ?></label>
              <br>
              <div class="contact">
                <table style="height:50%;width:80%;text-align:left;">
                    <tr>
                     
                      <td style="text-align:center;" rowspan="2">5.Address for Communication:<br>  <?php echo $_SESSION["address"] ; ?>
                      </td>
                      <td>Mobile Number:<br>
                    <?php echo $_SESSION["mno"] ; ?>
                      </td>
                      </tr>
                      <tr>
                     
                      <td>Email ID : <br>
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
              <table>
              <thead id="pgh">

              </thead>
              <tbody id="pgb"> 
              <?php
                $query = "SELECT * FROM temp1"; //You don't need a ; like you do in SQL
                $result = mysqli_query($db,$query);
                echo "<table style='height:50%;width:80%;text-align:left;'>"; // start a table tag in the HTML
                echo "<tr>";
                echo "<th style=text-align:center;'>Subject Code</th>";
                echo "<th style=text-align:center;'>Title</th>";
                echo "<th style=text-align:center;'>Credit</th>";  
                echo "</tr>";
                while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
                echo "<tr><td style=text-align:center;'>" . $row['cid'] . "</td><td>" . $row['cname'] . "</td> <td style=text-align:center;'>" . $row['credit'] . "</td></tr>";  
                }
                //Close the table in HTML
              ?>
                 
          <tr> <td colspan='2'style="text-align:center">TOTAL CREDITS:</td> 
          <td style="text-align:center"> <?php $qry="SELECT SUM(credit) AS vsum FROM temp1";
          $res=mysqli_query($db,$qry);
          $tc=mysqli_fetch_array($res);
          echo $tc['vsum'];

          ?></td></tr>
        
              </tbody>
              </table>
              <br>
              <label>8. Redo Courses : </label>
              <table>
              <thead id="pgrh">

              </thead>
              <tbody id="pgrb"> 
              <?php
                $query = "SELECT * FROM rtemp"; //You don't need a ; like you do in SQL
                $result = mysqli_query($db,$query);
                echo "<table style='height:50%;width:80%;text-align:left;'>"; // start a table tag in the HTML
                echo "<tr>";
                echo "<th style=text-align:center;'>Subject Code</th>";
                echo "<th style=text-align:center;'>Title</th>";
                echo "<th style=text-align:center;'>Credit</th>";  
                echo "</tr>";
                
                if($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
                echo "<tr><td style=text-align:center;'>" . $row['rcid'] . "</td><td>" . $row['rcname'] . "</td> <td style=text-align:center;'>" . $row['rcredit'] . "</td></tr>";  
                }
                else{
                  echo "<tr style='text-align:center;font-weight:bold;'><td colspan='3'>No REDO COURSES</td></tr>";
                }
                echo "</table>"; //Close the table in HTML
              ?>
              </tbody>
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
  
<br><br>

</body>
</html>