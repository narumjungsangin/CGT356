<!doctype html>
<html>
    <head>
    <meta charset = "utf-8">
    <title>untitle document</title>

    <style type = "text/css"> 
        ul{
            list-style: none;
            margin-top: 5px;
        }

        ul li{
            display:block; float:left; width:100%; height:1%;
        }
        ul li label{
            float:left; padding: 7px; color: #6666ff;
        }

        ul li input{
            float:right; margin: 10px; border:1px solid #ccc; padding: 3px; font-family: Gotham, "Helvetica Neue", Helvetica Neue;
            width: 60%
        }

        li input:focus{
            border: 1px solid #666;
        }
        fieldset{
            padding:10px; border: 1px solid #ccc; width: 40px; overflow: auto; margin: 10px;
        }
        legend{
            color: #000099; margin: 0 10px 0 0; padding : 0 5px; font-size: 11pt; font-weight: bold;
        }
        label span{
            color: #ff0000;
        }
        p{
            padding-top:150px; font-size: 14px; padding-left: 20px;
        }
        fieldset#info{
            position: absolute; top: 60px; left: 20px; width:460px;
        }
        fieldset#submit{
            position: absolute; top:200px; left:20px; width: 460px; text-align: center;
        }
        fieldset input#submitBtn{
            background: #e5e5e5; color: #000099; border: 1px solid #ccc; padding: 5px; width: 150px;
        }


    </style>
</head>

<body>
    <h1 style = "font-size 14pt; text-indent: 360px;"> Assign02 - Login Page B</h1>
    <form id = "form0" name = "form0" action="loginB.php" method="post">

        <fieldset id = "info">
            <!-- <legend>Login</legend> -->
            <ul>
                <li>
                    <label title = "userID" for = "userID">UserID<span>*</span></label>
                    <input type="text" name="userID" id="userID" size="50" maxlength="50">
                </li>
                <li>
                    <label title = "passwd" for = "passwd">Password<span>*</span></label>
                    <input type="password" name="passwd" id="passwd" size="50" maxlength="50">  
                </li>

                    <p>
                    <br />
            		<strong>ID Password for Part II</strong><br /><br />
        			ID: Doosan   PW: Bears<br />
        			ID: NC  PW: Dinos <br />
        			ID: Hanwha  PW: Eagles <br />
        			ID: Samsung PW: Lions <br />
                    <br />
                    This is indexB. If you want to go to <a href= "index.php">index page</a> press the following button. <br />
    </p>
                    
            </ul>
        </fieldset>
        <fieldset id="submit">
                <input type= "submit" id="SubmitBtn" name="SubmitBtn" value="Login" />
        </fieldset>
   
        </form>
        <script type = "text/javascript">
            document.getElemntByID("userID").focus();
        </script>
	

</body>

</html>