<?php
session_start();
include("includes/OpenDbConn.php");
$_SESSION["errorMessage"]="";
?>
<!doctype html>
<html>
<head>
<meta charset = "utf-8">
<title>Assign07 - Select</title>
</head>
<body>
        <h1 style = "text-align: center;"> Assign07 - Select </h1>
        <?php
        include("includes/menu.php");

        $sql = "SELECT * FROM Assign06Projects ORDER BY ProjectID ASC";

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

        <table style="border: 0px; width: 750px; padding: 0px; ,margin: 0px auto; border-sapcing: 0px;" title= "Listing of Projects">
            <thead>
                    <tr>
                        <th colspan="6" style = "font-weight: bold; background-color: #add8e6; text-allign: center;
                        text-decoration:underline;">Assign06Projects Table 
                        </th>
                    </tr>
                    <tr>
                        <!-- <th style="font-weight: bold; background-color: #add8e6;">&nbsp;</th> -->
                            <th style="font-weight: bold; background-color: #add8e6;">ProjectID</th>
                            <th style="font-weight: bold; background-color: #add8e6;">ProjName</th>
                            <th style="font-weight: bold; background-color: #add8e6;">ProjCategory</th>
                            <th style="font-weight: bold; background-color: #add8e6;">ProjDesc</th>
                            <th style="font-weight: bold; background-color: #add8e6;">StartDate</th>
                            <th style="font-weight: bold; background-color: #add8e6;">EndDate</th>
                    </tr>
            </thead>
            <tfoot>
                <tr>
                    <td colspan="6" style="text-align: center; font-style: italic;">
                        Information pulled from the Assgin06 Table
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
                    <!-- <td style="border-right: 1px solid #000000;">
                        <a href="updateUser.php?id=<?php echo( trim($row["UserID"]));?>">edit</a>
                        <a href="deleteUser.php?id=<?php echo( trim($row["UserID"]));?>">delete</a>
                    </td> -->
                    <td style="border-right: 1px solid #0000;"><?php echo( trim($row["ProjectID"]));?></td>
                    <td style="border-right: 1px solid #0000;"><?php echo( trim($row["ProjName"]));?></td>
                    <td style="border-right: 1px solid #0000;"><?php echo( trim($row["ProjCategory"]));?></td>
                    <td style="border-right: 1px solid #0000;"><?php echo( trim($row["ProjDesc"]));?></td>
                    <td style="border-right: 1px solid #0000;"><?php echo( trim($row["StartDate"]));?></td>
                    <td ><?php echo( trim($row["EndDate"]));?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
            </table>
<!-- //NEW -->

<p>&nbsp;</p>
<?php
        $sql = "SELECT CarID, CarMake, CarModel, CarYear, CarColor, CarHybrid FROM Assign06Cars ORDER BY CarID ASC";

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

<table style="border: 0px; width: 500px; padding: 0px; ,margin: 0px auto; border-spacing: 0px;" title= "Listing of Cars">
            <thead>
                    <tr>
                        <th colspan="6" style = "font-weight: bold; background-color: #b1946c; text-align: center;
                        text-decoration:underline;">Assign06Cars Table 
                        </th>
                    </tr>
                    <tr>
                            <!-- <th style="font-weight: bold; background-color: #b1946c;">&nbsp;</th> -->
                            <th style="font-weight: bold; background-color: #b1946c;">CarID</th>
                            <th style="font-weight: bold; background-color: #b1946c;">CarMake</th>
                            <th style="font-weight: bold; background-color: #b1946c;">CarModel</th>
                            <th style="font-weight: bold; background-color: #b1946c;">CarYear</th>
                            <th style="font-weight: bold; background-color: #b1946c;">CarColor</th>
                            <th style="font-weight: bold; background-color: #b1946c;">CarHybrid</th>

                    </tr>
            </thead>
            <tfoot>
                <tr>
                    <td colspan="5" style="text-align: center; font-style: italic;">
                        Information pulled from the Assign06Cars Table
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
                    <!-- <td style="border-right: 1px solid #000000;">
                        <a href="updateUser.php?id=<?php echo( trim($row["ShipperID"]));?>">edit</a>
                        <a href="deleteUser.php?id=<?php echo( trim($row["ShipperID"]));?>">delete</a>
                    </td> -->
                    <td style="border-right: 1px solid #0000;"><?php echo( trim($row["CarID"]));?></td>
                    <td style="border-right: 1px solid #0000;"><?php echo( trim($row["CarMake"]));?></td>
                    <td style="border-right: 1px solid #0000;"><?php echo( trim($row["CarModel"]));?></td>
                    <td style="border-right: 1px solid #0000;"><?php echo( trim($row["CarYear"]));?></td>
                    <td style="border-right: 1px solid #0000;"><?php echo( trim($row["CarColor"]));?></td>
                    <td ><?php echo( trim($row["CarHybrid"]));?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
            </table>
            <?php
            include("includes/CloseDbConn.php");
            ?>
</body>
</html>