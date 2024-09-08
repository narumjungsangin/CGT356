<?php
session_start();
$_SESSION["userName"];
$id = $_GET["id"];

$BillingID = $_GET["id"];

include("includes/OpenDbConn.php");

$sql = "DELETE FROM P2Billing WHERE BillingID='$id' AND Login='".$_SESSION["userName"]."'";

$result = mysqli_query($db, $sql);

include("includes/CloseDbConn.php");

header("Location:billing.php"?id= echo($_SESSION["userName"]);?);
?>