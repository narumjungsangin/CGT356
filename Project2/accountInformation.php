<?php
session_start();

if(empty($_SESSION["errorMessage"]))
    $_SESSION["errrorMessage"] = "";
    $id = $_GET["id"];
include("includes/OpenDbConn.php");
?>

<!doctype html>
<html>
<head>
<meta charset = "utf-8">
    <title>Project2 - Account Information</title>
    <style type = "text/css">
        html, body, h1 {
        margin: 0;
        padding: 0;
        } 
        body {
    padding-top: 130px; /* Adjust this value based on the height of your header */
    margin: 0; /* Reset default margin */
}
ul li{display:block; float:left; width:100%; height:1%;}

#header {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 130px;
    background-color: pink;
    margin: 0;
    padding: 0;
    z-index: 1000;
}

h1 {
    padding-top: 20px;
    text-align: center;
}
        
        form{width:500px; margin:0px auto;}
        ul{list-style: none; margin-top:5px;}
        ul li{display:block; float:left; width:100%; height:1%;}
        label{float: left; padding: 7px; }
        span{color: #0000ff; font-weight: bold;}
        span#radios{ color: #000000; font-weight:normal; padding:0px; }
        input, select{float: right; margin-right: 10px; border: 1px solid #000; padding: 3px; width: 240px;}
        input[type="radio"]{float: none;  padding: 4px; width:30px; margin-left: 1px;}
        input[type="checkBox"]{float: none; margin-right: 1px;  width:70px;}
        input#submit{width: 248px;}
        div{width:250px;float: right;}
        input:focus{width: 50px;}
         fieldset{padding: 10px; border: 1px solid #000; overflow: auto; margin:10px;}
        legend{color: #00000;  margin: 0 10px 0 0; padding:0 5px; font-size: 11px; font-weight:bold;}

    </style>
</head>
<body>
<div id="header">
        <h1 style="text-align:center">Project 2 - Account Information</h1>
        <?php
            include("includes/menu.php");
        ?>
    </div>

     <?php
        $sql = "SELECT * FROM P2User WHERE Login='".$id."'";
        // exit;
        $result = mysqli_query($db, $sql);
        if(empty($result))
        {
            $num_results = 0;
        }
        else
        {
            $num_results = mysqli_num_rows($result);
            $row = mysqli_fetch_array($result);
        }
    ?>

     <form id="form0" name="form0" method="post" action="doUpdateAccount.php">
        <fieldset>
            <legend>Insert into Billing table</legend>
            <ul>
                <li>
                    <label title="userName" for = "userName">User Name</label>
                    <input name = "userNamedis" id="userNamedis" type="text" size="20" maxlength="30" disabled="disabled"
                    value = "<?php if($num_results!=0){echo(trim($row["Login"]));}?>" />
                    <input name = "userName" id="userName" type="hidden" 
                    value = "<?php if($num_results!=0){echo(trim($row["Login"]));}?>" />
                </li>
                <li>
                    <label title="firstName" for = "firstName">First Name</label>
                    <input name = "firstName" id="firstName" type="text" size="20" maxlength="20" 
                    value = "<?php if($num_results != 0){echo(trim($row["FirstName"]));}  ?>">
                </li>

                <li>
                    <label title="lastName" for = "lastName">Last Name</label>
                    <input name = "lastName" id="lastName" type="text" size="20" maxlength="20" 
                    value = "<?php if($num_results != 0){echo(trim($row["LastName"]));}  ?>">
                </li>

                <li>
                    <label title="password" for = "password">password</label>
                    <input name = "password" id="password" type="text" size="20" maxlength="20" 
                    value = "<?php if($num_results != 0){echo(trim($row["Passwd"]));}  ?>">
                </li>
                <li>
                    <label title="email" for = "email">Email</label>
                    <input name = "email" id="email" type="text" size="20" maxlength="20" 
                    value = "<?php if($num_results != 0){echo(trim($row["Email"]));}  ?>">
                </li>

                <li>
                    <label title="NewsLetter" for = "NewsLetter">News Letter</label>
                    <div>
                    <input name = "NewsLetter" id="NewsLetter" type="radio" value="Yes"<?php if( ($num_results!=0) && (trim($row["NewsLetter"]=="Yes")) ){echo("checked='checked'");} ?>/> Yes
                    <input name = "NewsLetter" id="NewsLetter" type="radio" value="No"<?php if( ($num_results!=0) && (trim($row["NewsLetter"]=="No")) ){echo("checked='checked'");} ?>/> No
                    </div>
                </li>

                <li>
                    <span><?php echo($_SESSION["errorMessage"]);?></span>
                    <?php //echo($ExpYear); ?>

                </li>
                <li>
                    <input type="submit" value="Update Info" name="submit" id="submit" />
                </li>
            </ul>
        </fieldset>
    </form>
    <?php
        $_SESSION["errorMessage"] = "";
    ?>
    <script type="text/javascript">
        document.getElementById("userName").focus();
    </script>

</body>
</html>