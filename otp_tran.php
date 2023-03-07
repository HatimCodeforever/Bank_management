<?php
session_start(); ?>
<html>
    <head>
        <title> ONE TIME PASSWORD </title>
        </title>
    </head>
    <body>
        <style>
            body
            {
                background-color: rgba(83,129,136,1);
                padding-top: 20mm;
            }
            .otp
            {
                font-size: large;
                font-family: 'Times New Roman', Times, serif;
                border-color: black;
                border-width: 5px;
                border-style: solid;
                display: inline-block;
                background-color: rgba(230,157,93,1);
                padding: 8mm 10mm 10mm 10mm;
            }
            input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        }
        </style>
        <script>

        function email(user_email)
         {
        var avg,part1,part2;
        splitted = user_email.split("@");
        part1=splitted[0];
        part2=splitted[1];
        avg=part1.length/2;
        part1=part1.substring(0,(part1.length-avg));
        return part1+"......@"+part2;
        }

        function phno(user_phno)
         {
        var no1,no2,no3,no4;
        splitted = user_phno.split("");
        no1=splitted[6];
        no2=splitted[7];
        no3=splitted[8];
        no4=splitted[9];
        return "......"+no1+no2+no3+no4;
        }
        
        </script>
        <?php
         $acc=$_SESSION["acc_no"];
        if(isset($_POST["b_otp"])){ 
            if ($_POST["otp"]=="123456") {  
                $conn = mysqli_connect("localhost", "root", "", "db_cus") or 
                die("Connection Error: " . mysqli_error($conn));
                $query = "SELECT * from accinfo where ACCOUNT_NO=$acc"; 
                $result = mysqli_query($conn, $query) or 
                die(mysqli_error($conn));
                $row = mysqli_fetch_assoc($result);
                $balance = $row['BALANCE'];
                $pass = $row['PASSWORD']; 
                    $conn = mysqli_connect("localhost", "root", "", "db_cus") or 
                    die("Connection Error: " . mysqli_error($conn));
                   
                    $b_name=$_SESSION["b_name"];  
                    $amount=$_SESSION["amount"]; 
                    $today=$_SESSION["today"];
                    $account=$_SESSION["account"];
                    $ifsc=$_SESSION["ifsc"];
                    $b_bank=$_SESSION["b_bank"];
                    $query = "SELECT * from accinfo where ACCOUNT_NO=$account"; 
                    $result = mysqli_query($conn, $query) or 
                    die(mysqli_error($conn));
                    $row = mysqli_fetch_assoc($result);
                    $r_balance = $row['BALANCE'];
        
                    $query = "SELECT * from statement"; 
                    $result=mysqli_query($conn,$query);
                    while($roww=mysqli_fetch_assoc($result))
                    {
                        $trans=$roww['TRANS_ID'];
                    }
                    $trans=$trans+1;
                    $net="NETBANKING";
                    $r="SEND";
                    $query = "insert into netbanking (TRANS_ID,ACCOUNT_NO,TRANS_DATE,AMOUNT,BENEFICIARY_ACC,BENEFICIARY_NAME,IFSC,BENEFICIARY_BANK) values ('$trans','$acc','$today','$amount','$account','$b_name','$ifsc','$b_bank')"; 
                    $result = mysqli_query($conn, $query) or 
                    die(mysqli_error($conn));
                    $user_balance=$balance-$amount;
                    $rec_balance=$r_balance+$amount;
                    $query = "update accinfo set BALANCE='$user_balance' where ACCOUNT_NO=$acc "; 
                    $result = mysqli_query($conn, $query) or 
                    die(mysqli_error($conn));
                    $query = "update accinfo set BALANCE='$rec_balance' where ACCOUNT_NO='$account'"; 
                    $result = mysqli_query($conn, $query) or 
                    die(mysqli_error($conn));
                    $query = "insert into statement (TRANS_ID,ACCOUNT_NO,AMOUNT,TRANS_DATE,DESCC,B_ACC,TYPE) values ('$trans','$acc','$amount','$today','$net','$account','$r')"; 
                    $result = mysqli_query($conn, $query) or 
                    die(mysqli_error($conn));
                    $r="RECEIVE";
                    $trans=$trans+1;
                    $query = "insert into statement (TRANS_ID,ACCOUNT_NO,AMOUNT,TRANS_DATE,DESCC,B_ACC,TYPE) values ($trans,'$account','$amount','$today','$net',12030,'$r')";
                    $result = mysqli_query($conn, $query) or 
                    die(mysqli_error($conn));
                    mysqli_close($conn);
                    header("Location: receipt.php");
                    echo "<script>window.close();</script>";
                    exit();
            } 
            else
            {
                echo "<b><h1><center>Wrong Otp has been entered</b><center></h1>";
               
            }
        }
        
        ?>
        <form method="post">
        <center>
            <div class="otp">
                <h1>ONE TIME PASSWORD</h1><br>
                <script>
                document.write("<center>ENTER AN OTP WHICH HAS BEEN SEND TO <br> THIS MOBILE NUMBER="+phno("9969282009")+"  &nbsp&nbsp AND EMAIL= "+email("hatmsb11@gmail.com<br><br></center>"));
            </script>
                <input type="number" id="otp" name="otp" style="border-style: solid; border-color: rgba(84,140,132,1); border-width: 1mm;">
                <input type="submit"  name="b_otp"><br><br>
                IF NOT RECEIVED 
                <p id="remes" onclick="rel()"><u>CLICK HERE</u> TO RESEND THE OTP</p>
                </div>
        </center>
        </form>
        <script>
        function rel()
        {
            document.getElementById("remes").innerHTML="";
            document.getElementById("remes").innerHTML="OTP resended";
        }

        function chck()
        {
            var otp = document.getElementById("otp").value;
            if(otp == "123456")
            {
                alert("Transaction Succesfull !!");
                window.close();
                window.open("receipt.php");
            }
            else
            {
                alert("Wrong OTP pls try again");
            }
        }

        
        </script>
    </body>
</html>