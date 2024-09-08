<?php
session_start();
include("includes/OpenDbConn.php");
$sql = "DELETE FROM Assign06Projects WHERE ProjectID=46";

$result = mysqli_query($db, $sql);

include("includes/closeDbConn.php");
header("Location:select.php");

?>