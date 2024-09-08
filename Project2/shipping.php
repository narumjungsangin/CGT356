<?php
session_start();
include("includes/OpenDbConn.php");
$_SESSION["errorMessage"]="";
// $id = $_GET["id"];
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
<title>Project 02 - Shipping</title>
</head>
<body>
<div id="header">
        <h1 style = "text-align: center;"> Project 2 - Shipping </h1>
        <?php
        include("includes/menu.php");?>
    </div>
        <?php
        $sql = "SELECT * FROM P2Shipping WHERE Login='".$id."'";

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

        <table style="border: 0px; width: 1000px; text-align:center; padding: 0px; margin: 0px auto; border-spacing: 0px; " title= "Shipping Address">
            <thead>
                    <tr>
                        <th colspan="9" style = "font-weight: bold; background-color: #b1946c; text-align: center;
                        text-decoration:underline;">Shipping Address
                        </th>
                    </tr>
                    <tr>
                            <th style="font-weight: bold; background-color: #b1946c;">&nbsp;</th>
                            <th style="font-weight: bold; background-color: #b1946c;">ShippingID</th>
                            <th style="font-weight: bold; background-color: #b1946c;">Login</th>
                            <th style="font-weight: bold; background-color: #b1946c;">Name</th>
                            <th style="font-weight: bold; background-color: #b1946c;">Address</th>
                            <th style="font-weight: bold; background-color: #b1946c;">City</th>
                            <th style="font-weight: bold; background-color: #b1946c;">State</th>
                            <th style="font-weight: bold; background-color: #b1946c;">Zip</th>
                    </tr>
            </thead>
            <tfoot>
                <tr>
                    <td colspan="9" style="text-align: center; font-style: italic;">
                        Information pulled from the P2 Shipping Table
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
                        <a href="updateShipping.php?id=<?php echo(trim($row["ShippingID"]));?>">edit</a>
                        <a href="deleteShipping.php?id=<?php echo(trim($row["ShippingID"]));?>">delete</a>
                    </td>
                    <td style="border-right: 1px solid #0000; text-align:center;"><?php echo( trim($row["ShippingID"]));?></td>
                    <td style="border-right: 1px solid #0000; text-align:center;"><?php echo( trim($row["Login"]));?></td>
                    <td style="border-right: 1px solid #0000; text-align:center;"><?php echo( trim($row["Name"]));?></td>
                    <td style="border-right: 1px solid #0000; text-align:center;"><?php echo( trim($row["Address"]));?></td>
                    <td style="border-right: 1px solid #0000; text-align:center;"><?php echo( trim($row["City"]));?></td>
                    <td style="border-right: 1px solid #0000; text-align:center;"><?php echo( trim($row["State"]));?></td>
                    <td style="border-right: 1px solid #0000; text-align:center;"><?php echo( trim($row["Zip"]));?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
            </table>
            <!-- <form id="form0" name="form0" method="post" action="doInsertShipping.php"> -->
            <form id="form0" name="form0" method="post" action="doInsertShipping.php?id=<?php echo($_SESSION["userName"]);?>">

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
                    <input name = "Address" id="Address" type="text" size="50" maxlength="50" />
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
            include("includes/CloseDbConn.php");
            ?>
</body>
</html>