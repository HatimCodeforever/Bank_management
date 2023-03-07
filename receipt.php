<?php
session_start(); ?>
<html>
    <head>
        <title> TRANSACTION RECEIPT</title>
        <link rel="stylesheet" href="main.css">
    </head>
    <body style="background-color: rgba(16,51,51,1); padding-top:40px ;">
        <header style="background-color: rgba(84,140,132,1); border-color: black; border-width: 1mm; border-style: solid; box-shadow: 0px 2px 15px rgb(15, 11, 11);">
            <!-- <a href="#" class="logo">Star Bank</a> -->
            <a href="menu.html" class="logo">
                <img src="star2.jpeg" style=" border-color: black; border-width: 2px; border-style: solid; padding: 2mm 2mm 2mm 2mm; background-color: white;">
            </a>
            <div class="rightSide">
                <ul class="navigation">
                    <li class="dropdown"><a href="javascrip:void(0)">NETBANKING</a>
                        <ul>
                            <li class="dropdownItem"><a href="add_ben.php">ADD BENEFICIARY</a></li>
                            <li class="dropdownItem"><a href="fund_transfer.php">FUND TRANSFER</a></li>
                            <li class="dropdownItem"><a href="statement.php">STATEMENT</a></li>
                        </ul> 
                    </li>
                    <li><a href="loan1.html" onclick='window.close()' target="_blank">LOANS</a></li>
                    <li class="dropdown"><a href="EMICALC.html">EMI CALCULATOR</a></li>
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
        <style>
            .rec
            {
                font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
                border-color: black;
                border-width: 5px;
                border-style: dashed;
                display: inline-block;
                background-color: rgba(84,140,132,1);
                padding: 10px 20px 10px 20px;
                box-shadow: 10px 8px 16px 10px rgba(0,0,0,0.2);
            }
           .rec input 
           {
               color: rgb(19, 54, 54);
               font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
               text-align: center;
               box-shadow: 10px 8px 16px 10px rgba(0,0,0,0.1);
           }
           .button input
            {
               background-color: rgb(28, 107, 95) ; 
               color: rgb(12, 36, 36);
            }
            .button input:hover
            {
               background-color: rgb(5, 54, 47) ; 
               /* color: rgba(16,51,51,1); */
            }
            input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        }
        </style>
        <?php
         $b_name=$_SESSION["b_name"];  
         $amount=$_SESSION["amount"]; 
         $today=$_SESSION["today"];
         $account=$_SESSION["account"];
         $ifsc=$_SESSION["ifsc"];
         $b_bank=$_SESSION["b_bank"];
         $_SESSION["fee"] = 4.5;
         $_SESSION["total"] = $_SESSION["amount"] + 4.5;

        ?>
        <form method='post'>
        <center>
             
        <br><br>
        <b><div class="rec">
                <h1 style="font-style: italic;">BANK RECEIPT</h1>
                <hr size="8" width="100%" color="black"><br>
                BENEFICIARY NAME: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <input type="text" id="b_name" disabled="disabled" value="<?php echo $b_name; ?>" style="border-color: black ; border-style: solid;"><br><br>
                DATE: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                &nbsp&nbsp&nbsp&nbsp&nbsp
                <input type="text" id="today" disabled="disabled" style="border-color: black ; border-style: solid;"><br><br>
                TIME:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <input type="text" id="time" disabled="disabled" style="border-color: black ; border-style: solid;"><br><br>
                BENEFICIARY ACCOUNT NO:&nbsp&nbsp&nbsp&nbsp&nbsp
                <input type="text" disabled="disabled" style="border-color: black ; border-style: solid;" value="<?php echo $account; ?>"><br><br>
                BANK IFSC_CODE:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <input type="text" disabled="disabled" style="border-color: black ; border-style: solid;" value="<?php echo $ifsc; ?>"><br><br>
                AMOUNT (₹):&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <input type="text" id="am" disabled="disabled" style="border-color: black ; border-style: solid;" value="<?php echo $amount; ?>"><br><br>
                CONVINIENCE FEE (₹):&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <input type="text" id="cf" disabled="disabled" style="border-color: black ; border-style: solid;" value="4.5"><br><br>
                TOTAL AMOUNT:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                &nbsp&nbsp&nbsp&nbsp
                <input type="text" disabled="disabled" value="<?php echo $amount+4.5; ?>" style="border-color: black ; border-style: solid;" id="total"><br><br><br>
                <div class="button">
                    <input  type="submit" value="OK" style="padding: 10px 20px 10px 20px;" onclick='window.close() ,window.open("fund_transfer.php")'>
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                &nbsp&nbsp&nbsp&nbsp
                <input  type="submit" value="PRINT" style="padding: 10px 20px 10px 20px;" onclick='window.open("receipt_pdf.php")'><br><br>
                <br><br>
                </div>
        </div>
            </b>
    </center>
    </form>
        <script>
             function logout()
    {
        if (confirm('Are you sure you want to Logout')) {
        alert("Logged Out Succesfully :)")
        } 
        else {
        return false;
        }
    }
            let today = new Date().toISOString().substr(0, 10);
            document.getElementById("today").value = today;
            let to = new Date();
            var time = to.getHours() + ":" + to.getMinutes() + ":" + to.getSeconds();
            document.getElementById("time").value = time;
        </script>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>