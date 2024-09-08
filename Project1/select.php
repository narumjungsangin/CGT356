<?php
session_start();
include("includes/OpenDbConn.php");
$_SESSION["errorMessage"]="";
?>
<!doctype html>
<html>
<head>
    <style type = "text/css">
        /* body{margin: 0px auto; tex}
        .table{ margin-left:auto; margin-right:auto; text-align:center;} */
    </style>
<meta charset = "utf-8">
<title>Project 01 - Select</title>
</head>
<body>
        <h1 style = "text-align: center;"> Project1 - Select </h1>
        <?php
        include("includes/menu.php");

        $sql = "SELECT * FROM P1Books";

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

        <table style="border: 0px; width: 1000px; text-align:center; padding: 0px; margin: 0px auto; border-spacing: 0px; " title= "Listening of Books">
            <thead>
                    <tr>
                        <th colspan="9" style = "font-weight: bold; background-color: #b1946c; text-align: center;
                        text-decoration:underline;">Project1 Table 
                        </th>
                    </tr>
                    <tr>
                            <th style="font-weight: bold; background-color: #b1946c;">&nbsp;</th>
                            <th style="font-weight: bold; background-color: #b1946c;">BookID</th>
                            <th style="font-weight: bold; background-color: #b1946c;">Title</th>
                            <th style="font-weight: bold; background-color: #b1946c;">Author</th>
                            <th style="font-weight: bold; background-color: #b1946c;">Topic</th>
                            <th style="font-weight: bold; background-color: #b1946c;">Genre</th>
                            <th style="font-weight: bold; background-color: #b1946c;">ISBN</th>
                            <th style="font-weight: bold; background-color: #b1946c;">DatePublished</th>
                            <th style="font-weight: bold; background-color: #b1946c;">Hardcover</th>
                    </tr>
            </thead>
            <tfoot>
                <tr>
                    <td colspan="9" style="text-align: center; font-style: italic;">
                        Information pulled from the P1 Books Table
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
                        <a href="update.php?id=<?php echo(trim($row["BookID"]));?>">edit</a>
                        <a href="delete.php?id=<?php echo(trim($row["BookID"]));?>">delete</a>
                    </td>
                    <td style="border-right: 1px solid #0000; text-align:center;"><?php echo( trim($row["BookID"]));?></td>
                    <td style="border-right: 1px solid #0000; text-align:center;"><?php echo( trim($row["Title"]));?></td>
                    <td style="border-right: 1px solid #0000; text-align:center;"><?php echo( trim($row["Author"]));?></td>
                    <td style="border-right: 1px solid #0000; text-align:center;"><?php echo( trim($row["Topic"]));?></td>
                    <td style="border-right: 1px solid #0000; text-align:center;"><?php echo( trim($row["Genre"]));?></td>
                    <td style="border-right: 1px solid #0000; text-align:center;"><?php echo( trim($row["ISBN"]));?></td>
                    <td style="border-right: 1px solid #0000; text-align:center;"><?php echo( trim($row["DatePublished"]));?></td>
                    <td ><?php echo( trim($row["Hardcover"]));?></td>
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