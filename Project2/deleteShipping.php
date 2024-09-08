<?php
session_start();
$_SESSION["userName"];
$id = $_GET["id"];

include("includes/OpenDbConn.php");

// $sql = "DELETE FROM P2Shipping WHERE ShippingID=".$id;

$sql = "DELETE FROM P2Shipping WHERE ShippingID='$id' AND Login='".$_SESSION["userName"]."'";


$result = mysqli_query($db, $sql);

include("includes/CloseDbConn.php");

header("Location:shipping.php");
?>