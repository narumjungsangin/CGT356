<?php
session_start();
// $id = $_GET["id"];
$id = $_SESSION['userName'];
$ShippingID = $_POST["ShippingID"];
// $Login = addslashes($_POST["Login"]);
$Name = addslashes($_POST["Name"]);
$Address = addslashes($_POST["Address"]);
$City = addslashes($_POST["City"]);
$State = addslashes($_POST["State"]);
$Zip = addslashes($_POST["Zip"]);


$removeThese = array("<?php","<?","?>","</","<",">","/>",";");
$Name =  str_replace($removeThese,"",$Name);
$Address =  str_replace($removeThese,"",$Address);
$City =  str_replace($removeThese,"",$City);
$State =  str_replace($removeThese,"",$State);
$Zip =  str_replace($removeThese,"",$Zip);

if(($ShippingID=="")||($Name=="")||($Address=="") || ($City=="")||($State=="")||($Zip==""))
{
    $_SESSION["errorMessage"] = "You must enter a value for all boxes!";
    header("Location:updateShipping.php?id=".$ShippingID);
    exit;
}

else
{
    $_SESSION["errorMessage"] = "";
}

include("includes/OpenDbConn.php");
$sql = "UPDATE P2Shipping SET Name='".$Name."', Address='".$Address."', City='".$City."', State='".$State."', Zip='".$Zip."' WHERE ShippingID='".$ShippingID."'";


$result = mysqli_query($db, $sql);

include("includes/CloseDbConn.php");
header("Location: shipping.php?id=".$id);
exit;
?>