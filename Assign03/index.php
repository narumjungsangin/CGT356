<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Assign 03 - Index</title>
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
    <h1 style= "fontsize: 14px; text-indent: 360px;"> Assign03 - Index Page</h1>

    <form id = "form0" name = "form0" action="getFormData.php" method = "post">
        <fieldset id = "billing">
            <legend>Billing Information</legend>
        <ul>
                <li> <label title = "Name" for = "name">Name <span>*</span></label> <input type="text" name="name" id="name" size="30" maxlength="30" /></li>
                <li> <label title = "Address" for = "address">Address <span>*</span></label> <input type="text" name="address" id="address" size="30" maxlength="30" /></li>
                <li> <label title = "City" for = "city">City <span>*</span></label> <input type="text" name="city" id="city" size="30" maxlength="30" /></li>
                <li> <label title = "State" for = "state">State <span>*</span></label> <input type="text" name="state" id="state" size="30" maxlength="30" /></li>
                <li> <label title = "Zip" for = "zip">Zip <span>*</span></label> <input type="text" name="zip" id="zip" size="7" maxlength="5" /></li>
                <li> <label title = "Country" for = "country">Country <span>*</span></label> <input type="text" name="country" id="country" size="30" maxlength="30" /></li>
                <li> <label title = "Phone" for = "phone">Phone <span>*</span></label> <input type="text" name="phone" id="phone" size="30" maxlength="30" /></li>
                <li> <label title = "Email" for = "email">Email <span>*</span></label> <input type="text" name="email" id="email" size="30" maxlength="30" /></li>
                <li> <label title = "Comments" for = "comments">Questions or Comments <span>*</span></label> <textarea rows="5" cols="40" name="comments" id="comments"></textarea></li>
        </ul>
        </fieldset>
        <fieldset id = "shipping">
            <legend>Shipping Information(if diffrent from billing)</legend>
        <ul>
                <li> <label title = "SName" for = "Sname">Name <span>*</span></label> <input type="text" name="Sname" id="Sname" size="30" maxlength="30" /></li>
                <li> <label title = "SAddress" for = "Saddress">Address <span>*</span></label> <input type="text" name="Saddress" id="Saddress" size="30" maxlength="30" /></li>
                <li> <label title = "SCity" for = "Scity">City <span>*</span></label> <input type="text" name="Scity" id="Scity" size="30" maxlength="30" /></li>
                <li> <label title = "SState" for = "Sstate">State <span>*</span></label> <input type="text" name="Sstate" id="Sstate" size="30" maxlength="30" /></li>
                <li> <label title = "SZip" for = "Szip">Zip <span>*</span></label> <input type="text" name="Szip" id="Szip" size="7" maxlength="5" /></li>
                <li> <label title = "SCountry" for = "Scountry">Country <span>*</span></label> <input type="text" name="Scountry" id="Scountry" size="30" maxlength="30" /></li>
        </ul>
        </fieldset>
            <fieldset id="submit">
                <input id = "SubmitBtn" name = "SubmitBtn" type = "submit" value = "Proceed" />
                <p> This is index. If you want to go to <a href= "index2.php">index2 page</a> press the following button.</p>
            </fieldset>
    </form>

    <script type="text/javascript">
        document.getElementById("name").focus();
    </script>

</body>
</html>