<?php
session_start();

$UserName = ($_POST["userName"]);
$FirstName = addslashes($_POST["firstName"]);
$LastName = addslashes($_POST["lastName"]);
$Passwd = addslashes($_POST["passwd"]);
$Email = addslashes($_POST["email"]);
$NewsLetter = addslashes($_POST["newsLetter"]);

$removeThese = array("<?php","<?","?>","</","<",">","/>",";");
$UserName =  str_replace($removeThese,"",$UserName);
$FirstName =  str_replace($removeThese,"",$FirstName);
$LastName =  str_replace($removeThese,"",$LastName);
$Passwd =  str_replace($removeThese,"",$Passwd);
$Email =  str_replace($removeThese,"",$Email);
$NewsLetter =  str_replace($removeThese,"",$NewsLetter);


if(($UserName=="")||($FirstName=="")||($LastName=="") || ($Passwd=="")||($Email=="")||($NewsLetter==""))
{
    $_SESSION["errorMessage"] = "You must enter a value for all boxes!";
    header("Location:loginindex.php");
    exit;
}

else
{
    $_SESSION["errorMessage"] = "";
}
include("includes/OpenDbConn.php");
$sql = "SELECT Login FROM P2User WHERE Login='" . mysqli_real_escape_string($db, $UserName) . "'";

echo($sql."<br/>");
 $result = mysqli_query($db,$sql);

if(empty($result))
    $num_results = 0;

else
    $num_results = mysqli_num_rows($result);

if($num_results !=0)
{
    $_SESSION["errorMessage"] = "The = ID you entered already exists!";
    header("Location:loginindex.php");
    exit;
}

else
    $_SESSION["errorMessage"]= "";

$sql = "INSERT INTO P2User(Login, FirstName, LastName, Passwd, Email, NewsLetter) VALUES('" . mysqli_real_escape_string($db, $UserName) . "','" . mysqli_real_escape_string($db, $FirstName) . "', '" . mysqli_real_escape_string($db, $LastName) . "','" . mysqli_real_escape_string($db, $Passwd) . "', '" . mysqli_real_escape_string($db, $Email) . "', '" . mysqli_real_escape_string($db, $NewsLetter) . "')";

echo($sql."<br/>");
$result = mysqli_query($db, $sql);

//if you have trouble with this page, comment out this header line
//so that the echo statments above will be visible to you and you can test them.

include("includes.CloseDbConn.php");
header("Location:index.php");
exit;
?>