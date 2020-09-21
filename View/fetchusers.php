<?php 
include '../connection.php';
$exclude_email=$_GET['email'];
$sql= "select * from users where email <> '$exclude_email'";
 $result = $mysqli -> query($sql);
   if($mysqli -> affected_rows > 0)
  {
  	echo "<option value='invalid'>Select Your email</option>";
    while($row = $result -> fetch_assoc())
    {
    	?>
    	<option value="<?php echo $row['email']; ?>"><?php echo $row['email']; ?></option>
    	<?php
    }
  }
 ?>