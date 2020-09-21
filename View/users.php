<?php 
session_start();
 ?>
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
<style type="text/css">
  .sendpopup,.loanpopup
  {
    position: fixed;width: 100%;height: 100%;background-color: rgba(0,0,0,0.4);top: 0px;left: 0px;z-index: 100;display: none;justify-content: center;align-items: center;
   
  }
</style>
<body>

  <div class="sendpopup" >
    <div class="p-5 col-md-6 container" style="background-color: rgb(209, 233, 249);border-radius: 9px;">
      <form action="/Controller/logic.php" method="post">
        <p class="text-center"><b>Send Amount To</b></p>
            <span>Name</span><br>
        <input type="text" id="dynamicname" name="name" style="cursor: not-allowed;"  value="" class="form-control mb-2" readonly>
        <span>Email</span><br>
        <input type="email" id="dynamicemail" name="email" style="cursor: not-allowed;" value=""  class="form-control mb-2" readonly>
          <span>Your Email</span><br>
          <select id="ajaxname" name="senderemail" class="form-control">
            
          </select>
       
      
        <span>Amount</span><br>
        <input type="text" name="amount" class="form-control mb-2">
        <input type="submit" id="sendamountbtn" name="sendamount" class="btn btn-outline-info mt-2" value="Send">
      </form>
      
    </div>
    
  </div>
    <div class="loanpopup" >
    <div class="p-5 col-md-6 container" style="background-color: rgb(209, 233, 249);border-radius: 9px;">
      <form action="/Controller/logic.php" method="post">
        <p class="text-center"><b>How Much Loan Amount Do You Want</b></p>
        <p class="text-center p-0 m-0"><small class="text-danger">*You can take Loan maximum 2 times and loan amount should be less than 10000 credits</small></p>
            <span>Name</span><br>
        <input type="text" id="dynname" name="loanname" style="cursor: not-allowed;"  class="form-control mb-2" readonly>
        <span>Email</span><br>
        <input type="email" id="dynemail" name="loanemail" style="cursor: not-allowed;"  class="form-control mb-2" readonly>
        <span>Amount</span><br>
        <input type="text" name="loanamount" class="form-control mb-2">
        <input type="submit" name="wantloan" class="btn btn-outline-info mt-2" value="Ask For Loan">
      </form>
      
    </div>
    
  </div>
  <div class=" pt-md-5 pt-0 mt-md-5 mt-2" >
      <?php include 'navbar.php';  ?>
        <?php

if(isset($_SESSION['error_msg']))
{
  ?>
  <div class="alert alert-danger alert-dismissible fade show m-0" role="alert">
  <p><b><?php  echo $_SESSION['error_msg']; ?></b></p>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
  <?php
 
  unset($_SESSION['error_msg']);
}
if(isset($_SESSION['success_msg']))
{
  ?>
  <div class='alert alert-success alert-dismissible fade show m-0' role='alert'>
  <p><b><?php echo $_SESSION['success_msg']; ?></b></p>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>
     <?php 
  
  unset($_SESSION['success_msg']);
}
     ?>
<table class="table tablebox text-center" style="max-width: 100vw;overflow: scroll;">
  <thead class="table-primary">
    <tr>
      <th scope="col">Sno</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th>Phone</th>
      <th scope="col">Credits Left</th>
      <th>Send Credits</th>
      <th>Opt for a Loan</th>
    </tr>
  </thead>
    <tbody>
  <?php 
include '../connection.php';
$sql= "select * from users";
 $result = $mysqli -> query($sql);
   if($mysqli -> affected_rows > 0)
  {
    while($row = $result -> fetch_assoc())
    {
      
   ?>


    <tr>
      <th scope="row"><?php echo $row['sno']; ?></th>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['email']; ?></td>
      <td><?php echo $row['phone']; ?></td>
      <td><?php echo $row['credit']; ?></td>

      <td><a href="javascript:void(0)" data-name="<?php echo $row['name']; ?>" data-email="<?php echo $row['email']; ?>" class="senduser btn btn-outline-info ">Send Credits</a></td>
       <td><a href="javascript:void(0)" data-name="<?php echo $row['name']; ?>" data-email="<?php echo $row['email']; ?>" class="loanapply btn btn-outline-info ">Want a Loan</a></td>
    </tr>
<?php 

    } 
}
 ?>
  </tbody>
</table>
</div>
	<?php include 'footer.php';?>
	<script type="text/javascript" src="../js/style.js"></script>
 <script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
<script type="text/javascript">
  document.getElementById('sendamountbtn').addEventListener('click',function(e){
    if(document.getElementById('ajaxname').value== 'invalid')
    {

      e.preventDefault();
      alert("select sender's email id")
    }
  })
</script>
</body>
</html>