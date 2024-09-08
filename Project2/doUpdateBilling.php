<?php
session_start();
$id = $_SESSION['userName'];
$BillingID = $_POST["BillingID"];
// $Login = addslashes($_POST["Login"]);
$Name = $_POST["BillName"];
$Address = $_POST["BillAddress"];
$City = $_POST["BillCity"];
$State = $_POST["BillState"];
$Zip = $_POST["BillZip"];
$CardType = $_POST["CardType"];
$CardNumber = $_POST["CardNumber"];
$ExpMonth = $_POST["ExpMonth"];
$ExpYear = $_POST["ExpYear"];

$removeThese = array("<?php","<?","?>","</","<",">","/>",";");
$CardType =  str_replace($removeThese,"",$CardType);
$ExpMonth =  str_replace($removeThese,"",$ExpMonth);
$ExpYear =  str_replace($removeThese,"",$ExpYear);

if(($BillingID=="")||($Name=="")||($Address=="")||($City=="") || ($State=="")||($Zip=="")||($CardType==" - Card - ")||($CardNumber=="")||($ExpMonth==" - Month - ")||($ExpYear==" - Year - "))
{
    $_SESSION["errorMessage"] = "You must enter a value for all boxes!";
    header("Location:updateBilling.php?id=".$BillingID);
    exit;
}

else
{
    $_SESSION["errorMessage"] = "";
}

include("includes/OpenDbConn.php");

$ExpDate = $ExpMonth."/".$ExpYear;
$sql = "UPDATE P2Billing SET BillName='".$Name."', BillAddress='".$Address."', BillCity='".$City."', BillState='".$State."', BillZip='".$Zip."', CardType='".$CardType."', CardNumber='".$CardNumber."' , ExpDate='".$ExpDate."'WHERE BillingID='".$BillingID."'";


$result = mysqli_query($db, $sql);

include("includes/CloseDbConn.php");
header("Location: billing.php");
?>