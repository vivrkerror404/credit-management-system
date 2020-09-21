<?php 
session_start();
include_once('../connection.php');
extract($_POST);
if(isset($_POST['sendamount']))
{
  
	$sendersql="select * from users where email='$senderemail'";
	 $result = $mysqli -> query($sendersql);
	 $row = $result -> fetch_assoc();
	 $sender_credit=$row['credit'];
     $newtrans_count=$row['no_of_transactions']+1;
	 if($sender_credit >= $amount)
	 {
	 		$sql= "select * from users where name='$name' AND email = '$email'";
 $result = $mysqli -> query($sql);
   if($mysqli -> affected_rows > 0)
  {
    $row = $result -> fetch_assoc();
    $current_credit=$row['credit'];
    $new_credit=$current_credit + $amount;
    $updatesql="update users set credit=$new_credit where email='$email'";
     $updated = $mysqli -> query($updatesql);
     if($updated)
     {
     	$dec_credit= $sender_credit - $amount;
     	$sql= "update users set credit=$dec_credit,no_of_transactions=$newtrans_count where email = '$senderemail'";
     	 $result = $mysqli -> query($sql);
     	 if($result)
     	 {
            $today_date=date("Y-m-d");
            $transaction="insert into transactions(sno,sender,receiver,credit) values(null,'$senderemail','$email',$amount)";
             $result = $mysqli -> query($transaction);
     	 	$_SESSION['success_msg']="$amount credits Transferred Successfully By '$senderemail' To '$email'";
     	 	echo "<script>window.location='../View/users.php';</script>";
     	 }

     }
     else
     {
     	 	$_SESSION['error_msg']="Amount Transferring Failed Please try Again";
     	 	echo "<script>window.location='../View/users.php';</script>";
     	 	

     }
    
 
}
else
{
$_SESSION['error_msg']="User is not Present in the database";
            echo "<script>window.location='../View/users.php';</script>";

}
 }
 else
 {
 	$_SESSION['error_msg']="Your Available credit is less than the amount you are trying to Send Please Opt For Loan";
            echo "<script>window.location='../View/users.php';</script>";

 }

}

// Applying for a loan
if(isset($_POST['wantloan']))
{
    if($loanamount < 10000) {
         $user="select * from users where email='$loanemail'";
     $result = $mysqli -> query($user);
     $row = $result -> fetch_assoc();
      if($mysqli -> affected_rows > 0)
  {

    if($row['loan_count'] < 2)
    {
        $newcount=$row['loan_count']+1;
        $current_credit=$row['credit'];
        $mycredit=$current_credit+$loanamount;
        $sql="update users set credit=$mycredit,loan_count=$newcount where email='$loanemail'";
        $result = $mysqli -> query($sql);
if($result)
{
    $_SESSION['success_msg']="Loan Sanctioned Successfully";
            echo "<script>window.location='../View/users.php';</script>"; 
}
else
{
     $_SESSION['error_msg']="An Error Occured unable to sanction loan";
            echo "<script>window.location='../View/users.php';</script>"; 
}
    }
    else
    {
        $count=$row['loan_count']+1;
        $sql="update users set loan_count=$count where email='$loanemail'";
        $result = $mysqli -> query($sql);
         $_SESSION['error_msg']="Bhikari fir se loan mangne aa gya &#129315;&#129315;";
            echo "<script>window.location='../View/users.php';</script>";  
    }
    

}
else
{
       $_SESSION['error_msg']="User is not Present in the database";
            echo "<script>window.location='../View/users.php';</script>";  
}
    }
    else
    {
        $_SESSION['error_msg']="Enter amount less than 10000";
            echo "<script>window.location='../View/users.php';</script>";  
    }

        
}

 ?>