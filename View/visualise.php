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
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
	<title></title>
</head>
<style type="text/css">
  
</style>
<body>
	<?php include 'navbar.php';?>
<div class="container col-md-9 mt-md-5 pt-md-5" style="background-color: rgb(219, 240, 255);">
    <canvas id="barchart"> </canvas>
    
  </div>

  <div class="container col-md-9 mt-md-5 pt-md-5" style="background-color: rgb(219, 240, 255);">
    <canvas id="barchart1"> </canvas>
    
  </div>
	<?php include 'footer.php';?>
	<script type="text/javascript" src="../js/style.js">
</script>
 <script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
  <script type="text/javascript">
    $(document).ready(function(){
         $.get(`dataset.php`, function(data, status){
    console.log(data);
   dataset=JSON.parse(data);
   console.log(dataset.length)
   mylabel=[]
   mydata=[]
   for(i=0;i<dataset.length;i++)
   {
    mylabel.push(Object.keys(dataset[i])[0]);
    mydata.push(dataset[i][Object.keys(dataset[i])])

   }

    var data={
      labels:mylabel,
      datasets:[
      {
        label:"No. of times applied for Loan",
        data:mydata,
        borderWidth:3,
        backgroundColor:"rgba(142, 206, 249)" ,
        borderColor:"rgba(41, 126, 165)"

               
               
      }


      ]
    };
    var options={
      title:{
        display:true,
        text:"Loan Takers",
        position:"top",
        fontSize:20,
        fontColor:"rgba(41, 126, 165)"
    },
    legend:
    {
      display:true,
      position:"bottom"
      
    },
    scales:{
      yAxes:[{
        ticks:{
          min:-10
        }
      }]
    }
  };

    var ctx=document.getElementById('barchart');
    var chart =new Chart(ctx,{
      type:'bar',
      data:data,
      options:options
    })
  });

 //----------------------------------------------------no. of times credit sent-----------------------
          $.get(`dataset1.php`, function(data, status){
    console.log(data);
   dataset=JSON.parse(data);
   console.log(dataset.length)
   mylabel=[]
   mydata=[]
   for(i=0;i<dataset.length;i++)
   {
    mylabel.push(Object.keys(dataset[i])[0]);
    mydata.push(dataset[i][Object.keys(dataset[i])])

   }

    var data={
      labels:mylabel,
      datasets:[
      {
        label:"Number of times credit sent ",
        data:mydata,
        borderWidth:3,
   backgroundColor:"rgba(142, 206, 249)" ,
        borderColor:"rgba(41, 126, 165)"
               
      }


      ]
    };
    var options={
      title:{
        display:true,
        text:"Number of times credit sent",
        position:"top",
        fontSize:20,
        fontColor:"rgba(41, 126, 165)"
    },
    legend:
    {
      display:true,
      position:"bottom"
      
    },
    scales:{
      yAxes:[{
        ticks:{
          min:-10
        }
      }]
    }
  };

    var ctx=document.getElementById('barchart1');
    var chart =new Chart(ctx,{
      type:'bar',
      data:data,
      options:options
    })
  });

    })


  </script>
</body>
</html>