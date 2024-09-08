<?php
session_start();

$BookID = $_POST["BookID"];
$Title = addslashes($_POST["Title"]);
$Author = addslashes($_POST["Author"]);
$Topic = $_POST["Topic"];
$Genre = $_POST["Genre"];
$ISBN = addslashes($_POST["ISBN"]);
$PublishMonth = $_POST["PublishMonth"];
$PublishYear = $_POST["PublishYear"];
$Hardcover = $_POST["Hardcover"];


$removeThese = array("<?php","<?","?>","</","<",">","/>",";");
$Title =  str_replace($removeThese,"",$Title);
$Author =  str_replace($removeThese,"",$Author);
$ISBN =  str_replace($removeThese,"",$ISBN);

if(($BookID=="")||($Title=="")||($Author=="") || ($Topic=="")||($Genre=="")||($ISBN=="")||($PublishMonth==" - Month - ")||($PublishYear==" - Year - ")||($Hardcover==""))
{
    $_SESSION["errorMessage"] = "You must enter a value for all boxes!";
    header("Location:update.php?id=".$BookID);
    exit;
}
else if(!is_numeric($BookID))
{   //make sure car id is number
    $_SESSION["errorMessage"] = "You must enter a number for Book ID!";
    header("Location:update.php?id=".$BookID);
    exit;
}
else
{
    $_SESSION["errorMessage"] = "";
}

$DatePublished = $PublishMonth." ".$PublishYear;
include("includes/OpenDbConn.php");
$sql = "UPDATE P1Books SET Title='".$Title."', Author='".$Author."', Genre='".$Genre."', ISBN='".$ISBN."', DatePublished='".$DatePublished."', Hardcover='".$Hardcover."' WHERE BookID = ".$BookID;


// echo($sql);
$result = mysqli_query($db, $sql);

include("includes/CloseDbConn.php");
header("Location: select.php");
?>