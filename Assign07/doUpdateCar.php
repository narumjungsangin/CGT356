<?php
session_start();

$CarID = $_POST["CarID"];
$CarMake = $_POST["CarMake"];
$CarModel = addslashes($_POST["CarModel"]);
$CarYear = $_POST["CarYear"];
$CarColor = addslashes($_POST["CarColor"]);
$CarHybrid = $_POST["CarHybrid"];

$removeThese = array("<?php","<?","?>","</","<",">","/>",";");
$CarModel =  str_replace($removeThese,"",$CarModel);
$CarColor =  str_replace($removeThese,"",$CarColor);

if(($CarID=="")||($CarMake=="- Make -")||($CarModel=="")||($CarYear=="")||($CarColor=="")||($CarHybrid==""))
{
    $_SESSION["errorMessage"] = "You must enter a value for all boxes!";
    header("Location:updateCar.php");
    exit;
}
else if(!is_numeric($CarID))
{   //make sure car id is number
    $SESSION["errorMessage"] = "You must enter a number for Car ID!";
    header("Location:updateCar.php");
    exit;
}
else
{
    $_SESSION["errorMessage"] = "";
}

include("includes/OpenDbConn.php");
$sql = "UPDATE Assign06Cars SET CarID='".$CarID."', CarMake='".$CarMake."', CarModel='".$CarModel."', CarYear='".$CarYear."', CarColor='".$CarColor."', CarHybrid='".$CarHybrid."' WHERE CarID = ".$CarID;

// echo($sql."<br/>");
$result = mysqli_query($db, $sql);

include("includes/CloseDbConn.php");
header("Location: select.php");
?>