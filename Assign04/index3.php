<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Assign 04 - index3 Page</title>
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
        fieldset#proejct1 {position:absolute; top:60px; left:20px;}
        fieldset#proejct2{position:absolute;  top:60px; left:460px;}
        fieldset#submit{position:absolute;  top:680px; left:20px; width: 840px; text-align:center;}
        fieldset input#SubmitBtn {background:#E5E5E5; color:#000099; border:1px solid #ccc; padding:5px; width:150px;}
        div#errorMsg {color:#ff000; font-weight:bold; font-size:12pt; position:absolute; top:420px; left: 480px;}
    </style>
</head>

<body>
    <h1 style= "fontsize: 14px; text-indent: 360px;"> Assign04 - index3 Page</h1>

    <form id = "form0" name = "form0" action="storeInfo3.php" method = "post">
        <fieldset id = "proejct1">
            <legend>Project 1 Information</legend>
            <ul>
                <li>
                     <label title = "Id" for = "id">Project ID <span>*</span></label> 
                    <input type="text" name="id" id="id" size="30" maxlength="30" 
                    value="<?php if (!empty($_SESSION["id"])){echo($_SESSION["id"]);} ?>"/>

                </li>
                <li>
                     <label title = "ProjectName" for = "projectname">Project Name <span>*</span></label> 
                    <input type="text" name="projectname" id="projectname" size="30" maxlength="30" 
                    value="<?php if (!empty($_SESSION["projectname"])){echo($_SESSION["projectname"]);} ?>"/>

                </li>
                <li>
                     <label title = "Description" for = "description">Project Description <span>*</span></label> 
                    <input type="text" name="description" id="description" size="30" maxlength="30" 
                    value="<?php if (!empty($_SESSION["description"])){echo($_SESSION["description"]);} ?>"/>

                </li>
                <li>
                     <label title = "ManagerName" for = "managername">Manager Name <span>*</span></label> 
                    <input type="text" name="managername" id="managername" size="30" maxlength="30" 
                    value="<?php if (!empty($_SESSION["managername"])){echo($_SESSION["managername"]);} ?>"/>

                </li>
                <li>
                     <label title = "Email" for = "email">Manager Email <span>*</span></label> 
                    <input type="text" name="email" id="email" size="30" maxlength="30" 
                    value="<?php if (!empty($_SESSION["email"])){echo($_SESSION["email"]);} ?>"/>

                </li>
                <li>
                     <label title = "Phone" for = "phone">Manager Phone <span>*</span></label> 
                    <input type="text" name="phone" id="phone" size="30" maxlength="30" 
                    value="<?php if (!empty($_SESSION["phone"])){echo($_SESSION["phone"]);} ?>"/>

                </li>
                <li>
                     <label title = "Department" for = "department">Manager Department <span>*</span></label> 
                    <input type="text" name="department" id="department" size="30" maxlength="30" 
                    value="<?php if (!empty($_SESSION["department"])){echo($_SESSION["department"]);} ?>"/>

                </li>
                <li>
                     <label title = "Address" for = "address">Manager address <span>*</span></label> 
                    <input type="text" name="address" id="address" size="30" maxlength="30" 
                    value="<?php if (!empty($_SESSION["address"])){echo($_SESSION["address"]);} ?>"/>

                </li>
                <li>
                     <label title = "Comments" for = "comments">Manager additional Comments <span>*</span></label> 
                    <textarea rows="5" cols="40" name="comments" id="comments"><?php if (!empty($_SESSION["comments"])){echo($_SESSION["comments"]);} ?></textarea>
                </li>
        </ul>
        </fieldset>
        <fieldset id = "proejct2">
            <legend>Proejct 2 Information(if diffrent from Project 1)</legend>
        <ul>
                <li> <label title = "CId" for = "Cid">Project ID <span>*</span></label> <input type="text" name="Cid" id="Cid" size="30" maxlength="30" value="<?php if(!empty($_SESSION["Cid"])){echo($_SESSION["Cid"]);} ?>"/></li>
                <li> <label title = "CProjectname" for = "Cprojectname">Project Name <span>*</span></label> <input type="text" name="Cprojectname" id="Cprojectname" size="30" maxlength="30" value="<?php if(!empty($_SESSION["Cprojectname"])){echo($_SESSION["Cprojectname"]);} ?>"/></li>
                <li> <label title = "Cdescription" for = "Cdescription">Project Description <span>*</span></label> <input type="text" name="Cdescription" id="Cdescription" size="30" maxlength="30" value="<?php if(!empty($_SESSION["Cdescription"])){echo($_SESSION["Cdescription"]);} ?>"/></li>
        </ul>
        </fieldset>
            <fieldset id="submit">
                <input id = "SubmitBtn" name = "SubmitBtn" type = "submit" value = "Proceed" />
                <p> This is index3 page. If you want to go to <a href= "index.php">index page</a> or <a href= "index2.php">index2 page</a> press the following button.</p>
            </fieldset>

    </form>
    <div id="errorMsg"><?php if(!empty($_SESSION["errorMessge"])){echo($_SESSION["errorMessage"]);}?></div>

    <script type="text/javascript">
        document.getElementById("name").focus();
    </script>

</body>

</html>