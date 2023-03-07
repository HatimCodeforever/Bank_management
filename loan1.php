<?php
session_start(); ?>
<html>
<head><title>Loan page</title>
<style>
.backButton{
	border: 5px outset black;
  background-image: linear-gradient(to right, blue, red);
  	text-align: center;
  	color: white;
  	font-size: 50px;
  	font-family: cursive ;
 	font-weight:bold;
	padding: 10px; 
	margin-left: 10px;}


.backButton:hover{
  cursor: pointer;
	background-image: none;
  color: black;
}

.header{
	background-image: linear-gradient(30deg, blue, red);
	color:white; 
	font-size: 50px; 
	font-family: cursive; 
	font-weight:bold; 
	border: 5px outset black;
	padding-top: 10px;
 	padding-right: 270px;
 	padding-bottom: 10px;
 	padding-left: 270px;
	margin-left: 10px;
	margin-right: 10px;}

#show{
  background-color: red;
  color: white;
  border-top: 2px solid black;
  border-bottom: 2px solid black;
}

#show:hover{
  background-color:white;
  color: red;
}

.rel{
margin-left: 25px;
margin-top: 25px;
margin-bottom: 15px;
font-size: 20px;
color: blue;
border-left: 3px groove blue;
padding-left: 5px;
font-weight: bold;
}

.r1{margin-left: 25px;}

.r2{
  margin-left: 25px;
  margin-top: 5px;
  background-color: white;
  color: blue;
  border: 2px outset blue;
  font-family: cursive;
  font-size: 15px;

  
}
input::-webkit-inner-spin-button {
        -webkit-appearance: none;
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
      margin-left: 20px;
		}

	.button:hover{
		cursor: pointer;
		background-color: black;
  }

  .calc{
    position:fixed; left:1180px; top:440px;
    font-family: cursive;
    font-weight: bold;
    font-size: 15px;
    background-color: white;
    border: 2px outset black;
    border-radius: 25px;
  }
  .calc:hover{
    cursor: pointer;
  }

</style>
<script>
  var scrollpos = 0, maxScroll = 185, blanks = "";
    function scrolltext(text,sec)
    {
        window.setInterval(function()
    {
        document.getElementById("show").innerHTML = blanks + text;
        ++scrollpos;
        blanks = blanks + "&nbsp";
        if (scrollpos>maxScroll)
        {
            scrollpos = 0;
            blanks = "";
        }
    },sec);
    }

    function sub99(){
      var mail1=document.getElementById("e2").value;
      var mno=document.getElementById("mobno").value;
      var avg,part1,part2; 
      splitted = mail1.split("@"); 
      part1=splitted[0]; 
      part2=splitted[1]; 
      avg=part1.length/2; 
      part1=part1.substring(0,(part1.length-avg)); 
      mail1 = part1+"......@"+part2;

      part2=mno.substring(6,10);
      mno = "......"+part2;
      alert("Further updates regarding loan, wil be conveyed on:\nRegistered Email - ID : "+mail1+"\nRegistered Mobile No. : "+mno);
    }

    function roi(){
      if (document.getElementById('loancat').value == 'Education Loan'){
        document.getElementById('roi_hidden').value= '5';
        document.getElementById('roi').innerHTML= '5 %';
      }else if (document.getElementById('loancat').value == 'Home Loan'){
        document.getElementById('roi_hidden').value= '7';
        document.getElementById('roi').innerHTML= '7 %';
      }else if (document.getElementById('loancat').value == 'Personal Loan'){
        document.getElementById('roi_hidden').value= '13';
        document.getElementById('roi').innerHTML= '13 %';
      }else if (document.getElementById('loancat').value == 'Vehicle Loan'){
        document.getElementById('roi_hidden').value= '10';
        document.getElementById('roi').innerHTML= '10 %';
      } else if (document.getElementById('loancat').value == '') {
        document.getElementById('roi_hidden').value= '0';
        document.getElementById('roi').innerHTML= '___%';
      }
    }
    function tocalc(){
      if (confirm('Are you sure you want to open EMI CALCULATOR?')) {
        window.open("EMICALC.php","_self");
        } 
    }
    
    function maxdate(){
      var today = new Date();
      var dd = today.getDate();
      var  mm = today.getMonth() + 1; //January is 0!
      var yyyy = today.getFullYear();

      if (dd < 10) {
        dd = '0' + dd;
      }

      if (mm < 10) {
        mm = '0' + mm;
      } 
    
      today = yyyy + '-' + mm + '-' + dd;
      document.getElementById("d1").setAttribute("max", today);
    }

