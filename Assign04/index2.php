<?php
session_start();
?>
<!Doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Assign 04 - index2 page</title>
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
        fieldset#player2022 {position:absolute; top:60px; left:20px;}
        fieldset#player2023{position:absolute;  top:60px; left:460px;}
        fieldset#submit{position:absolute;  top:540px; left:20px; width: 840px; text-align:center;}
        fieldset input#SubmitBtn {background:#E5E5E5; color:#000099; border:1px solid #ccc; padding:5px; width:150px;}
        div#errorMsg {color:#ff000; font-weight:bold; font-size:12pt; position:absolute; top:420px; left: 480px;}
    </style>

</head>

<body>
    <h1 style= "fontsize: 14px; text-indent: 360px;"> Assign04 - index2 Page</h1>
    <form id = "form0" name = "form0" action="storeInfo2.php" method = "post">
    <fieldset id = "billing">
        <legend>2022 Baseball Player Information</legend>
            <ul>
                <li>
                     <label title = "Name" for = "name">Name <span>*</span></label> 
                    <input type="text" name="name" id="name" size="30" maxlength="30" 
                    value="<?php if (!empty($_SESSION["name"])){echo($_SESSION["name"]);} ?>"/>

                </li>
                <li>
                     <label title = "Height" for = "height">Height <span>*</span></label> 
                    <input type="text" name="height" id="height" size="30" maxlength="30" 
                    value="<?php if (!empty($_SESSION["height"])){echo($_SESSION["height"]);} ?>"/>

                </li>
                <li>
                     <label title = "BatThrow" for = "batthrow">Bat Throw <span>*</span></label> 
                    <input type="text" name="batthrow" id="batthrow" size="30" maxlength="30" 
                    value="<?php if (!empty($_SESSION["batthrow"])){echo($_SESSION["batthrow"]);} ?>"/>

                </li>
                <li>
                     <label title = "HomeTown" for = "hometown">Home Town <span>*</span></label> 
                    <input type="text" name="hometown" id="hometown" size="30" maxlength="30" 
                    value="<?php if (!empty($_SESSION["hometown"])){echo($_SESSION["hometown"]);} ?>"/>

                </li>
                <li>
                     <label title = "Team" for = "team">Team <span>*</span></label> 
                    <input type="text" name="team" id="team" size="30" maxlength="30" 
                    value="<?php if (!empty($_SESSION["team"])){echo($_SESSION["team"]);} ?>"/>

                </li>
                <li>
                     <label title = "BackNumber" for = "backnumber">Back Number <span>*</span></label> 
                    <input type="text" name="backnumber" id="backnumber" size="30" maxlength="30" 
                    value="<?php if (!empty($_SESSION["backnumber"])){echo($_SESSION["backnumber"]);} ?>"/>

                </li>
                <li>
                     <label title = "Position" for = "position">Position <span>*</span></label> 
                    <input type="text" name="position" id="position" size="30" maxlength="30" 
                    value="<?php if (!empty($_SESSION["position"])){echo($_SESSION["position"]);} ?>"/>

                </li>
                <li>
                     <label title = "Salary" for = "salary">Salary <span>*</span></label> 
                    <input type="text" name="salary" id="salary" size="30" maxlength="30" 
                    value="<?php if (!empty($_SESSION["emasalaryil"])){echo($_SESSION["salary"]);} ?>"/>

                </li>
                <li>
                     <label title = "Comments" for = "comments">Questions or Comments <span>*</span></label> 
                    <textarea rows="5" cols="40" name="comments" id="comments"><?php if (!empty($_SESSION["comments"])){echo($_SESSION["comments"]);} ?></textarea>
                </li>
        </ul>
        </fieldset>
        <fieldset id = "player2023">
            <legend>2023 Baseball Player Information(If changed)</legend>
            <ul>
                <li> <label title = "CTeam" for = "Cteam">Team <span>*</span></label> <input type="text" name="Cteam" id="Cteam" size="30" maxlength="30" value="<?php if(!empty($_SESSION["Cteam"])){echo($_SESSION["Cteam"]);} ?>"/></li>
                <li> <label title = "CBackNumber" for = "Cbacknumber">Back Number <span>*</span></label> <input type="text" name="Cbacknumber" id="Cbacknumber" size="30" maxlength="30" value="<?php if(!empty($_SESSION["Cbacknumber"])){echo($_SESSION["Cbacknumber"]);} ?>"/></li>
                <li> <label title = "CPosition" for = "Cposition">Position <span>*</span></label> <input type="text" name="Cposition" id="Cposition" size="30" maxlength="30" value="<?php if(!empty($_SESSION["Cposition"])){echo($_SESSION["Cposition"]);} ?>"/></li>
                <li> <label title = "CSalary" for = "Csalary">Salary <span>*</span></label> <input type="text" name="Csalary" id="Csalary" size="30" maxlength="30" value="<?php if(!empty($_SESSION["Csalary"])){echo($_SESSION["Csalary"]);} ?>"/></li>
        </ul>
        </fieldset>
            <fieldset id="submit">
                <input id = "SubmitBtn" name = "SubmitBtn" type = "submit" value = "Proceed" />
                <p> This is index2 page. If you want to go to <a href= "index.php">index page</a> or <a href= "index3.php">index3 page</a> press the following button.</p>
            </fieldset>

    </form>
    <script type="text/javascript">
        document.getElementById("name").focus();
    </script>

</body>

</html>