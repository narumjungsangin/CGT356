<?php
session_start();

$shipperID = $_POST["shipperID"];
$companyName = addslashes($_POST["companyName"]);
$phone = addslashes($_POST["phone"]);

$removeThese = array("<?php","<?","?>","</","<",">","/>",";");
$compnayName =  str_replace($removeThese,"",$companyName);
$phone =  str_replace($removeThese,"",$phone);

if(($shipperID=="")||($companyName=="")||($phone==""))
{
    $_SESSION["errorMessage"] = "You must enter a value for all boxes!";
    header("Location:insert.php");
    exit;
}
else if(!is_numeric($shipperID))
{
    $SESSION["errorMessage"] = "You must enter a number for shipper ID!";
    header("Location:insert.php");
    exit;
}
else
{
    $_SESSION["errorMessage"] = "";
}

include("includes/OpenDbConn.php");
$sql = "SELECT ShipperID FROM shippersLab5 WHERE ShipperID=".$shipperID;
echo($sql."<br/>");
$result = mysqli_query($db,$sql);

if(empty($result))
    $num_results = 0;

else
    $num_results = mysqli_num_rows($result);

if($num_results !=0)
{
    $_SESSION["errorMessage"] = "The ShipperID you entered already exists!";
    header("Location:insert.php");
    exit;
}

else
    $_SESSION["errorMessage"]= "";

    //still on this page, so we to insert the data
$sql = "INSERT INTO shippersLab5(ShipperID, CompanyName, Phone) VALUES(".$shipperID.", '".$companyName."','".$phone."')";
echo($sql."<br/>");

$result = mysqli_query($db, $sql);

//if you have trouble with this page, comment out this header line
//so that the echo statments above will be visible to you and you can test them.

include("includes.CloseDbConn.php");
header("Location:select.php");
exit;
?>