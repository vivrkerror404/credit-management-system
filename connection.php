<?php 
$mysqli = new mysqli("localhost","root","","spark_intern");
// $mysqli = new mysqli("sql109.epizy.com","epiz_25160678","rDAryz5R6kb","epiz_25160678_spark_project");


// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}


 ?>