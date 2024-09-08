<?php
session_start();
// $id = $_GET["id"];
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


if(($BillingID=="")||($Name=="")||($Address=="")||($City=="") || ($State=="")||($Zip=="")||($CardType=="")||($CardNumber=="")||($ExpMonth=="")||($ExpYear==""))
{
    $_SESSION["errorMessage"] = "You must enter a value for all boxes!";
    header("Location: billing.php?id=" . urlencode($id));
    exit;
}

else
{
    $_SESSION["errorMessage"] = "";
}
include("includes/OpenDbConn.php");
$sql = "SELECT BillingID FROM P2Billing WHERE BillingID='".$BillingID."'";
// echo($sql."<br/>");
 $result = mysqli_query($db,$sql);

if(empty($result))
    $num_results = 0;

else
    $num_results = mysqli_num_rows($result);

if($num_results !=0)
{
    $_SESSION["errorMessage"] = "The Shipping ID you entered already exists!";
    header("Location: billing.php?id=" . urlencode($id));
    
    exit;
}

else
    $_SESSION["errorMessage"]= "";

$ExpDate = $ExpMonth."/".$ExpYear;

$sql = "INSERT INTO P2Billing(BillingID, Login,BillName, BillAddress, BillCity, BillState, BillZip, CardType, CardNumber, ExpDate) VALUES('".$BillingID."','".$id."','".$Name."', '".$Address."','".$City."', '".$State."', '".$Zip."', '".$CardType."', '".$CardNumber."', '".$ExpDate."')";
$result = mysqli_query($db, $sql);
// $result = mysqli_query($db, $sql);

//if you have trouble with this page, comment out this header line
//so that the echo statments above will be visible to you and you can test them.

include("includes.CloseDbConn.php");
header("Location: billing.php?id=" . urlencode($id));
exit;
?>