<?php
session_start();
include("includes/OpenDbConn.php");
?>

<!doctype html>
<html>
    <head>
    <title>Project2 - Login</title>
    <meta charset = "utf-8">
    <title>untitle document</title>
    <style type="text/css">
        ul{ list-style: none; margin-top:5px;}
        ul li{display:block; float:left; width:100%; height:1%;}
        ul li label{ float:left; padding:7px; color:#6666ff;}
        ul li input, ul li textarea{float: right; margin-right:10px; border:1px solid #ccc; padding:3px; 
			font-family: Georgia, Times New Roman, Times, serif; width:60%;}
        li input:focus, li textarea:focus{border: 1px solid #666;}
        fieldset{ padding:10px; border:1px solid #ccc; width:400px; overflow:auto; margin:10px;}
        input[type="radio"]{float: none;  padding: 4px; width:30px; margin-left: 50px;}
        legend{ color:#000099; margin: 0 10px 0 0; padding: 0 5px; font-size:11px; font-weight: bold;}
        label span{ color: #ff0000;}
        fieldset#login {position:absolute; top:60px; left:20px; height: 360px;}
        fieldset#register{position:absolute;  top:60px; left:460px; height: 360px;}
        fieldset#submit{position:absolute;  top:300px; left:20px; width: 330px; text-align:center;}
        fieldset input#SubmitBtn {background:#E5E5E5; color:#000099; border:1px solid #ccc; padding:5px; width:150px;}
        form{padding-top: 130px;}
    </style>
</head>

<body>
<div id="header">
        <h1 style="text-align:center">Project 2 - Login</h1>

    </div>

    <form id = "form0" name = "form0" action="login.php" method="post">

        <fieldset id = "login">
            <legend>Login</legend>
            <ul>
                <li>
                    <label title = "UserName" for = "userName">User Name<span>*</span></label>
                    <input type="text" name="userName" id="userName" size="30" maxlength="30">
                </li>
                <li>
                    <label title = "Passwd" for = "passwd">Password<span>*</span></label>
                    <input type="password" name="passwd" id="passwd" size="30" maxlength="30">  
                </li>
                
            </ul>
            <fieldset id="submit">
            <input id = "SubmitBtn" name = "SubmitBtn" type = "submit" value = "Login" />
        </fieldset>
           
        </fieldset>
        </form>
 
        <form id = "form1" name = "form1" action="getRegister.php" method="post">
        <fieldset id = "register">
        <legend>Insert into user table</legend>
            <ul>
                <li>
                    <label title="userName" for = "userName">User Name(ID)</label>
                    <input name = "userName" id="userName" type="text" size="20" maxlength="20" />
                </li>

                <li>
                    <label title="firstName" for = "firstName">First Name</label>
                    <input name = "firstName" id="firstName" type="text" size="20" maxlength="20" />
                </li>

                <li>
                    <label title="lastName" for = "lastName">Last Name</label>
                    <input name = "lastName" id="lastName" type="text" size="20" maxlength="20" />
                </li>

                <li>
                    <label title="password" for = "password">password</label>
                    <input name = "password" id="password" type="password" size="20" maxlength="20" />
                </li>

                <li>
                    <label title="email" for = "email">email</label>
                    <input name = "email" id="email" type="text" size="20" maxlength="20" />
                </li>

                <li>
                    <label title="newsLetter" for = "newsLetter">newsLetter</label>
                    <div>
                        <input name = "newsLetter" id="newsLetter" type="radio" value="Yes"/> Yes
                        <input name = "newsLetter" id="newsLetter" type="radio" value="No"/> No

                    </div>
                </li>
                <li>
                    <span><?php 
                    if(isset($_SESSION["errorMessage"])){echo($_SESSION["errorMessage"]);}
                    ?></span>
                </li>

                <li>
                    <input type="submit" value="Insert Info" name="submit" id="submit" />
                </li>
            </ul>
        </fieldset>
    </form>
        </form>
        <?php
        $_SESSION["errorMessage"] = "";
          ?>
        <script type = "text/javascript">
            document.getElemntByID("userName").focus();

        </script>
    
</body>

</html>