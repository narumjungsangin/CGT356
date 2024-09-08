<?php

session_start();


$id = $_GET["id"];

include("includes/OpenDbConn.php");

$sql = "DELETE FROM P1Books WHERE BookID=".$id;

$result = mysqli_query($db, $sql);

include("includes/CloseDbConn.php");

header("Location:select.php");
?>