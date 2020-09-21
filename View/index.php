<!DOCTYPE html>
<html>
<head>
	    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
   <link rel="stylesheet" type="text/css" href="/css/style.css">
	<title></title>
</head>
<style type="text/css">

</style>
<body>
	<?php include 'View/navbar.php';?>
	<div class="header row m-0 mt-md-5 pt-2" style=" background: linear-gradient(120deg,rgba(97, 219, 240,0.3),rgba(97, 219, 240,0.3),rgba(191, 227, 252,0.3),rgba(97, 219, 240,0.4))!important;position: relative;min-height: 600px;">
		<div class="col-md-6 text-left" >
			<img src="/images/header.png">
		</div>
			<div class="col-md-6 py-3 text-center" style="display: flex;justify-content: center;align-items: center;flex-direction: column;z-index: 100;">
		   <h3 class="text-info"><span style="display: block;color: darkcyan;text-align: center;">Hey User</span>Welcome to Credit Management System</h3>
		   <button class="btn btn-outline-info" onclick="ShowUserPopup();">Signup Now</button>
		</div>
 
<div style="width: 100%;position: absolute;bottom: 0px;" id="mysvg">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#a2d9ff" fill-opacity="0.7" d="M0,320L120,293.3C240,267,480,213,720,192C960,171,1200,181,1320,186.7L1440,192L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path></svg>
</div>
		
	</div>

	<section>
		<h3 class="text-center text-info">How it Works</h3>
		<div class="row m-0">
			<div class="col-12 col-md-6">
				<ul class="text-info moreinfo" style="font-size: 20px;">
			<li>The <a href="/View/users.php" class="text-primary ">view users</a> option will fetch all the users present in the database. You Will see a list of users(their name,email,credits,phone etc) from which you can select any one user and send some credit to him/her. </li>
			
							<li class="mt-3">The <a href="/View/transactions.php" class="text-primary ">view transactions</a> option will fetch all the credit transaction happened so far.  </li>

							<li class="mt-3">Each user has a fixed credit of amount 1000. For transferring a credit amount more than that you need to opt for loan.</li>
							<li class="mt-3">The <a href="/View/visualise.php" class="text-primary ">User Graphs</a> option will show graphically(bar graph) the <ul>
								<li>no of times users opted for loan</li>
								<li>total no of times credits sent by the users</li>

							</ul>  </li>
		</ul>
		</div>
	
		<div class="col-12 col-md-6 text-center">
			<img src="/images/workflow.png" class="img-fluid" width="450px">
		</div>
		</div>
	</section>
	<?php include 'View/footer.php';?>
	<script type="text/javascript" src="/js/style.js">
</script>
<script type="text/javascript">
	function ShowUserPopup()
	{

	}
</script>
</body>
</html>