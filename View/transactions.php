<!DOCTYPE html>
<html>
<head>
	    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
   <link rel="stylesheet" type="text/css" href="../css/style.css">
	<title></title>
</head>
<body>
	<?php include 'navbar.php';?>
    <div class=" pt-md-5 pt-0 mt-md-5 mt-2" style="min-height: 500px;" >
<table class="table tablebox text-center" style="max-width: 100vw;overflow: scroll;">
  <thead class="table-primary">
    <tr>
      <th scope="col">Sno</th>
      <th scope="col">Sender Email</th>
      <th scope="col">Receiver Email</th>
      <th>Amount</th>
      <th scope="col">Date</th>
   
    </tr>
  </thead>
    <tbody>
  <?php 
include '../connection.php';
$sql= "select * from transactions";
 $result = $mysqli -> query($sql);
   if($mysqli -> affected_rows > 0)
  {
    while($row = $result -> fetch_assoc())
    {
      
   ?>


    <tr>
      <th scope="row"><?php echo $row['sno']; ?></th>
      <td><?php echo $row['sender']; ?></td>
      <td><?php echo $row['receiver']; ?></td>
      <td><?php echo $row['credit']; ?></td>
      <td><?php echo $row['date']; ?></td>


    </tr>
<?php 

    } 
}
 ?>
  </tbody>
</table>
</div>
	<?php include 'footer.php';?>
	<script type="text/javascript" src="../js/style.js">

</script>
</body>
</html>