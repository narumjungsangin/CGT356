<?php
session_start();
include("includes/OpenDbConn.php");
$sql = "DELETE FROM shippersLab5 WHERE UserID=".$userID;

$result = mysqli_query($db, $sql);
include("includes/CloseDbConn.php");
header("Location:select.php");
?>