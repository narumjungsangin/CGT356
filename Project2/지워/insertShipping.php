<?php
session_start();
include("includes/OpenDbConn.php");
?>

<!doctype html>
<html>
<head>
    <meta charset = "utf-8"/>
    <title>Project 1 - Insert</title>
    <style type = "text/css">
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
        /* input:focus{width: 50px;} */
        
        fieldset{padding: 10px; border: 1px solid #000; overflow: auto; margin:10px;}
        legend{color: #00000;  margin: 0 10px 0 0; padding:0 5px; font-size: 11px; font-weight:bold;}
    </style>
</head>

<body>
     <h1 style = "text-align: center;"> Project 2 - Insert Shipper</h1>
     <?php
     include("includes/menu.php");
     ?>

     <form id="form0" name="form0" method="post" action="doInsertShipping.php">
        <fieldset>
            <legend>Insert into Project 2 Shipping table</legend>
            <ul>
                <li>
                    <label title="ShippingID" for = "ShippingID">ShippingID</label>
                    <input name = "ShippingID" id="ShippingID" type="text" size="20" maxlength="20" />
                </li>

                <li>
                    <label title="Name" for = "Name">Name</label>
                    <input name = "Name" id="Name" type="text" size="20" maxlength="20" />
                </li>

                <li>
                    <label title="Address" for = "Address">Address</label>
                    <input name = "Address" id="Address" type="text" size="20" maxlength="20" />
                </li>

                <li>
                    <label title="City" for = "City">City</label>
                    <input name = "City" id="City" type="text" size="20" maxlength="20" />
                </li>
                <li>
                    <label title="State" for = "State">State</label>
                    <input name = "State" id="State" type="text" size="20" maxlength="20" />
                </li>
                <li>
                    <label title="Zip" for = "Zip">Zip</label>
                    <input name = "Zip" id="Zip" type="text" size="5" maxlength="5" />
                </li>

                <li>
                    <span><?php echo($_SESSION["errorMessage"]);?></span>
                </li>

                <li>
                    <input type="submit" value="Insert Info" name="submit" id="submit" />
                </li>
            </ul>
        </fieldset>
    </form>

    <?php
        $_SESSION["errorMessage"] = "";
    ?>
    <script type="text/javascript">
        document.getElementById("ShippingID").focus();
    </script>

</body>
</html>