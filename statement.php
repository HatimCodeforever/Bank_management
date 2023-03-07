<?php
  session_start();
  ?>
<!DOCTYPE html>
<html lang="en">
<?php
class statements{
  public $t_id,$dat,$des,$type,$amount,$ben;
  function __construct($r){
    $this -> t_id =  $r['TRANS_ID'];
    $this -> dat =  $r['TRANS_DATE'];
    $this -> des = $r['DESCC'];
    $this -> type = $r['TYPE'];
    $this -> amount =  $r['AMOUNT'];
    $this -> ben = $r['B_ACC'];
  }
    
} 
?>
<head>
  <title>transactions</title>
  <link rel="stylesheet" href="mp1.css">
  <link rel="stylesheet" href="main.css">

  <script>
    var scrollpos = 0, maxScroll = 230, blanks = "",si;
    function stopscroll()
    {
      clearInterval(si);
    }
    function scrolltext() {
      
      text = "Note: the table is arranged by newest first"
      sec = 50
      si = window.setInterval(function () {
        document.getElementById("show").innerHTML = blanks + text;
        window.status = blanks + text;
        ++scrollpos;
        blanks = blanks + "&nbsp";
        if (scrollpos > maxScroll) {
          scrollpos = 0;
          blanks = "";
        }
      }, sec);
    }

    function logout()
    {
        if (confirm('Are you sure you want to Logout')) {
        alert("Logged Out Succesfully :)")
        } 
        else {
        return false;
        }
    } 

      function myFunction() {
        // Declare variables
        var input, filter, table, tr, td_tid, td_date, td_amnt, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
          td_tid = tr[i].getElementsByTagName("td")[0];
          td_date = tr[i].getElementsByTagName("td")[1];
          td_amnt = tr[i].getElementsByTagName("td")[4]

          if (td_tid && td_date && td_amnt) {
            txtValue1 = td_tid.textContent || td_tid.innerText;
            txtValue2 = td_date.textContent || td_date.innerText;
            txtValue3 = td_amnt.textContent || td_amnt.innerText;


            if ((txtValue1.toUpperCase().indexOf(filter) > -1) || (txtValue2.toUpperCase().indexOf(filter) > -1) || (txtValue3.toUpperCase().indexOf(filter) > -1)) {
              tr[i].style.display = "";
            } else {
              tr[i].style.display = "none";
            }
          }
        }
      }
      function sort_type(type) {

        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        /*var a_none = document.getElementsByClassName("dropdown-content");
        a_none.style.display = "none";*/
        // Loop through all table rows, and hide those who don't match the search query
        if (type == 1) {
          filter = "SEND";
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[3];
            if (td) {
              txtValue = td.textContent || td.innerText;
              if ((txtValue.toUpperCase().indexOf(filter) > -1)) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }
          }
        }
        if (type == 2) {
          filter = "RECEIVE";
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[3];
            if (td) {
              txtValue = td.textContent || td.innerText;
              if ((txtValue.toUpperCase().indexOf(filter) > -1)) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }
          }
        }
        if (type == 3) {
          filter = "NETBANKING";
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[2];
            if (td) {
              txtValue = td.textContent || td.innerText;
              if ((txtValue.toUpperCase().indexOf(filter) > -1)) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }
          }
        }
        if (type == 4) {
          filter = "ATM";
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[2];
            if (td) {
              txtValue = td.textContent || td.innerText;
              if ((txtValue.toUpperCase().indexOf(filter) > -1)) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }
          }
        }
        if (type == 5) {
          ;
          for (i = 0; i < tr.length; i++) {
            tr[i].style.display = "";
          }
        }
      }
      function sort_amount_largest() {
        var table, rows, switching, i, x, y, shouldSwitch;
        table = document.getElementById("myTable");
        switching = true;
        while (switching) {
          switching = false;
          rows = table.rows;
          for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;

            x = rows[i].getElementsByTagName("TD")[4];
            y = rows[i + 1].getElementsByTagName("TD")[4];

            if (Number(x.innerHTML) < Number(y.innerHTML)) {

              shouldSwitch = true;
              break;
            }
          }
          if (shouldSwitch) {

            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
          }
        }
      }
      function sort_amount_smallest() {
        var table, rows, switching, i, x, y, shouldSwitch;
        table = document.getElementById("myTable");
        switching = true;
        while (switching) {
          switching = false;
          rows = table.rows;
          for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;

            x = rows[i].getElementsByTagName("TD")[4];
            y = rows[i + 1].getElementsByTagName("TD")[4];

            if (Number(x.innerHTML) > Number(y.innerHTML)) {
              shouldSwitch = true;
              break;
            }
          }
          if (shouldSwitch) {
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
          }
        }
      }
      function sort_date_old() {
        var table, rows, switching, i, x, y, shouldSwitch, d1, d2, split, xinner, yinner;
        table = document.getElementById("myTable");
        switching = true;
        while (switching) {
          switching = false;
          rows = table.rows;
          for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("TD")[1];
            y = rows[i + 1].getElementsByTagName("TD")[1];

            xinner = x.innerHTML;
            yinner = y.innerHTML;

            split = xinner.split("/");
            d1 = new Date(split[2], split[1], split[0]);
            split = yinner.split("/");
            d2 = new Date(split[2], split[1], split[0]);
            if (d1 > d2) {
              shouldSwitch = true;
              break;
            }
          }
          if (shouldSwitch) {
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
          }
        }
      }
      function sort_date_new() {
        var table, rows, switching, i, x, y, shouldSwitch, d1, d2, split, xinner, yinner;
        table = document.getElementById("myTable");
        switching = true;
        while (switching) {
          switching = false;
          rows = table.rows;
          for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("TD")[1];
            y = rows[i + 1].getElementsByTagName("TD")[1];

            xinner = x.innerHTML;
            yinner = y.innerHTML;

            split = xinner.split("/");
            d1 = new Date(split[2], split[1], split[0]);
            split = yinner.split("/");
            d2 = new Date(split[2], split[1], split[0]);
            if (d1 < d2) {
              shouldSwitch = true;
              break;
            }
          }
          if (shouldSwitch) {
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
          }
        }
      }

  </script>
