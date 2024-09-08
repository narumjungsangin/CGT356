<?php
session_start();

$ProjectID = $_POST["projectID"];
$ProjName = addslashes($_POST["projName"]);
$ProjCategory = $_POST["projCategory"];
$ProjDesc = addslashes($_POST["projDesc"]);
$StartMonth = $_POST["startMonth"];
$StartDay = $_POST["startDay"];
$EndMonth = $_POST["endMonth"];
$EndDay = $_POST["endDay"];

$removeThese = array("<?php","<?","?>","</","<",">","/>",";");
$ProjName =  str_replace($removeThese,"",$ProjName);
$ProjDesc =  str_replace($removeThese,"",$ProjDesc);

if(($ProjectID=="")||($ProjName=="")||($ProjCategory=="- Category -") || ($ProjDesc=="")||($StartMonth=="- Month -")||($StartDay=="- Day -")||($EndMonth=="- Month -")||($EndDay=="- Day -"))
{
    $_SESSION["errorMessage"] = "You must enter a value for all boxes!";
    header("Location:updateProject.php");
    exit;
}
else if(!is_numeric($ProjectID))
{
    $SESSION["errorMessage"] = "You must enter a number for PROJECT ID!";
    header("Location:updateProject.php");
    exit;
}
else
{
    $_SESSION["errorMessage"] = "";
}

include("includes/OpenDbConn.php");
$StartDate = $StartMonth." ".$StartDay;
$EndDate = $EndMonth." ".$EndDay;

$sql = "UPDATE Assign06Projects SET ProjName='".$ProjName."',ProjCategory='".$ProjCategory."',ProjDesc='".$ProjDesc."',StartDate='".$StartDate."',EndDate='".$EndDate."' WHERE ProjectID = ".$ProjectID;
//echo($sql."<br/>");
$result = mysqli_query($db, $sql);

include("includes/CloseDbConn.php");
header("Location: select.php");
?>