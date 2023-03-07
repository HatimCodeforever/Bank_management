<?php
  session_start();
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>transactions</title>
  <link rel="stylesheet" href="mp1.css">
  <link rel="stylesheet" href="main.css">

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
                <li class="dropdownItem"><a href="add_ben.php">ADD BENEFICIARY</a></li>
                <li class="dropdownItem"><a href="fund_transfer.php">FUND TRANSFER</a></li>
            </ul> 
        </li>
        <li><a href="loan1.php" onclick='window.close()' target="_blank">LOANS</a></li>
        <li class="dropdown"><a href="EMICALC.php">EMI CALCULATOR</a></li>
        <li class="dropdown"><a href="profile.php" onclick='window.close()' target="_blank" id="user">
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

  <table id="myTable">
    <tr class="header">
      <th>Loan ID</th>
      <th>Amount</th>
      <th>Duration</th>
      <th>Rate</th>
      <th>Type</th>
      <th>End Date</th>
    </tr>
    <?php
    $acc = $_SESSION["acc_no"];
    $con=mysqli_connect('localhost','root','','db_cus') or die("Connection Failed");
    $result=mysqli_query($con,"select * from loan where ACCOUNT_NO = $acc AND STATUS = 'ONGOING'");
    while($row=mysqli_fetch_assoc($result))
      {

  ?>
   <tr>
    <td><?php echo $row["LOAN_ID"]; ?></td>
    <td><?php echo $row["AMOUNT"]; ?></td>
    <td><?php echo $row["DURATION"]; ?></td>
    <td><?php echo $row["RATE"]; ?></td>
    <td><?php echo $row["TYPE"]; ?></td>
    <td><?php echo $row["DATE_END"]; ?></td> 
  </tr>
   <?php } ?>
  </table>
</body>

</html>