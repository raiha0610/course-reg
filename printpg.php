<!DOCTYPE html>
<html>
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
}

.main-content{
    text-align:center;
}
</style>
<body>

<div class="header">
<div class="logo" ><img src="nitpy_img.jpg" alt="nitpy" ></div>

<div class="title">
  <h1>NATIONAL INSTITUTE OF TECHNOLOGY PUDUCHERRY</h1>
  <h3>(An Institute of National Importance under MHRD,Govt.of.India)</h3>
  <h2>KARAIKAL-609 609</h2>


  </div>

</div>
<hr>
<div class="main-content">
    <h3><?php echo "COURSE REGISTRATION FORM ". date("Y") ."-".date('Y', strtotime('+1 year')). "<br>"; ?></h3>
</div>
  
 


</body>
</html>