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

</style>
</head>
<body>

<?php
include('connect.php');
$q = strval($_GET['q']);




$sql="SELECT * FROM course WHERE COURSE_NAME = '".$q."'";
$result = mysqli_query($db,$sql);


while($row = mysqli_fetch_array($result)) {?>
  <tr>
  <td><input type='checkbox' name='record'></td>
  <?php
  echo "<td name='cid'>" . $row['COURSE_ID'] . "</td>";
  echo "<td name='cname'>" . $row['COURSE_NAME'] . "</td>";
  echo "<td name='cr'>" . $row['COURSE_CREDIT'] . "</td>";

  echo "</tr>";
}
echo "</table>";

?>
</body>
</html>