<?php
session_start(); ?>
<html>
<head><title>Change Password</title>
<style>
	div{
			align-self: center;
			/* position: absolute; */
			/* left: 470px; */
			margin-left: 250px;
			margin-right: 250px; 
			background-color: rgb(125, 241, 71);
			/* top: 100px; */
			padding-top: 20px;
			padding-bottom: 20px;
			padding-left: 30px;
			padding-right: 30px;
			border-radius: 20px;
			border: 5px dotted black;
			text-align: center;
			font-size: 15px;
			font-family: monospace;		
		}

	.button{
			background-color: crimson; 
			color:aliceblue; 
			padding: 5px; 
			border-radius: 5px; 
			font-size: 15px;
  			font-family: cursive ;
 			font-weight:bold;
			margin: 5px;
		}

	.button:hover{
		cursor: pointer;
		background-color: black;
	}

	td{
		font-size: 20px;
		font-family: monospace;
		font-weight: bold;
	}
</style>
<script>
	var flag =0;
	function back(){
		window.history.back();
	}
	function on_submit(){
		var cap1 =  document.getElementById("capt").value
        var cap2 = document.getElementById("cap2").value
		var p = document.getElementById("t3").value;	
	if (flag==1 && cap1==cap2) {
	document.getElementById("f1").submit();	
	alert("Your New password is "+p);	
	document.getElementById("f1").reset();
	} 
	else if (cap1!=cap2) {
			alert("Entered captcha does not match!");
		}
	else {
	alert("Please Validate your password first!");
	}
	}

	function validat(){
		var p = document.getElementById("t3").value;
		var p1 = document.getElementById("t2").value;
		var p2 = document.getElementById("txt1").value;
		
		if (p!=p1) {
			alert("New Password field and Confirm Password field Doesn't Match!");
			flag=0;
		} 
	
		else if (p2=="") {
			alert("Old Password field cannot be empty!")
			flag=0;
		}
		else if (p=="") {
			alert("New Password field cannot be empty!")
			flag=0;
		}
		else if (p.length<8) {
			alert("New Password length must be greater than 8 characters!");
			flag=0;
		}
		else {
			alert("Password validated!!");	
			document.getElementById("txt1").disabled= true;
			document.getElementById("t2").disabled= true;
			document.getElementById("t3").disabled= true;
			flag=1;
		}
	}

	function reff(){
            var alphaNums = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
            var emptyArr = [];
            for (let i = 1; i <= 5; i++) 
            {
            emptyArr.push(alphaNums[Math.floor(Math.random() * alphaNums.length)]);
            }
            var c = emptyArr.join('');
            document.getElementById("capt").value=c;
			
    }

	function on_reset(){
			document.getElementById("txt1").disabled= false;
			document.getElementById("t2").disabled= false;
			document.getElementById("t3").disabled= false;
			flag=0;
	}
</script>
</head>
<body style="background-color: honeydew;" onload="reff()" onreset="on_reset()">
<?php
 $acc=$_SESSION["acc_no"];
?>
<h2 style="background-color: black ; padding: 10px ;color: aliceblue; font-family: cursive ; font-size: 30px; text-align: center; margin-top: 20px;">CHANGE PASSWORD</h2>

<form name="f1" id ="f1" action="pass_a.php" method="post">
	<div>
	Enter Old Password: &nbsp;&nbsp;<input type="password" id = "txt1" name="oldpass" style="font-family: monospace; font-size:15px;" placeholder="Enter Old Password" required/><br><br>
	Enter New Password: &nbsp;&nbsp;<input type="password" id="t2" name="newpass" style="font-family: monospace; font-size:15px;" placeholder="Enter New Password" required/><br><br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	Confirm Password: &nbsp;&nbsp;&nbsp;&nbsp;<input type="password" style="font-family: monospace; font-size:15px;" id="t3" placeholder="Re-enter Password" required/>
	<button type="button" class="button" id="but1" onclick="validat()">Validate Password</button>
	<br><br>
	CAPTCHA: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	<input type="text" id="capt" size="7" style="padding: 5px; padding-right: 8px;" disabled="true">
	<button onclick="reff()" style="border-color: black; border-style: solid;"><img src="cap.jpg" ></button><br><br>
	Retype The captcha :  &nbsp
	<input type="text" id="cap2"><br><br><br>
	
	<input type="submit" class="button" value="Submit">
	<input type="reset" value="Reset" class="button"/>
	<button type="button" class="button" onclick="back()">Cancel</button>
	</div>
</form>
</body>
</html>