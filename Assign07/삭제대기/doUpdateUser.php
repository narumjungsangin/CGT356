<?php
session_start();

$userID = $_POST["userID"];
$FirstName = addslashes($_POST["FirstName"]);
$LastName = addslashes($_POST["LastName"]);
$Title = addslashes($_POST["Title"]);

$removeThese = array("<?php","<?","?>","</","<",">","/>",";");
$companyName =  str_replace($removeThese,"",$companyName);
$phone =  str_replace($removeThese,"",$phone);

if(empty($shipperID)){
    header("Location:select.php");
    exit;
}

include("includes/OpenDbConn.php");
$sql = "UPDATE shippersLab5 SET FirstName='".$FirstName."',LastName='".$LastName."',Title='".$Title."' WHERE UserID = ".$userID;
echo($sql);
$result = mysqli_query($db, $sql);

include("includes/CloseDbConn.php");
header("Location: select.php");
?>