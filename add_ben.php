<?php
session_start();
?>
<html>
<head>
<title>ADD BENEFICIARY</title>
<link rel="stylesheet" href="main.css">
</head>
<body onload="scrolltext('ADD BENEFICIARY',200)" style="background-color:(230,157,93,1);">
    <header style="background-color: rgb(11, 110, 110);;">
        <a href="main.html" class="logo">
            <img src="star2.jpeg" style="border-color: black; border-width: 1mm; border-style: solid; padding: 2mm 2mm 2mm 2mm; background-color: white;">
        </a>
        <div class="rightSide">
            <ul class="navigation">
                <li class="dropdown"><a href="javascrip:void(0)">NETBANKING</a>
                    <ul>
                        <li class="dropdownItem"><a href="fund_transfer.php">FUND TRANSFER</a></li>
                        <li class="dropdownItem"><a href="statement.php">STATEMENT</a></li>
                    </ul> 
                </li>
                <li><a href="loan1.php" onclick='window.close()' target="_blank">LOANS</a></li>
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
        .add_ben form
        {
            font-family: 'Times New Roman', Times, serif;
            font-size: large;
            border-color: black;
                border-width: 5px;
                border-style: outset;
                display: inline-block;
                background-color: rgb(11, 110, 110);
                padding: 8mm 20mm 20mm 20mm;
        }
        input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        }
    </style>
    <h1 id="show" style="font-style: italic;"></h1> 
    <br><br><br>
    <center>
        <b>
        <div class="add_ben">
        <form name='ben_form' action='add_ben.php' method='post' onsubmit="return chck()">
            BANK NAME:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <input type="text" id="bank_name" name="bank_name"><br><br>
            IFSC_CODE:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <input type="text" id="ifsc" name="ifsc"><br><br>
            BENEFICIARY NAME:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <input type="" id="b_name" name="b_name"><br><br>
            ACCOUNT NUMBER:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <input type="number" id="account" name="account"><br><br>
            EMAIL ID :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <input type="text" id="email" name="email"><br><br>
            PHONE NUMBER :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <input type="number" id="mob_number" name="mob_number"><br><br>
            TRANSACTION PASSWORD:&nbsp&nbsp
            <input type="password" id="trans_pass" name="trans_pass"><br><br>
            <input type="submit" id="add_button" name="add_button" style="padding: 15px 40px 15px 40px; background-color: rgba(230,157,93,1); color: maroon;font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;" value="ADD">
        </form>
        </div></b>
    </center>
    <script type="text/javascript">
    function logout()
    {
        if (confirm('Are you sure you want to Logout')) {
        alert("Logged Out Succesfully :)");
        } 
        else {
        return false;
        }
    }
    function chck()
                {
                    var bn_name = document.getElementById("bank_name").value
                    var name = document.getElementById("b_name").value
                    var email = document.getElementById("email").value
                    var pass = document.getElementById("trans_pass").value
                    var mob = document.getElementById("mob_number").value
                    var acc = document.getElementById("account").value
                    var ifsc = document.getElementById("ifsc").value
                    var regexbname = /^[a-zA-Z ]{1,20}$/
                    var regexname = /^[a-zA-z ]{1,30}$/
                    var regexemail =  /^[a-zA-Z][0-9a-zA-Z_]{1,}[@][a-zA-Z]{1,}([.])[a-zA-Z]{1,}([.])?[com]{1,}$/
                    var regexmob =  /^[0-9]{10}$/
                    var regexacc = /^[0-9]{5}$/
                    var regexifsc = /^[a-z A-Z 0-9]{1,8}$/

                    if (regexbname.test(bn_name) == false)
                    {
                        document.forms["ben_form"]["bn_name"].focus();
                        alert("Bank Name can only have characters and can only be of 20 alphabets!");
                        return false;
                    }
                    if (regexifsc.test(ifsc) == false)
                    {
                        document.forms["ben_form"]["ifsc"].focus();
                        alert("IFSC code should not more than 8 characters!");
                        return false;
                    }
                    if (regexname.test(name) == false)
                    {
                        document.forms["ben_form"]["b_name"].focus();
                        alert("Name can only have characters and can only be of 30 alphabets!");
                        return false;
                    }
                    if (regexacc.test(acc) == false)
                    {
                        document.forms["ben_form"]["account"].focus();
                        alert("Account number should not have characters and should of 5 digits!");
                        return false;
                    }
                    if (regexemail.test(email) == false)
                    {
                        document.forms["ben_form"]["email"].focus();
                        alert("Email is incorrect!");
                        return false;
                    }
                    if (regexmob.test(mob) == false)
                    {
                        document.forms["ben_form"]["mob_number"].focus();
                        alert("Mobile should not have characters and should of 10 digits!");
                        return false;
                    }

                    var password = '<?php echo $_SESSION['password'] ?>';
                    
                    if (pass != password)
                    {
                        document.forms["ben_form"]["trans_pass"].focus();
                        alert("Password Incorrect!");
                        return false;
                    }
                }

            var scrollpos = 0, maxScroll = 138, blanks = "";
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
    </script>
     <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
     <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <?php
    if(isset($_POST['add_button'])) {
        $con = mysqli_connect('localhost', 'root', '');
        mysqli_select_db($con, 'db_cus');

        $name = $_POST['b_name'];
        $acc_no = $_SESSION['acc_no'];
        $b_acc_no = $_POST['account'];
        $ifsc = $_POST['ifsc'];
        $bank = $_POST['bank_name'];
        $email = $_POST['email'];
        $phone = $_POST['mob_number'];

        $sql = "INSERT INTO `addben` (B_NAME, ACCOUNT_NO, B_ACCOUNT_NO, BANK_IFSC, BANK_NAME, EMAIL, PHONE) VALUES ('$name', '$acc_no', '$b_acc_no', '$ifsc', '$bank', '$email', '$phone') ";

        if(mysqli_query($con, $sql)) {
            echo "<script> alert('Beneficiary Added Successfully.') </script>";
        }
        else {           
            echo "<script> alert('Error in adding Beneficiary, please try again in some time.') </script>";
        }

    }
    ?>
</body>
</html>