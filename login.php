<?php
session_start();

$con = mysqli_connect('localhost', 'root', '');
mysqli_select_db($con, 'db_cus');
    
$acc_no = $_POST['acc_no'];
$password = $_POST['password'];

$res = mysqli_query($con, "SELECT * FROM `accinfo` WHERE `ACCOUNT_NO`='$acc_no' AND `PASSWORD`='$password'");
if(mysqli_num_rows($res)>0) {
    $row=mysqli_fetch_array($res);
    $_SESSION['acc_no'] = $row['ACCOUNT_NO'];
    $_SESSION['password'] = $row['PASSWORD'];
    header('location:main.html?login=true');
}
else {
    header('location:log_form.php?user_login=false');
}
?>