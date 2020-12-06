<?php
$cnameArr = json_decode($_POST["cname"]);
$cidArr = json_decode($_POST["cid"]);
$creditArr = json_decode($_POST["credit"]);
$con=mysqli_connect("localhost","root","","nitpy_project");
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sql="DELETE FROM `temp1` WHERE 1";
$res=mysqli_query($con,$sql);
for ($i = 0; $i < count($cnameArr); $i++) {
if(($cnameArr[$i] != "")){ /*not allowing empty values and the row which has been removed.*/
$sql="INSERT INTO temp1 (cid,cname,credit)
VALUES
('$cidArr[$i]','$cnameArr[$i]','$creditArr[$i]')";
if (!mysqli_query($con,$sql))
{
die('Error: ' . mysqli_error($con));
}
}
}
Print "Saved Successfully !";
mysqli_close($con);
?>