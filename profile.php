<?php
session_start(); 
$acc=$_SESSION["acc_no"];
?>
<html>
<head><title>Profile page</title>
<style>
.backButton{
	border: 5px outset lawngreen;
  	background-color: black;    
  	text-align: center;
  	color:LawnGreen;
  	font-size: 50px;
  	font-family: cursive ;
 	font-weight:bold;
	padding: 10px; 
	margin-left: 10px;}

.profButton{
	border: 3px outset lawngreen;
  	background-color: black;    
  	text-align: center;
  	color:LawnGreen;
  	font-size: 15px;
  	font-family: cursive ;
 	font-weight:bold;
	padding: 10px; 
	margin-left: 10px;}

.backButton:hover, .profButton:hover{
  cursor: pointer;
	background-color: white;
}

.header{
	background-color: black; 
	color:lawngreen; 
	font-size: 50px; 
	font-family: cursive; 
	font-weight:bold; 
	border: 5px outset lawngreen;
	padding-top: 10px;
 	padding-right: 380px;
 	padding-bottom: 10px;
 	padding-left: 400px;
	margin-left: 10px;
	margin-right: 10px;}

.center{
  margin-left: auto;
  margin-right: auto;}

.th1 {
  font-size: 25px;
  border: 5px solid white;
  border-radius: 20px;
  background-color: lawngreen;}

.td1 {
  font-size: 20px;
  border: 5px solid white;
  background-color: lawngreen;
  text-align: center;
  border-radius: 20px;}
</style>
<script>
  function logOn(){
    let to1 = new Date().toString().substr(0, 15);
    let to = new Date();
    var time = "[ "+to.getHours() + ":" + to.getMinutes() + ":" + to.getSeconds()+" ]";
    document.getElementById("date").innerHTML = to1;
    document.getElementById("time").innerHTML = time;}

  function passOpen(){
    if (confirm('Do you want to Change your Password?')) 
    {window.open("pass.php","_self");} 
  }
  function showbal(){
    <?php
       $conn=mysqli_connect('localhost','root','','db_cus') or 
       die("Connection Error: " . mysqli_error($conn));
       $acc=$_SESSION["acc_no"];
       $q1 = "SELECT BALANCE from accinfo where ACCOUNT_NO = $acc "; 
       $r1 = mysqli_query($conn, $q1) or 
       die(mysqli_error($conn));  
       $r0=mysqli_fetch_row($r1);
    ?>
    alert("Your balance : ₹<?php echo $r0[0]; ?>")
  }

</script>
</head>
<body onload="logOn()">
<?php
$acc=$_SESSION["acc_no"];
?>
<button type="button" onclick='window.close(), window.open("main.html")' class="backButton"><</button>
<span class = "header">MY PROFILE</span>
<img src="star2.jpeg" alt="Bank_Name" width="150" height="85"style="float: right;">
<br><hr><br>

<table style="height: 70%; width:100%; border-collapse: collapse;">
<tr>
<td rowspan="2" style="height: 70%; width: 80%">
<table style="height:100%;width:100%">

  <?php
    $con=mysqli_connect('localhost','root','','db_cus') or 
    die("Connection Error: " . mysqli_error($conn));
    $query = "SELECT * from personaldetails where ACCOUNT_NO = $acc "; 
    $result = mysqli_query($con, $query) or 
    die(mysqli_error($con));
    while($row=mysqli_fetch_assoc($result))
        {
        ?>
        <tr>
          <th class= "th1">FIRST NAME : </th>
          <td class= "td1"><?php echo $row['FIRST_NAME']; ?></td>
        </tr>
        <tr>
          <th class= "th1">LAST NAME : </th>
          <td class= "td1"><?php echo $row['LAST_NAME']; ?></td>
        </tr>
        <tr>
          <th class= "th1">MOBILE NO. : </th>
          <td class= "td1"><?php echo $row['PHONENO']; ?></td>
        </tr>
        <tr>
          <th class= "th1">EMAIL-ID : </th>
          <td class= "td1"><?php echo $row['GMAIL']; ?></td>
        </tr>
        <tr>
          <th class= "th1">ACCOUNT NO. : </th>
          <td class= "td1"><?php echo $row['ACCOUNT_NO']; ?></td>
        </tr>
        <tr>
          <th class= "th1">PAN NO. : </th>
          <td class= "td1"><?php echo $row['PANCARD']; ?></td>
        </tr>
      <?php } ?>

</table>
</td>

<td style="text-align: center;">
<img src="prof.png" alt="profPic" width="150" height="150">
</td>
</tr>
<tr>
  <td style ="font-family: cursive; font-weight:bold; font-size: 20px; height:300px; padding:25px; border-style: outset; text-align: center; vertical-align: top">
    Last logged on : 
    <p id="date"></p>
    <p id="time"></p>
    <button type="button" class="profButton" onclick="showbal()">Check Balance</button>
    <br><br>
    <button type="button" class="profButton" onclick="passOpen()">Change Password</button>
  </td>
</tr>
</table>

  
</body>
</html>