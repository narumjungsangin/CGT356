<?php
session_start();

$ProjectID = $_POST["ProjectID"];
$ProjName = addslashes($_POST["ProjName"]);
$ProjCategory = $_POST["ProjCategory"];
$ProjDesc = addslashes($_POST["ProjDesc"]);
$StartMonth = $_POST["StartMonth"];
$StartDay = $_POST["StartDay"];
$EndMonth = $_POST["EndMonth"];
$EndDay = $_POST["EndDay"];



$removeThese = array("<?php","<?","?>","</","<",">","/>",";");
$ProjName =  str_replace($removeThese,"",$ProjName);
$ProjDesc =  str_replace($removeThese,"",$ProjDesc);

if(($ProjectID=="")||($ProjName=="")||($ProjCategory=="- Category -") || ($ProjDesc=="")||($StartMonth==" - Month - ")||($StartDay==" - Day - ")||($EndMonth==" - Month - ")||($EndDay==" - Day - "))
{
    $_SESSION["errorMessage"] = "You must enter a value for all boxes!";
    header("Location:insertProject.php");
    exit;
}
else if(!is_numeric($ProjectID))
{
    $SESSION["errorMessage"] = "You must enter a number for PROJECT ID!";
    header("Location:insertProject.php");
    exit;
}
else
{
    $_SESSION["errorMessage"] = "";
}

include("includes/OpenDbConn.php");
$sql = "SELECT ProjectID FROM Assign06Projects WHERE ProjectID=".$ProjectID;
// echo($sql."<br/>");

$result = mysqli_query($db,$sql);

if(empty($result))
    $num_results = 0;

else
    $num_results = mysqli_num_rows($result);

if($num_results !=0)
{
    $_SESSION["errorMessage"] = "The ProjectID you entered already exists!";
    header("Location:insertProject.php");
    exit;
}

else
    $_SESSION["errorMessage"]= "";

$StartDate = $StartMonth." ".$StartDay;
$EndDate = $EndMonth." ".$EndDay;
//still on this page, so we need to insert the data
$sql = "INSERT INTO Assign06Projects(ProjectID, ProjName, ProjCategory, ProjDesc, StartDate, EndDate) VALUES(".$ProjectID.", '".$ProjName."','".$ProjCategory."', '".$ProjDesc."', '".$StartDate."', '".$EndDate."')";
// echo($sql."<br/>");

$result = mysqli_query($db, $sql);

//if you have trouble with this page, comment out this header line
//so that the echo statments above will be visible to you and you can test them.

include("includes.CloseDbConn.php");
header("Location:select.php");
exit;
?>