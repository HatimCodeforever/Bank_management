<html>
<head>
<title>EMI CALCULATOR</title>
<link rel="stylesheet" href="mp1.css">
  <link rel="stylesheet" href="main.css">
<style>

        h2 {
            margin-top: 20px;
        }
          
        .calculator {
            width: 400px;
            height: 500px;
            background-color: black;
            margin-left: 500px;
            margin-top: 30px;
            padding-left: 100px;
            padding-top: 20px;
            border-radius: 50px;
            color: white;
        }
          
        input {
            padding: 10px;
            width: 70%; 
            margin-top: 10px;
            color: black;
            font-weight: bold;
            font-family: cursive;

        }

</style>

<script>

function Calculate(){
  var p = document.getElementById("amount").value;
  var r = document.getElementById("rate").value;
  var n = document.getElementById("months").value;
  var r1 = r/1200;
  var x = ((1+r1)**n);
  var emi = p * r1 * (x / (x - 1));
  document.getElementById("emi").innerHTML="EMI : ₹ "+emi.toFixed(2);
}

</script>
</head>

<body>
  <header>
    <a href="main.html" class="logo">
      <img src="star2.jpeg">
    </a>
    <div class="rightSide">
      <ul class="navigation">
        <li class="dropdown"><a href="javascrip:void(0)">NETBANKING</a>
            <ul>
                <li class="dropdownItem"><a href="http://localhost:/add_ben.php">ADD BENEFICIARY</a></li>
                <li class="dropdownItem"><a href="http://localhost:/fund_transfer.php">FUND TRANSFER</a></li>
                <li class="dropdownItem"><a href="http://localhost:/statement.php">STATEMENT</a></li>
            </ul> 
        </li>
        <li><a href="http://localhost:/loan1.php" onclick='window.close()' target="_blank">LOANS</a></li>
        <li class="dropdown"><a href="http://localhost:/profile.php" onclick='window.close()' target="_blank" id="user">
            <ion-icon name="person-outline"></ion-icon>
            </a>
            <ul>
                <li class="dropdownitem">
                    <a href="main2.html" onclick="return logout()">
                        <ion-icon name="log-out-outline"></ion-icon>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
    </div>
  </header>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

  <div class="calculator">
    <h2>EMI CALCULATOR</h2><br>

    <p>Amount (₹)     :
        <input id="amount" type="number" onchange="Calculate()">
    </p>

    <br><p>Interest Rate (p.a.%) :
        <input id="rate" type="number" step="0.1" onchange="Calculate()">
    </p>

    <br><p>Time period (in months) :
        <input id="months" type="number" onchange="Calculate()">
    </p>
    <br>
    <h2 id="emi"></h2>
</div>
</body>
</html>