<?php

//prevent people from type the URL of this page
if( empty($_POST["name"]) ){
    header("Location:index.php");
    exit;
}


?>
<!Doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Assign 03 - displayFormData</title>
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
        fieldset#billing {position:absolute; top:60px; left:20px;}
        fieldset#shipping{position:absolute;  top:60px; left:460px;}
        fieldset#submit{position:absolute;  top:540px; left:20px; width: 840px; text-align:center;}
        fieldset input#SubmitBtn {background:#E5E5E5; color:#000099; border:1px solid #ccc; padding:5px; width:150px;}
    </style>

</head>

<body>
    <h1 style= "fontsize: 14px; text-indent: 360px;"> Assign03 - displayFormData Page</h1>
    <form id = "form0" name = "form0" action="getFormData.php" method = "post">
        <fieldset id = "billing">
            <legend>Billing Information</legend>
        <ul>
            <li><span><?php echo($_POST["name"]); ?></span></li>
            <li><span><?php echo($_POST["address"]); ?></span></li>
            <li><span><?php echo($_POST["city"]); ?>, <?php echo($_POST["state"]); ?> <?php echo($_POST["zip"]); ?></span></li>
            <li><span><?php echo($_POST["country"]); ?></span></li>
            <li><span><?php echo($_POST["phone"]); ?></span></li>
            <li><span><?php echo($_POST["email"]); ?></span></li>
            <li><span><br/>Comments:<br/><?php echo($_POST["comments"]); ?></span></li>
               
        </ul>
        </fieldset>
        <fieldset id = "shipping">
            <legend>Shipping Information(if diffrent from billing)</legend>
        <ul>
            <li><span><?php echo($_POST["Sname"]); ?></span></li>
            <li><span><?php echo($_POST["Saddress"]); ?></span></li>
            <li><span><?php echo($_POST["Scity"]); ?>, <?php echo($_POST["Sstate"]); ?>, <?php echo($_POST["Szip"]); ?></span></li>
            <li><span><?php echo($_POST["Scountry"]); ?></span></li>     
        </ul>
        </fieldset>
            <fieldset id="submit">
                <input id = "SubmitBtn" name = "SubmitBtn" type = "submit" value = "Proceed" />
            </fieldset>

    </form>
    <script type="text/javascript">
        document.getElementById("name").focus();
    </script>

</body>

</html>