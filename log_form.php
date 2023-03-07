<?php session_start() ?>
<html>
    <head>
        <title>LOGIN FORM</title>
    </head>
    <body style="padding-top: 25mm; background-color: rgba(103,129,136,1)">
        <style>
            .title
            {
            display: inline-block;
            float: left;
            }
            .log{
                font-size: large;
                font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
                border-color: black;
                border-width: 5px;
                border-style: groove;
                display: inline-block;
                background-color: rgba(230,157,93,1);
                padding: 8mm 20mm 20mm 20mm;
            }
            .log input
            {
                background-color:  rgba(245,195,149,1);
                font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
                color: rgb(80, 44, 10);
            }
            .button button
            {
                background-color: rgba(12,77,87,1);
                color: rgb(113, 194, 182);
            }
            .button button:hover
            {
                background-color: rgb(2, 36, 41);
            }
            .button input
            {
                font-family: sans-serif;
                background-color: rgba(12,77,87,1);
                color: rgb(113, 194, 182);
            }
            .button input:hover
            {
                background-color: rgb(2, 36, 41);
            }
        </style>
         <center>
            <div class="log">
                
                <div class="title">
                    <ion-icon name="person-circle-outline" style="font-size: 30mm; color: rgb(80, 44, 10);"></ion-icon>
                </div>
                <br><br>&nbsp&nbsp&nbsp<b style="font-size: 10mm;">LOGIN FORM</b> <br><br><br>
                    <form name="login_form" method="post" action="login.php" onsubmit="return login_validate()">
                        ACCOUNT NO. : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type="text" id="user_id" name='acc_no'><br><br>
                        PASSWORD: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type="password" id="pass" name='password'><br><br><br>
                        CAPTCHA: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type="text" id="capt" size="7" style="padding: 5px; padding-right: 8px;" disabled="disabled">
                        <button type="button" onclick="reff()" style="border-color: black; border-style: solid;"><img src="cap.jpg" ></button><br><br>
                        Retype The captcha :  &nbsp
                        <input type="text" id="cap2"><br><br><br>
                        <div class="button">
                            <input style="padding: 10px 30px 10px 30px;" type='submit' name='login' value='LOGIN'>&nbsp&nbsp
                            <button style="padding: 10px 30px 10px 30px;" onclick='window.close()'>CANCEL</button>
                        </div>
                        <div>
                            <center>
                                <?php
                                if(isset($_REQUEST['user_login']) && $_REQUEST['user_login']=='false')
                                {
                                    echo "<br>Invalid Username or Password";
                                    unset($_REQUEST['login']);
                                }
                                ?>
                            </center>
                        </div>
                    </form>
            </div>
        </center>
        <script>
            function reff()
            {
            var alphaNums = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
            var emptyArr = [];
            for (let i = 1; i <= 5; i++) 
            {
            emptyArr.push(alphaNums[Math.floor(Math.random() * alphaNums.length)]);
            }
            var c = emptyArr.join('');
           document.getElementById("capt").value=c;
            }
            
            function login_validate()
            {

                var x=document.forms["login_form"]["acc_no"].value;
                if (x==""){
                    document.forms["login_form"]["acc_no"].focus();
                    alert("Please Enter Account Number");
                    return false;
                }
                var x=document.forms["login_form"]["password"].value;
                if(x==""){
                    document.forms["login_form"]["password"].focus();
                    alert("Please Enter Password");
                    return false;
                }    
                var c1 = document.forms["login_form"]["capt"].value
                var c2 = document.forms["login_form"]["cap2"].value
                if(c1!=c2) {
                    document.forms["login_form"]["cap2"].focus();
                    alert("Incorrect Captcha");
                    return false;
                }
            }

        </script>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <?php
        // session_unset();
        ?>
    </body>
</html>