<?php
session_start();
include("includes/OpenDbConn.php");
$_SESSION["errorMessage"]="";
$id = $_SESSION['userName'];
include("includes/OpenDbConn.php");
?>
<!doctype html>
<html>
<head>
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
<meta charset = "utf-8">
<title>Project 02 - Billing</title>
</head>
<body>
    <div id="header">
        <h1 style = "text-align: center;"> Project 2 - Billing </h1>
        <?php
        include("includes/menu.php");
        ?>
        
    </div>

        <?php
        $sql = "SELECT * FROM P2Billing WHERE Login='".$id."'";

        //send the SQL query to the database using connection $db
        //store the rows that it returns into $result
        $result = mysqli_query($db, $sql);

        if(empty($result))
        {
            //$result is empty, it has no rows, set variable to zero
            $num_results = 0;
        }
        else
        {
            //$reult has rows and columns, count how many rows there are
            $num_results = mysqli_num_rows($result);
        }

        ?>

        <table style="border: 0px; width: 1000px; text-align:center; padding: 0px; margin: 0px auto; border-spacing: 0px; " title= "Shipping Affress">
            <thead>
                    <tr>
                        <th colspan="11" style = "font-weight: bold; background-color: #b1946c; text-align: center;
                        text-decoration:underline;">Billing Address
                        </th>
                    </tr>
                    <tr>
                            <th style="font-weight: bold; background-color: #b1946c;">&nbsp;</th>
                            <th style="font-weight: bold; background-color: #b1946c;">BillingID</th>
                            <th style="font-weight: bold; background-color: #b1946c;">Login</th>
                            <th style="font-weight: bold; background-color: #b1946c;">BillName</th>
                            <th style="font-weight: bold; background-color: #b1946c;">BillAddress</th>
                            <th style="font-weight: bold; background-color: #b1946c;">BillCity</th>
                            <th style="font-weight: bold; background-color: #b1946c;">BillState</th>
                            <th style="font-weight: bold; background-color: #b1946c;">BillZip</th>
                            <th style="font-weight: bold; background-color: #b1946c;">CardType</th>
                            <th style="font-weight: bold; background-color: #b1946c;">CardNumber</th>
                            <th style="font-weight: bold; background-color: #b1946c;">ExpDate</th>
                    </tr>
            </thead>
            <tfoot>
                <tr>
                    <td colspan="9" style="text-align: center; font-style: italic;">
                        Information pulled from the P2 Billing Table
                    </td>
                </tr>
            </tfoot>

            <tbody>
                <?php
                for($i=0; $i < $num_results; $i++)
                {
                    $row = mysqli_fetch_array($result);
                
                ?>
                <tr>
                    <td style="border-right: 1px solid #000000; text-align:center;">
                        <a href="updateBilling.php?id=<?php echo(trim($row["BillingID"]));?>">edit</a>
                        <a href="deleteBilling.php?id=<?php echo(trim($row["BillingID"]));?>">delete</a>
                    </td>
                    <td style="border-right: 1px solid #0000; text-align:center;"><?php echo( trim($row["BillingID"]));?></td>
                    <td style="border-right: 1px solid #0000; text-align:center;"><?php echo( trim($row["Login"]));?></td>
                    <td style="border-right: 1px solid #0000; text-align:center;"><?php echo( trim($row["BillName"]));?></td>
                    <td style="border-right: 1px solid #0000; text-align:center;"><?php echo( trim($row["BillAddress"]));?></td>
                    <td style="border-right: 1px solid #0000; text-align:center;"><?php echo( trim($row["BillCity"]));?></td>
                    <td style="border-right: 1px solid #0000; text-align:center;"><?php echo( trim($row["BillState"]));?></td>
                    <td style="border-right: 1px solid #0000; text-align:center;"><?php echo( trim($row["BillZip"]));?></td>
                    <td style="border-right: 1px solid #0000; text-align:center;"><?php echo( trim($row["CardType"]));?></td>
                    <td style="border-right: 1px solid #0000; text-align:center;"><?php echo( trim($row["CardNumber"]));?></td>
                    <td style="border-right: 1px solid #0000; text-align:center;"><?php echo( trim($row["ExpDate"]));?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
            </table>
            <form id="form0" name="form0" method="post" action="doInsertBilling.php?id=<?php echo($_SESSION["userName"]);?>">
            <!-- <form id="form0" name="form0" method="post" action="doInsertBilling.php"> -->
        <fieldset>
            <legend>Insert into Project 2 Shipping table</legend>
            <ul>
                <li>
                    <label title="BillingID" for = "BillingID">BillingID</label>
                    <input name = "BillingID" id="BillingID" type="text" size="20" maxlength="20" />
            </li>

                <li>
                    <label title="BillName" for = "BillName">Name</label>
                    <input name = "BillName" id="BillName" type="text" size="20" maxlength="20" />
                </li>

                <li>
                    <label title="BillAddress" for = "BillAddress">Address</label>
                    <input name = "BillAddress" id="BillAddress" type="text" size="20" maxlength="20" />
                </li>
                <li>
                    <label title="BillCity" for = "CiBillCityty">City</label>
                    <input name = "BillCity" id="BillCity" type="text" size="20" maxlength="20" />
                </li>
                <li>
                    <label title="BillState" for = "BillState">State</label>
                    <input name = "BillState" id="BillState" type="text" size="20" maxlength="20" />
                </li>
                <li>
                    <label title="BillZip" for = "BillZip">Zip</label>
                    <input name = "BillZip" id="BillZip" type="text" size="5" maxlength="5" />
                </li>
                <li>
                    <label title="CardType" for = "CardType">CardType</label>
                    <select name = "CardType">
                        <option value=" - Card - "> - Card - </option>
                        <option value="Visa">Visa</option>
                        <option value="MasterCard">MasterCard</option>
                        <option value="AmericanExpress">AmericanExpress</option>
                    </select>
                </li>

                <li>
                    <label title="CardNumber" for = "CardNumber">CardNumber</label>
                    <input name = "CardNumber" id="CardNumber" type="text" size="20" maxlength="20" />
                </li>
                </li>
                <label title="ExpMonth" for="ExpMonth">Exp Month</label>
                    <select name = "ExpMonth">
                        <option value=" - Month - "> - Month - </option>
                        <option value="01">Jan</option>
                        <option value="02">Feb</option>
                        <option value="03">Mar</option>
                        <option value="04">Apr</option>
                        <option value="05">May</option>
                        <option value="06">Jun</option>
                        <option value="07">Jul</option>
                        <option value="08">Aug</option>
                        <option value="09">Sep</option>
                        <option value="10">Oct</option>
                        <option value="11">Nov</option>
                        <option value="12">Dec</option>
                    </select>
                </li>
                <li>
                    <label title="ExpYear" for = "ExpYear">Exp Year</label>
                    <select name="ExpYear" id="ExpYear">
                        <option value=" - Year - "> - Year - </option>
                        <option value="24">2024</option>
                        <option value="25">2025</option>
                        <option value="26">2026</option>
                        <option value="27">2027</option>
                        <option value="28">2028</option>
                        <option value="29">2029</option>
                        <option value="30">2030</option>
                        <option value="31">2031</option>
                        <option value="32">2032</option>
                        <option value="33">2033</option>
                        <option value="34">2034</option>
                        <option value="35">2035</option>
                        <option value="36">2036</option>
                        <option value="37">2037</option>
                        <option value="38">2038</option>
                        <option value="39">2039</option>
                        <option value="40">2020</option>
                    </select>
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
            include("includes/CloseDbConn.php");
            ?>
</body>
</html>