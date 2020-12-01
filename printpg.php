<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<style>
* {
  box-sizing: border-box;
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
  margin-left: 15%;
  margin-top: 5%;
  line-height: 2.5;
}
.footer{
  margin-left: 15%;
  margin-top: 5%;
}
.print{
  text-align: center;
}
</style>
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
              <label>1. Programme of Study :</label>
              <br>
              <label ><?php echo "2. Date of Registration :" . date("d-m-Y") . "<br>";?> </label>
              <label>3. Roll Number :</label>
              <br>
              <label>4. Full Name of the Student (as per 10th Mark Sheet) :</label>
              <br>
              <label>6. Whether paid</label>
              <br>
              <label>a) Institute and Hostel dues of previous semester(s) : </label>
              <br>
              <label>b) Any other dues : </label>
              <br>
              <label>7. Course Registered : </label>
          </div>
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
                <button  onclick="window.print()">Print</button>
             </div>
  
 


</body>
</html>