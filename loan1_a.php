<?php
session_start(); ?>
<?php
  if($_SERVER['REQUEST_METHOD']=='POST'){ 
   
    if(!empty($_POST['loancat']))
      $loancat=$_POST['loancat'];  
    if(!empty($_POST['roi_hidden']))
      $roi=$_POST['roi_hidden'];
    if(!empty($_POST['occ']))
      $occ=$_POST['occ'];
    if(!empty($_POST['amount']))
      $amount=$_POST['amount'];     
    if(!empty($_POST['duration']))
      $duration=$_POST['duration'];
    $date_beg = date("y-m-d");   
    $date_end = date("y-m-d", strtotime(" + $duration months"));
    $d = date("y-m-d");
    if ($d==$date_end)
      $status="COMPLETED";
    else
      $status="ONGOING";  
  }

  $con=mysqli_connect('localhost','root','','db_cus') or 
  die("Connection Error: " . mysqli_error($con));
  $accno=$_SESSION['acc_no'];
 
  mysqli_query($con,"insert into loan (ACCOUNT_NO, AMOUNT, DURATION, RATE, TYPE, OCC, STATUS, DATE_BEG, DATE_END) values ('$accno','$amount','$duration','$roi','$loancat','$occ','$status','$date_beg', '$date_end' )");
  if($con){
    echo"Records inserted successfully";
    header("Location: loan1.php");}
  else{
    echo"Request cannot be completed: ".mysqli_error($con);
    header("Location: loan1.php");}

?>