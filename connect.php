<?php
define('HOSTNAME','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME', 'nitpy-project');
//global $con;
$db = mysqli_connect(HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_NAME) or die ("error");
// Check connection
if(mysqli_connect_errno($db))  echo "Failed to connect MySQL: " .mysqli_connect_error();
