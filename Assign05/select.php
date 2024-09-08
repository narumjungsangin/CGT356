<?php
session_start();
include("includes/OpenDbConn.php");
$_SESSION["errorMessage"]="";
?>
<!doctype html>
<html>
<head>
<meta charset = "utf-8">
<title>Assign 05 - Select</title>
</head>
<body>
        <h1 style = "text-align: center;"> Assign05 - Select </h1>
        <?php
        include("includes/menu.php");

        $sql = "SELECT UserID, LastName, FirstName, Title FROM usersLab5";

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

        <table style="border: 0px; width: 500px; padding: 0px; ,margin: 0px auto; border-sapcing: 0px;" title= "Listening of employees">
            <thead>
                    <tr>
                        <th colspan="4" style = "font-weight: boldbackground-color: #b1946c; text-allign: center;
                        text-decoration:underline;">userLab5 Table 
                        </th>
                    </tr>
                    <tr>
                            <th style="font-weight: bold; background-color: #b1946c;">UserID</th>
                            <th style="font-weight: bold; background-color: #b1946c;">LastName</th>
                            <th style="font-weight: bold; background-color: #b1946c;">FirstName</th>
                            <th style="font-weight: bold; background-color: #b1946c;">Title</th>
                    </tr>
            </thead>
            <tfoot>
                <tr>
                    <td colspan="4" style="text-align: center; font-style: italic;">
                        Information pulled from the usersLab5 Table
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
                    <td style="border-right: 1px solid #0000;"><?php echo( trim($row["UserID"]));?></td>
                    <td style="border-right: 1px solid #0000;"><?php echo( trim($row["LastName"]));?></td>
                    <td style="border-right: 1px solid #0000;"><?php echo( trim($row["FirstName"]));?></td>
                    <td ><?php echo( trim($row["Title"]));?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
            </table>
<!-- //NEW -->

<p>&nbsp;</p>
<?php
        $sql = "SELECT ShipperID, CompanyName, Phone FROM shippersLab5";

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

        <table style="border: 0px; width: 500px; padding: 0px; ,margin: 0px auto; border-sapcing: 0px;" title= "Listening of employees">
            <thead>
                    <tr>
                        <th colspan="4" style = "font-weight: boldbackground-color: #b1946c; text-allign: center;
                        text-decoration:underline;">userLab5 Table 
                        </th>
                    </tr>
                    <tr>
                            <th style="font-weight: bold; background-color: #b1946c;">ShipperID</th>
                            <th style="font-weight: bold; background-color: #b1946c;">CompanyName</th>
                            <th style="font-weight: bold; background-color: #b1946c;">Phone</th>
                    </tr>
            </thead>
            <tfoot>
                <tr>
                    <td colspan="3" style="text-align: center; font-style: italic;">
                        Information pulled from the MySQL Database
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
                    <td style="border-right: 1px solid #0000;"><?php echo( trim($row["ShipperID"]));?></td>
                    <td style="border-right: 1px solid #0000;"><?php echo( trim($row["CompanyName"]));?></td>
                    <td ><?php echo( trim($row["Phone"]));?></td>
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