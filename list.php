<?php
session_start();
$i=$_POST["name"];
 $conn = mysqli_connect("localhost", "root", "", "db_cus") or 
 die("Connection Error: " . mysqli_error($conn));
 $acc=$_SESSION['acc_no'];
 $query = "SELECT * from addben where B_NAME='$i' and ACCOUNT_NO=$acc"; 
 $result=mysqli_query($conn,$query);
 $row = mysqli_fetch_assoc($result);
 $ifsc=$row["BANK_IFSC"];
 mysqli_close($conn);
 echo $ifsc;
?>