<!DOCTYPE html>
<html>
<head>
<style>
  table {
        width: 100%;
        border-collapse: collapse;
    }
    table tr td,
    table tr th {
        border: 1px solid black;
        padding: 25px;
    }
input{
  width=auto;
}
</style>
</head>
<body>

<?php
include('connect.php');
$q = strval($_GET['q']);




$sql="SELECT * FROM course WHERE COURSE_NAME = '".$q."'";
$result = mysqli_query($db,$sql);


while($row =  mysqli_fetch_object($result)) {

  echo "<tr>";
  echo " <td><input type='checkbox' name='record'></td>";
  
  echo "<td > <input type='text' id='cid' name='cid' value='$row->COURSE_ID' readonly></td>";
  echo "<td ><input type='text' id='cname' name='cname' value='$row->COURSE_NAME' size='80' readonly></td>";
  echo "<td ><input type='text' id='cred' name='cred' value='$row->COURSE_CREDIT' readonly></td>";

  echo "</tr>";

}

?>
</body>
</html>