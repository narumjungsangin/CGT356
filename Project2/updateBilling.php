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
    <title>Project2 - Billing Update</title>
    <style type = "text/css">
        /* body{margin: 0px auto; tex}
        .table{ margin-left:auto; margin-right:auto; text-align:center;} */
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

        html, body, h1 {
        margin: 0;
        padding: 0;
        } 

        body {
    padding-top: 150px; /* Adjust this value based on the height of your header */
    margin: 0; /* Reset default margin */
}

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
     
    </style>
</head>
<body>
<div id="header">
        <h1 style = "text-align: center;"> Project 2 - Billing </h1>
        <?php
        include("includes/menu.php");?>
    </div>

     <?php
        $sql = "SELECT * FROM P2Billing WHERE BillingID='".$id."'";
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

     <form id="form0" name="form0" method="post" action="doUpdateBilling.php">
        <fieldset>
            <legend>Insert into Billing table</legend>
            <ul>
                <li>
                    <label title="BillingID" for = "BillingID">Billing ID</label>
                    <input name = "BillingIDdis" id="BillingIDdis" type="text" size="20" maxlength="30" disabled="disabled"
                    value = "<?php if($num_results!=0){echo(trim($row["BillingID"]));}?>" />
                    <input name = "BillingID" id="BillingID" type="hidden" 
                    value = "<?php if($num_results!=0){echo(trim($row["BillingID"]));}?>" />
                </li>
                <li>
                    <label title="BillName" for = "BillName">Name</label>
                    <input name = "BillName" id="BillName" type="text" size="20" maxlength="20" 
                    value = "<?php if($num_results != 0){echo(trim($row["BillName"]));}  ?>">
                </li>

                <li>
                    <label title="BillAddress" for = "BillAddress">Address</label>
                    <input name = "BillAddress" id="BillAddress" type="text" size="20" maxlength="20" 
                    value = "<?php if($num_results != 0){echo(trim($row["BillAddress"]));}  ?>">
                </li>

                <li>
                    <label title="BillCity" for = "BillCity">BillCity</label>
                    <input name = "BillCity" id="BillCity" type="text" size="20" maxlength="20" 
                    value = "<?php if($num_results != 0){echo(trim($row["BillCity"]));}  ?>">
                </li>
                <li>
                    <label title="BillState" for = "BillState">State</label>
                    <input name = "BillState" id="BillState" type="text" size="20" maxlength="20" 
                    value = "<?php if($num_results != 0){echo(trim($row["BillState"]));}  ?>">
                </li>
                <li>
                    <label title="BillZip" for = "BillZip">Zip</label>
                    <input name = "BillZip" id="BillZip" type="text" size="20" maxlength="20" 
                    value = "<?php if($num_results != 0){echo(trim($row["BillZip"]));}  ?>">
                </li>

                <li>
                    <label title="CardType" for = "CardType">CardType</label>
                    <select name="CardType" id="CardType">
                        <option value=" - Card - "> - Card - </option>
                        <option value="Visa" <?php if( ($num_results!=0) && (trim($row["CardType"]=="Visa")) ){echo("selected='selected'");} ?>>Visa</option>
                        <option value="MasterCard" <?php if( ($num_results!=0) && (trim($row["CardType"]=="MasterCard")) ){echo("selected='selected'");} ?>>MasterCard</option>
                        <option value="AmericanExpress" <?php if( ($num_results!=0) && (trim($row["CardType"]=="AmericanExpress")) ){echo("selected='selected'");} ?>>AmericanExpress</option>
                    </select>
                </li>

                <li>
                    <label title="CardNumber" for = "CardNumber">CardNumber</label>
                    <input name = "CardNumber" id="CardNumber" type="text" size="20" maxlength="20" 
                    value = "<?php if($num_results != 0){echo(trim($row["CardNumber"]));}  ?>">
                </li>

                
                <?php
                        if($num_results !=0)
                        {
                            //built in methods: substr, strpos, strlen
                            $ExpMonth = trim(substr($row["ExpDate"], 0, strpos(trim($row["ExpDate"]),"/")));
                            $ExpYear  = trim(substr($row["ExpDate"], strpos($row["ExpDate"],"/")+1,strlen(trim($row["ExpDate"])) ));
                        }
                ?>

                <li>
                    <label title="ExpMonth" for="ExpMonth"> Exp Month</label>
                    <select name = "ExpMonth">
                        <option value=" - Month - "> - Month - </option>
                        <option value="01" <?php if(($num_results!=0) && ($ExpMonth=="01")){echo("selected='selected'");}?>>Jan</option>
                        <option value="02" <?php if(($num_results!=0) && ($ExpMonth=="02")){echo("selected='selected'");}?>>Feb</option>
                        <option value="03" <?php if(($num_results!=0) && ($ExpMonth=="03")){echo("selected='selected'");}?>>Mar</option>
                        <option value="04" <?php if(($num_results!=0) && ($ExpMonth=="04")){echo("selected='selected'");}?>>Apr</option>
                        <option value="05" <?php if(($num_results!=0) && ($ExpMonth=="05")){echo("selected='selected'");}?>>May</option>
                        <option value="06" <?php if(($num_results!=0) && ($ExpMonth=="06")){echo("selected='selected'");}?>>Jun</option>
                        <option value="07" <?php if(($num_results!=0) && ($ExpMonth=="07")){echo("selected='selected'");}?>>Jul</option>
                        <option value="08" <?php if(($num_results!=0) && ($ExpMonth=="08")){echo("selected='selected'");}?>>Aug</option>
                        <option value="09" <?php if(($num_results!=0) && ($ExpMonth=="09")){echo("selected='selected'");}?>>Sep</option>
                        <option value="10" <?php if(($num_results!=0) && ($ExpMonth=="10")){echo("selected='selected'");}?>>Oct</option>
                        <option value="11" <?php if(($num_results!=0) && ($ExpMonth=="11")){echo("selected='selected'");}?>>Nov</option>
                        <option value="12" <?php if(($num_results!=0) && ($ExpMonth=="12")){echo("selected='selected'");}?>>Dec</option>
                    </select>
                </li>

                <li>
                    <label title="ExpYear" for = "ExpYear">Exp Year</label>
                    <select name="ExpYear" id="ExpYear">
                        <option value=" - Year - "> - Year - </option>
                        <option value="24"<?php if( ($num_results!=0) && ($ExpYear=="24") ){echo("selected='selected'");} ?>>2024</option>
                        <option value="25"<?php if( ($num_results!=0) && ($ExpYear=="25") ){echo("selected='selected'");} ?>>2025</option>
                        <option value="26"<?php if( ($num_results!=0) && ($ExpYear=="26") ){echo("selected='selected'");} ?>>2026</option>
                        <option value="27"<?php if( ($num_results!=0) && ($ExpYear=="27") ){echo("selected='selected'");} ?>>2027</option>
                        <option value="28"<?php if( ($num_results!=0) && ($ExpYear=="28") ){echo("selected='selected'");} ?>>2028</option>
                        <option value="29"<?php if( ($num_results!=0) && ($ExpYear=="29") ){echo("selected='selected'");} ?>>2029</option>
                        <option value="30"<?php if( ($num_results!=0) && ($ExpYear=="30") ){echo("selected='selected'");} ?>>2030</option>
                        <option value="31"<?php if( ($num_results!=0) && ($ExpYear=="31") ){echo("selected='selected'");} ?>>2031</option>
                        <option value="32"<?php if( ($num_results!=0) && ($ExpYear=="32") ){echo("selected='selected'");} ?>>2032</option>
                        <option value="33"<?php if( ($num_results!=0) && ($ExpYear=="33") ){echo("selected='selected'");} ?>>2033</option>
                        <option value="34"<?php if( ($num_results!=0) && ($ExpYear=="34") ){echo("selected='selected'");} ?>>2034</option>
                        <option value="35"<?php if( ($num_results!=0) && ($ExpYear=="35") ){echo("selected='selected'");} ?>>2035</option>
                        <option value="36"<?php if( ($num_results!=0) && ($ExpYear=="36") ){echo("selected='selected'");} ?>>2036</option>
                        <option value="37"<?php if( ($num_results!=0) && ($ExpYear=="37") ){echo("selected='selected'");} ?>>2037</option>
                        <option value="38"<?php if( ($num_results!=0) && ($ExpYear=="38") ){echo("selected='selected'");} ?>>2038</option>
                        <option value="39"<?php if( ($num_results!=0) && ($ExpYear=="39") ){echo("selected='selected'");} ?>>2039</option>
                        <option value="40"<?php if( ($num_results!=0) && ($ExpYear=="40") ){echo("selected='selected'");} ?>>2040</option>
                    </select>
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
        document.getElementById("BillingID").focus();
    </script>

</body>
</html>