</script>
</head>
<body onload="scrolltext('All-India Toll Free Number : 1800 208 244/ 1800 22 22 44, charged Number : 080-61817110',100)">
<button type="button" onclick='window.close(), window.open("main.html")' class="backButton"><</button>
<span class = "header">LOAN APPLICATION</span>
<img src="star2.jpeg" alt="Bank_Name" width="150" height="85"style="float: right;">
<br><hr>
<div id="show"></div>
<form name=f3 onsubmit="sub99()" action="loan1_a.php" method="post">
<div class="rel"><span style="color:red">RELATIONSHIP</span> WITH BANK :</div>

<span style="margin-left: 25px; font-weight: bold;">Account No <span style="color:red">*</span> : </span>
<input id="accno" disabled="disabled" name="accno" class="r2"  oninput="javascript: if (this.value.length > this.maxLength)"  value="<?php echo $_SESSION['acc_no']?>"><br>

<br><span style="margin-left: 25px; font-weight: bold;">Type of Loan<span style="color:red">*</span> : </span>

<select id="loancat" name="loancat" class="r2"  size="1" title="Select a Loan Category" onclick="roi()" required>
  <option></option>
  <option value="Education Loan">Education Loan</option>
  <option value="Home Loan">Home Loan</option>
  <option value="Personal Loan">Personal Loan</option>
  <option value="Vehicle Loan">Vehicle Loan</option>
</select>
<br><br><span style="margin-left: 25px; font-weight: bold;">Rate of Interest (ROI) : </span>
<label id="roi" style="margin-left: 25px; font-weight: bold; color: blue;">___%</label>
<input id="roi_hidden" name="roi_hidden" type="hidden" value="">

<div class="rel"><span style="color:red">INCOME</span> DETAILS :</div>
<table>
  <tr>
    <td>
      <span style="margin-left: 25px; font-weight: bold;">Occupation<span style="color:red">*</span> : </span>
      <select id="occ" name="occ" class="r2"  size="1" title="Select an Occupation" required>
        <option></option>
        <option value="Salaried">Salaried</option>
        <option value="Self-Employed">Self-Employed</option>
        <option value="Others" >Others</option>
      </select>
    </td>
    <td style="padding-left: 50px;">
      <span style="margin-left: 25px; font-weight: bold;">Net Income (₹)<span style="color:red">*</span> : </span>
      <input class="r2" type="number" min="9999" max="100000000" minlength="4" maxlength="9"
      oninput="javascript: if (this.value.length < this.minLength) this.value = this.min;
      if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
      required>
    </td>
  </tr>
</table> 
<div class="rel"><span style="color:red">LOAN</span> DETAILS :</div>
<span style="margin-left: 25px; font-weight: bold;">Loan Amount Required (₹)<span style="color:red">*</span> : </span>
<input id="amount" name="amount" class="r2" type="number" min="99999" max="99999999" minlength="6" maxlength="8" 
oninput="javascript: if (this.value.length < this.minLength) this.value = this.min;
if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
required>
<span style="margin-left: 25px; font-weight: bold;">Loan Duration (in months)<span style="color:red">*</span> : </span>
<select id="duration" name="duration" class="r2"  size="1" title="Select Duration" required>
        <option></option>
        <option value="24">24 months</option>
        <option value="60">60 months</option>
        <option value="120" >120 months</option>
        <option value="180" >180 months</option>
        <option value="240" >240 months</option>
</select>

<div class="rel"><span style="color:red">PERSONAL</span> DETAILS :</div>
<br><span style="margin-left: 25px; font-weight: bold;">Date Of Birth (DOB)<span style="color:red">*</span> : </span>
<input type="date" id="d1" name="d1" min="1960-01-01" onclick="maxdate()" class="r2" required>
<br><br><span style="margin-left: 25px; font-weight: bold;">Email - ID<span style="color:red">*</span> : </span>
<input type="email" id="e2" class="r2" required/>

<br><br><span style="margin-left: 25px; font-weight: bold;">Mobile No.<span style="color:red">*</span> : </span>
<input class="r2" id="mobno" type="number" min="1000000000" max="9999999999" required>
<br><br><input type="submit" value="Submit" class="button">
<input type="reset" value="Reset" class="button"/>

<button class ="calc" onclick="tocalc()">
  <img width="150px" src="calc.png" alt="EMI CALCULATOR">
  <br>EMI CALCULATOR</button>
  <br><br><input type="button" onclick='window.open("loan_display.php")' value="View Active loans" class="button">

</form>
</body>
</html>