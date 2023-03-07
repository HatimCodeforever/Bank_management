<?php
session_start();
$accno=$_SESSION["accno"] ;
    if($_SERVER['REQUEST_METHOD']=='POST'){ 
        if(!empty($_POST['oldpass']))
            $oldpassword=$_POST['oldpass'];
        if(!empty($_POST['newpass']))
            $newpassword=$_POST['newpass']; 
    }

       $conn=mysqli_connect('localhost','root','','db_cus') or 
       die("Connection Error: " . mysqli_error($conn));

       if (isset($_POST['newpass'])){
       $result=mysqli_query($conn,"update accinfo set PASSWORD='$newpassword' where ACCOUNT_NO = '$accno' and PASSWORD='$oldpassword'");
       if(!$result){
            echo"Could not update";
            header("Location: pass.php");} 
        else{
            echo"Password changed successfully..<br><br>"; 
            header("location: pass.php");}
       }
    ?>