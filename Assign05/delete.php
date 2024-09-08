<?php
session_start();
include("includes/OpenDbConn.php");
$sql = "DELETE FROM shippersLab5 WHERE ShipperID=2";

$result = mysqli_query($db, $sql);
include("includes/CloseDbConn.php");
header("Location:select.php");
?>