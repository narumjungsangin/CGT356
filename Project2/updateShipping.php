<?php
session_start();

if(empty($_SESSION["errorMessage"]))
    $_SESSION["errrorMessage"] = "";
    // $id = $_GET["id"];
    $_SESSION["userName"];
    $id = $_GET["id"];
include("includes/OpenDbConn.php");
?>

<!doctype html>
<html>
<head>
<meta charset = "utf-8">
    <title>Project2 - Update</title>
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
        <h1 style = "text-align: center;"> Project 2 - Shipping </h1>
        <?php
        include("includes/menu.php");?>
    </div>

     <?php
        $sql = "SELECT * FROM P2Shipping WHERE ShippingID='".$id."'";
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

     <form id="form0" name="form0" method="post" action="doUpdateShipping.php">
        <fieldset>
            <legend>Insert into Shipping table</legend>
            <ul>
                <li>
                    <label title="ShippingID" for = "ShippingID">Shipping ID</label>
                    <input name = "shippingIDdis" id="shippingIDdis" type="text" size="20" maxlength="30" disabled="disabled"
                    value = "<?php if($num_results!=0){echo(trim($row["ShippingID"]));}?>" />
                    <input name = "ShippingID" id="ShippingID" type="hidden" 
                    value = "<?php if($num_results!=0){echo(trim($row["ShippingID"]));}?>" />
                </li>
                <li>
                    <label title="Name" for = "Name">Name</label>
                    <input name = "Name" id="Name" type="text" size="20" maxlength="20" 
                    value = "<?php if($num_results != 0){echo(trim($row["Name"]));}  ?>">
                </li>

                <li>
                    <label title="Address" for = "Address">Address</label>
                    <input name = "Address" id="Address" type="text" size="20" maxlength="20" 
                    value = "<?php if($num_results != 0){echo(trim($row["Address"]));}  ?>">
                </li>

                <li>
                    <label title="City" for = "City">City</label>
                    <input name = "City" id="City" type="text" size="20" maxlength="20" 
                    value = "<?php if($num_results != 0){echo(trim($row["City"]));}  ?>">
                </li>
                <li>
                    <label title="State" for = "State">State</label>
                    <input name = "State" id="State" type="text" size="20" maxlength="20" 
                    value = "<?php if($num_results != 0){echo(trim($row["State"]));}  ?>">
                </li>
                <li>
                    <label title="Zip" for = "Zip">Zip</label>
                    <input name = "Zip" id="Zip" type="text" size="20" maxlength="20" 
                    value = "<?php if($num_results != 0){echo(trim($row["Zip"]));}  ?>">
                </li>




                <li>
                    <span><?php echo($_SESSION["errorMessage"]);?></span>
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
        document.getElementById("ShippingID").focus();
    </script>

</body>
</html>