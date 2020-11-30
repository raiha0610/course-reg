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
 
  padding: 30px;
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
    margin-right: 10%;
    font-size: 15px;
    line-height: 0.5;
}

.main-content{
    text-align:center;
}
</style>
</head>
<body>

    <div class="header">
        <div class="logo" >
            <img src="nitpy.jpg" alt="nitpy logo" style="width:12%;height:12%;" >
        </div>

   <div class="title">
        <h3>राष्ट्रीय प्रौद्योगिकी संस्थान पुदुचेरी</h3>
        <h2>NATIONAL INSTITUTE OF TECHNOLOGY PUDUCHERRY</h1>
        <h3>(An Institute of National Importance under MHRD,Govt.of.India)</h3>
        <h2>KARAIKAL-609 609</h2>
        </div>
    </div>
    <hr>
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
          <h3 style="text-decoration: underline;">
          <?php echo "COURSE REGISTRATION FORM ". date("Y") ."-".date('Y', strtotime('+1 year')). $x; 
          ?></h3>
      </div>
  
 


</body>
</html>
