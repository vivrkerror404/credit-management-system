<?php 
include '../connection.php';
$a=array();;
$sql= "select * from users";
 $result = $mysqli -> query($sql);
   if($mysqli -> affected_rows > 0)
  {
  	
    while($row = $result -> fetch_assoc())
    {
      array_push($a,array($row['email']=>$row['loan_count']));
      }
    print_r(json_encode($a));
    
  }
 ?>