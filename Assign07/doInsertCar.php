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
    header("Location:insertCar.php");
    exit;
}
else if(!is_numeric($CarID))
{   //make sure car id is number
    $SESSION["errorMessage"] = "You must enter a number for shipper ID!";
    header("Location:insertCar.php");
    exit;
}
else
{
    $_SESSION["errorMessage"] = "";
}

include("includes/OpenDbConn.php");
$sql = "SELECT CarID FROM Assign06Cars WHERE CarID=".$CarID;
$result = mysqli_query($db,$sql);
// exit;

if(empty($result))
    $num_results = 0;

else
    $num_results = mysqli_num_rows($result);

if($num_results !=0)
{
    $_SESSION["errorMessage"] = "The CarID you entered already exists!";
    header("Location:insertCar.php");
    exit;
}

else
    $_SESSION["errorMessage"]= "";

    //still on this page, so we need to insert the data
$sql = "INSERT INTO Assign06Cars(CarID, CarMake, CarModel, CarYear, CarColor, CarHybrid) VALUES(".$CarID.", '".$CarMake."','".$CarModel."', '".$CarYear."', '".$CarColor."', '".$CarHybrid."')";

$result = mysqli_query($db, $sql);

//if you have trouble with this page, comment out this header line
//so that the echo statments above will be visible to you and you can test them.

include("includes.CloseDbConn.php");
header("Location:select.php");
exit;
?>