<?php
$rcnameArr = json_decode($_POST["rcname"]);
$rcidArr = json_decode($_POST["rcid"]);
$rcreditArr = json_decode($_POST["rcredit"]);
$con=mysqli_connect("localhost","root","","nitpy_project");
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sql="DELETE FROM `rtemp` WHERE 1";
$res=mysqli_query($con,$sql);
for ($i = 0; $i < count($rcnameArr); $i++) {
if(($rcnameArr[$i] != "")){ /*not allowing empty values and the row which has been removed.*/
$sql="INSERT INTO rtemp (rcid,rcname,rcredit)
VALUES
('$rcidArr[$i]','$rcnameArr[$i]','$rcreditArr[$i]')";
if (!mysqli_query($con,$sql))
{
die('Error: ' . mysqli_error($con));
}
}
}
Print "Saved Successfully !";
mysqli_close($con);
?>