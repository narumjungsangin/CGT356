<?php
session_start();
if(empty($_SESSION["errorMessage"]))
    $_SESSION["errorMessage"] = "";

include("includes/OpenDbConn.php");
?>

<!doctype html>
<html>
<head>
    <meta charset = "utf-8"/>
    <title>Assign07 - Delete Car</title>
    <style type = "text/css">
        form{width:450px margin:0px auto;}
        ul{list-style: none; margin-top:5px}
        ul li{display:block; float:left; width:100%; height:1%;}
        label{float: left; padding: 7px;}
        span{color: #ff0000; font-weight: bold;}
        input, select, span.values{float: right; margin: 10px; border: 1px solid #00000; padding: 3px; width: 240px;}
        #submit{width: 248px;}
        input:focus{border: 1px solid #999999;}
        fieldset{padding: 10px; border: 1px solid #000000; width: 450px; overflow: auto; margin:10px;}
        legend{color: #00000;  margin: 0 10px 0 0; padding:0 5px; font-size: 11px; font-weight:bold;}
    </style>
</head>

<body>
     <h1 style = "text-align: center;"> Assign07 - Delete Car </h1>
     <?php
     include("includes/menu.php");
    //prepare my sql statement
    $sql = "SELECT * FROM Assign06Cars WHERE CarID=23"; //23에 고정
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
        if($num_results == 0)
            $_SESSION["errorMessage"] = "You must enter 23";
     ?>


     <form id="form0" name="form0" method="post" action="doDeleteCar.php">
        <fieldset>
            <legend>Are you sure you want to delete the Car??</legend>
            <ul>
                 <li>
                    <label title="CarID" for = "CarID">Car ID</label>
                    <span class = "values"><?php if($num_results !=0){echo(trim($row["CarID"]));}?></span>
                </li>            
                
                <li>
                    <label title="CarMake" for = "CarMake">Car Make</label>
                    <span class = "values"><?php if($num_results !=0){echo(trim($row["CarMake"]));}?></span>
                </li>

                <li>
                    <label title="CarModel" for = "CarModel">Car Model</label>
                    <span class = "values"><?php if($num_results !=0){echo(trim($row["CarModel"]));}?></span>
                </li>

                <li>
                    <label title="CarYear" for = "CarYear">Car Year</label>
                    <span class = "values"><?php if($num_results !=0){echo(trim($row["CarYear"]));}?></span>
                </li>

                <li>
                    <label title="CarColor" for = "CarColor">Car Color</label>
                    <span class = "values"><?php if($num_results !=0){echo(trim($row["CarColor"]));}?></span>
                </li>
                <li>
                    <label title="CarHybrid" for = "CarHybrid">End Date</label>
                    <span class = "values"><?php if($num_results !=0){echo(trim($row["CarHybrid"]));}?></span>
                </li>

                <li>
                    <span><?php echo($_SESSION["errorMessage"]);?></span>
                </li>

                <li>
                    <input type="submit" value="Delete Car" name="submit" id="submit" />
                </li>
            </ul>
        </fieldset>
    </form>

    <?php
        $_SESSION["errorMessage"] = "";
    ?>
    <script type="text/javascript">
        document.getElementById("CarID").focus();
    </script>

</body>
</html>