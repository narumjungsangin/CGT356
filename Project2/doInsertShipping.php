<?php
session_start();
// $id = $_POST["userName"];
// $id = $_GET["id"];
$id = $_SESSION['userName'];
$ShippingID = $_POST["ShippingID"];
// $Login = addslashes($_POST["Login"]);
$Name = $_POST["Name"];
$Address = $_POST["Address"];
$City = $_POST["City"];
$State = $_POST["State"];
$Zip = $_POST["Zip"];




if(($ShippingID=="")||($Name=="")||($Address=="")||($City=="") || ($State=="")||($Zip==""))
{
    $_SESSION["errorMessage"] = "You must enter a value for all boxes!";
    header("Location: shipping.php?id=" . urlencode($id));
    // header("Location: shipping.php?id=" . echo urlencode($result['id']);
    exit;
}

else
{
    $_SESSION["errorMessage"] = "";
}
include("includes/OpenDbConn.php");
// $sql = "SELECT * FROM P2Shipping WHERE Login='".$id."'";
$sql = "SELECT * FROM P2Shipping WHERE ShippingID='".$ShippingID."'";

 $result = mysqli_query($db,$sql);

if(empty($result))
    $num_results = 0;

else
    $num_results = mysqli_num_rows($result);

if($num_results !=0)
{
    $_SESSION["errorMessage"] = "The Shipping ID you entered already exists!";
    header("Location: shipping.php?id=" . urlencode($id));
    // header("Location: shipping.php?id=" . $result['id']);


    exit;
}

else
    $_SESSION["errorMessage"]= "";

$sql = "INSERT INTO P2Shipping(ShippingID, Login, Name, Address, City, State, Zip) VALUES('".$ShippingID."','".$id."','".$Name."', '".$Address."','".$City."', '".$State."', '".$Zip."')";
$result = mysqli_query($db, $sql);
// $result = mysqli_query($db, $sql);

//if you have trouble with this page, comment out this header line
//so that the echo statments above will be visible to you and you can test them.

include("includes.CloseDbConn.php");
header("Location: shipping.php?id=" . urlencode($id));
// header("Location: shipping.php?id=" . $result['id']);

exit;
?>