<?php
session_start(); ?>
<html>
<head>
<title>FUND TRANSFER</title>
<link rel="stylesheet" href="main.css">
</head>
<body onload="ll()">
    <header style="background-color: rgba(230,157,93,1); border-color: black; border-width: 1mm; border-style: solid;">
        <a href="main.html" class="logo">
            <img src="star2.jpeg" style="border-color: black; border-width: 1mm; border-style: solid; padding: 2mm 2mm 2mm 2mm; background-color: white;">
        </a>
        <div class="rightSide">
            <ul class="navigation">
                <li class="dropdown"><a href="javascrip:void(0)">NETBANKING</a>
                    <ul>
                        <li class="dropdownItem"><a href="add_ben.php">ADD BENEFICIARY</a></li>
                        <li class="dropdownItem"><a href="statement.php">STATEMENT</a></li>
                    </ul> 
                </li>
                <li><a href="loan1.html" onclick='window.close()' target="_blank">LOANS</a></li>
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
    <style>

        .fund_transfer
        {
            font-family: 'Times New Roman', Times, serif;
            text-align: center;
            font-size: large;
            color: black;
            border-color: black;
            border-width: 5px;
            border-style: groove;
            display: inline-block;
            background-color: rgba(230,157,93,1);
            padding: 8mm 20mm 20mm 20mm;
        }
        .fund_transfer select
        {
            background-color: rgba(83,129,140,1);
            color: black;
            color: black;
            border-color: black;
            border-width: 2px;
        }
        .fund_transfer input
        {
            font-family: 'Times New Roman', Times, serif;
            text-align: center;
            color: black;
            border-color: black;
            border-width: 2px;
            border-style: solid;
            background-color:  rgba(83,129,140,1);;
        }
        input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        }
    </style>
    <?php
    $conn = mysqli_connect("localhost", "root", "", "db_cus") or 
    die("Connection Error: " . mysqli_error($conn));
    $acc=$_SESSION['acc_no'];
    $query = "SELECT * from accinfo where ACCOUNT_NO=$acc"; 
    $result = mysqli_query($conn, $query) or 
    die(mysqli_error($conn));
    $row = mysqli_fetch_assoc($result);
    $balance = $row['BALANCE'];
    $pass = $row['PASSWORD'];
    
    if(isset($_POST['pay_button'])){ 
        if (empty($_POST["amount"]) || empty($_POST["account"]) || empty($_POST["today"]) || empty($_POST["remark"]) || empty($_POST["ifsc"]) || $_POST["b_name"]=="Select One of the Beneficairies" || empty($_POST["password"])) {  
            $errMsg = "<center><b>Error! You didn't enter all the fileds.</b></center>";  
                     echo $errMsg;  
        } 
        else if (!preg_match ("/^[0-9]{1,6}$/", $_POST['amount']) ) {  
            $ErrMsg = "<center><b>Amount cannot be more than 100000.</b></center>";  
                     echo $ErrMsg;  
        } 
        else if ($_POST['amount']>$balance)
            {
                echo("<center><b>Not enough Amount !!</b></center>");
            }
        else if (!preg_match ("/^[a-zA-z ]{1,20}$/", $_POST['remark']) ) {  
            $ErrMsg = "<center><b>Remarks cannot be bigger than 10 characters and you cannot use special characters.</b></center>";  
                echo $ErrMsg;  
        } 
        else if ($_POST["password"] != $pass ) {  
            $ErrMsg = "<center><b>Incorrect Transaction password.</b></center>";  
                echo $ErrMsg;  
        }
        else{
            $_SESSION["b_name"] = $_POST["b_name"];
            $_SESSION["amount"] = $_POST["amount"];
            $_SESSION["today"] = $_POST["today"];
            $_SESSION["account"] = $_POST["account"];
            $_SESSION["ifsc"] = $_POST["ifsc"];
            $_SESSION["b_bank"] = $_POST["b_bank"];
            header("Location: otp_tran.php");
            echo "<script>window.close();</script>";
            exit();
        }

        

    }

    mysqli_close($conn);
    

    ?>
     <br><h1 id="show" style="font-style: italic; font-family: 'Times New Roman', Times, serif;"></h1> 
     <br>
    <center>
        <form method="post" id="my_form">
        <b>
        <div class="fund_transfer">
        
        BENEFICIARY NAME:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <select id="b_name" name="b_name" size="1" onchange="sl()">
            <option style="color: black;">Select One of the Beneficairies</option>
            <?php
            $conn = mysqli_connect("localhost", "root", "", "db_cus") or 
            die("Connection Error: " . mysqli_error($conn));
            $query = "SELECT * from addben where ACCOUNT_NO=$acc"; 
            $result=mysqli_query($conn,$query);
            while($roww=mysqli_fetch_assoc($result))
            {
                ?> <option style="color: black;"><?php echo $roww['B_NAME'] ?></option><?php
            }
            mysqli_close($conn);
            ?>
        </select><br><br>
        BANK IFSC_CODE:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <input type="text" id="ifsc" name="ifsc"><br><br>
        DATE:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <input type="text" id="today" name="today" ><br><br>
        ACCOUNT NUMBER:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <input type="number" name="account"  id="account"><br><br>
        BANK NAME:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <input type="text" id="b_bank" name="b_bank"><br><br>
        AMOUNT (₹):&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <input type="number" id="amount" name="amount"><br><br>
        REMARKS:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <input type="text" id="remarks" name="remark"><br><br>
        TRANSACTION PASSWORD:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <input type="password" id="trans_pass" name="password"><br><br>
        <input type="submit" id="pay_button" name="pay_button" style="padding: 10px 20px 10px 20px;  background-color:  rgba(12,77,87,1); color:rgb(35, 205, 231);" value="PAY" >
       </div></b>
       </form>
       
    </center>
   
    <?php
            $conn = mysqli_connect("localhost", "root", "", "db_cus") or 
            die("Connection Error: " . mysqli_error($conn));
            $query = "SELECT * from accinfo where ACCOUNT_NO=12030"; 
            $result = mysqli_query($conn, $query) or 
            die(mysqli_error($conn));
            $row = mysqli_fetch_assoc($result);
            $balance = $row['BALANCE'];
            $pass = $row['PASSWORD'];
           
            mysqli_close($conn);

            function ssl()
            {
                if(isset($_POST['b_name'])){
                    if(!empty($_POST['b_name'])) {
                        $selected = $_POST['b_name'];
                    } 
                    }
                for($i=0;$i<sizeof($b_name);$i++)
                if($selected == $b_name[$i])
                {
                    $_POST['account']=$b_acc[$i];
                    $_POST['ifsc']=$b_ifsc[$i];
                }
            }  
            ?>
            
            
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
        
    
    function sl()
        {
            var sel=document.getElementById("b_name").value;
            $.ajax({
                url:"list.php",
                method: "POST",
                data:{
                    name : sel
                },
                success:function(data){
                    $("#ifsc").val(data);
                }

            })
            $.ajax({
                url:"list1.php",
                method: "POST",
                data:{
                    name : sel
                },
                success:function(data){
                    $("#account").val(data);
                }

            })
            $.ajax({
                url:"list2.php",
                method: "POST",
                data:{
                    name : sel
                },
                success:function(data){
                    $("#b_bank").val(data);
                }

            })
        }

        function ll()
        {
            var scrollpos = 0, maxScroll = 175, blanks = "";
            scrolltext('FUND TRANSFER',200);
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
            
        
        let today = new Date().toISOString().substr(0, 10);
        document.getElementById("today").value = today;
        }




    </script>
     <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
     <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</body>
</html>