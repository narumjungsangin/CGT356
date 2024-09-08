<?php
session_start();

$userName = $_POST["userName"];
$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$password = $_POST["password"];
$email = $_POST["email"];
$NewsLetter = $_POST["NewsLetter"];


$removeThese = array("<?php","<?","?>","</","<",">","/>",";");

if(($firstName=="")||($lastName=="") || ($password=="")||($email=="")||($NewsLetter==""))
{
    $_SESSION["errorMessage"] = "You must enter a value for all boxes!";
    header("Location:update.php?id=".$userName);
    exit;
}
else
{
    $_SESSION["errorMessage"] = "";
}

include("includes/OpenDbConn.php");
$sql = "UPDATE P2User SET FirstName='".$firstName."', LastName='".$lastName."', Passwd='".$password."', Email='".$email."', NewsLetter='".$NewsLetter."' WHERE Login = '".$userName."'";



// echo($sql);
$result = mysqli_query($db, $sql);

include("includes/CloseDbConn.php");
header("Location: index.php");
?>