</head>

<body onload="scrolltext()">
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
  <div class="topchange" style="display:flex; justify-content: space-between;">
    <div style="display:flex;">
      <div class="dropdown">
        <button class="dropbtn">FILTER</button>
        <div class="dropdown-content">
          <div class="s_amount">
            <button>Sort by amount</button>
            <div class="am_sort">
              <button onclick="sort_amount_largest()">Largest first</button>
              <button onclick="sort_amount_smallest()">Smallest first</button>
            </div>
          </div>
          <div class="s_date">
            <button>Sort by date</button>
            <div class="dat_sort">
              <button onclick="sort_date_old()">Oldest first</button>
              <button onclick="sort_date_new()">Newest first</button>
            </div>
          </div>
          <div class="s_type">
            <button>Sort by type</button>
            <div class="type_sort">
              <button onclick="sort_type(1)">Withdraw</button>
              <button onclick="sort_type(2)">Deposit</button>
            </div>
          </div>
          <button onclick="sort_type(3)">Show netbankings</button>
          <button onclick="sort_type(4)">Show ATM</button>
          <button onclick="sort_type(5)">Show all</button>
        </div>
      </div>
      <form action="statement_pdf.php">
        <div >
          <button style="height:60px;width:150px;margin-left:10px;">DOWNLOAD</button>
        </div>
      </form>
    </div>
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search by ID, date or amount ">
  </div>
  
  <div class="rotate">
    <p id="show" onmouseover="stopscroll()" onmouseleave="scrolltext()"></p>
  </div>
  <table id="myTable">
    <tr class="header">
      <th>Trans. ID</th>
      <th>Date</th>
      <th>description</th>
      <th>type</th>
      <th>amount</th>

    </tr>
    <?php
    $acc = $_SESSION["acc_no"];
    $con=mysqli_connect('localhost','root','','db_cus') or die("Connection Failed");
    $result=mysqli_query($con,"select * from statement where ACCOUNT_NO = $acc");
    $arr = array();
    $i = 0;  
    while($row=mysqli_fetch_assoc($result))
      {
        $obj = new statements($row);
        $arr[$i] = $obj;
        if ($arr[$i]->des == "NETBANKING" && $arr[$i]->type == "SEND")
        {
          $r=mysqli_query($con,"select * from addben where B_ACCOUNT_NO = ". $row['B_ACC']."");
          $row_ben=mysqli_fetch_assoc($r);
          $ben_name = $row_ben['B_NAME'];
          $desc = "netbanking done to ".$ben_name;
        }
        elseif ($arr[$i]->des == "NETBANKING" && $arr[$i]->type == "RECEIVED")
        {
          $r=mysqli_query($con,"select * from addben where B_ACCOUNT_NO = ". $row['B_ACC']."");
          $row_ben=mysqli_fetch_assoc($r);
          $ben_name = $r['B_NAME'];
          $desc = "netbanking done from " .$ben_name;
        }
        else
        {
          $desc = $row['DESCC'];
        }
  ?>
   <tr>
    <td><?php echo $arr[$i]->t_id; ?></td>
    <td><?php echo $arr[$i]->dat; ?></td>
    <td><?php echo $desc; ?></td>
    <td><?php echo $arr[$i]->type; ?></td>
    <td><?php echo $arr[$i]->amount; ?></td> 
  </tr>
   <?php $i = $i + 1;} ?>
  </table>
</body>

</html>