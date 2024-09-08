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
        legend{ color:#000099; margin: 0 10px 0 0; padding: 0 5px; font-size:11px; font-weight: bold;}
        label span{ color: #ff0000;}
        fieldset#login {position:absolute; top:60px; left:20px; height: 360px;}
        fieldset#register{position:absolute;  top:60px; left:460px; height: 360px;}
        fieldset#submit{position:absolute;  top:300px; left:20px; width: 330px; text-align:center;}
        fieldset input#SubmitBtn {background:#E5E5E5; color:#000099; border:1px solid #ccc; padding:5px; width:150px;}
    </style>
</head>

<body>
    <h1 style = "font-size 14pt; text-indent: 360px;"> Project2 - Login</h1>
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
                    <input type="passwrd" name="passwd" id="passwd" size="30" maxlength="30">  
                </li>
                
            </ul>
            <fieldset id="submit">
            <input id = "SubmitBtn" name = "SubmitBtn" type = "submit" value = "Login" />
        </fieldset>
           
        </fieldset>
        </form>
 
        <form id = "form1" name = "form1" action="getRegister.php" method="post">
        <fieldset id = "register">
            <legend>Register</legend>
        <ul>
                <li> <label title = "UserName" for = "userName">User Name <span>*</span></label> <input type="text" name="userName" id="userName" size="30" maxlength="30" /></li>
                <li> <label title = "FirstName" for = "firstName">First Name <span>*</span></label> <input type="text" name="firstName" id="firstName" size="30" maxlength="30" /></li>
                <li> <label title = "LastName" for = "lastName">Last Name <span>*</span></label> <input type="text" name="lastName" id="lastName" size="30" maxlength="30" /></li>
                <li> <label title = "Passwd" for = "passwd">Password <span>*</span></label> <input type="text" name="passwd" id="passwd" size="30" maxlength="30" /></li>
                <li> <label title = "Email" for = "email">Email <span>*</span></label> <input type="text" name="email" id="email" size="30" maxlength="30" /></li>
                <li> <label title = "NewsLetter" for = "newsLetter">news Letter <span>*</span></label> <input type="text" name="newsLetter" id="newsLetter" size="30" maxlength="30" /></li>

                

        </ul>
        <fieldset id="submit">
                <input id = "SubmitBtn" name = "SubmitBtn" type = "submit" value = "Proceed" />
        </fieldset>

        </fieldset>

        </form>
        <script type = "text/javascript">
            document.getElemntByID("UserName").focus();
        </script>
    
</body>

</html>