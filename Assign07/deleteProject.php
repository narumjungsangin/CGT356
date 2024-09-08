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
    <title>Assign07 - Delete</title>
    <style type = "text/css">
        form{width:450px margin:0px auto;}
        ul{list-style: none; margin-top:5px}
        ul li{display:block; float:left; width:100%; height:1%;}
        label{float: left; padding-left:-30px;}
        span{color: #ff0000; font-weight: bold;}
        input, select, span.values{float: right; margin: 10px; border: 1px solid #00000; padding: 3px; width: 240px;}
        span.values{padding-left:200px; padding-top: -300px;}
        #submit{width: 248px;}
        input:focus{border: 1px solid #999999;}
        fieldset{padding: 10px; border: 1px solid #000000; width: 450px; overflow: auto; margin:10px;}
        legend{color: #00000;  margin: 0 10px 0 0; padding:0 5px; font-size: 11px; font-weight:bold;}
    </style>
</head>

<body>
     <h1 style = "text-align: center;"> Assign07 - Delete Project </h1>
     <?php
     include("includes/menu.php");
    //prepare my sql statement
    $sql = "SELECT * FROM Assign06Projects WHERE ProjectID=46"; //46에 고정
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
            $_SESSION["errorMessage"] = "You must enter 46";
     ?>

     <form id="form0" name="form0" method="post" action="doDeleteProject.php">
        <fieldset>
            <legend>Are you sure you want to delete the Project?</legend>
            <ul>
                 <li>
                    <label title="ProjectID" for = "ProjectID">Project ID</label>
                    <span class = "values"><?php if($num_results !=0){echo(trim($row["ProjectID"]));}?></span>
                </li>            
                
                <li>
                    <label title="ProjName" for = "ProjName">Project Name</label>
                    <span class = "values"><?php if($num_results !=0){echo(trim($row["ProjName"]));}?></span>
                </li>

                <li>
                    <label title="ProjCategory" for = "ProjCategory">Project Category</label>
                    <span class = "values"><?php if($num_results !=0){echo(trim($row["ProjCategory"]));}?></span>
                </li>

                <li>
                    <label title="ProjDesc" for = "ProjDesc">Project Description</label>
                    <span class = "values"><?php if($num_results !=0){echo(trim($row["ProjDesc"]));}?></span>
                </li>

                <li>
                    <label title="StartDate" for = "StartDate">Start Date</label>
                    <span class = "values"><?php if($num_results !=0){echo(trim($row["StartDate"]));}?></span>
                </li>
                <li>
                    <label title="EndDate" for = "EndDate">End Date</label>
                    <span class = "values"><?php if($num_results !=0){echo(trim($row["EndDate"]));}?></span>
                </li>

                <li>
                    <span><?php echo($_SESSION["errorMessage"]);?></span>
                </li>

                <li>
                    <input type="submit" value="Delete Project" name="submit" id="submit" />
                </li>
            </ul>
        </fieldset>
    </form>

    <?php
        $_SESSION["errorMessage"] = "";
    ?>
    <script type="text/javascript">
        document.getElementById("ProjectID").focus();
    </script>

</body>
</html>