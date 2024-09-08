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
    header("Location:insert.php");
    exit;
}

else if(!is_numeric($BookID))
{   //make sure book id is number
    $SESSION["errorMessage"] = "You must enter a number for Book ID!";
    header("Location:insert.php");
    exit;
}
else
{
    $_SESSION["errorMessage"] = "";
}
include("includes/OpenDbConn.php");
$sql = "SELECT BookID FROM P1Books WHERE BookID=".$BookID;
// echo($sql."<br/>");
$result = mysqli_query($db,$sql);

if(empty($result))
    $num_results = 0;

else
    $num_results = mysqli_num_rows($result);

if($num_results !=0)
{
    $_SESSION["errorMessage"] = "The BookID you entered already exists!";
    header("Location:insert.php");
    exit;
}

else
    $_SESSION["errorMessage"]= "";

$DatePublished = $PublishMonth." ".$PublishYear;
$sql = "INSERT INTO P1Books(BookID, Title, Author, Topic, Genre, ISBN, DatePublished, Hardcover) VALUES(".$BookID.",'".$Title."', '".$Author."','".$Topic."', '".$Genre."', '".$ISBN."', '".$DatePublished."', '".$Hardcover."')";

$result = mysqli_query($db, $sql);

//if you have trouble with this page, comment out this header line
//so that the echo statments above will be visible to you and you can test them.

include("includes.CloseDbConn.php");
header("Location:select.php");
exit;
?>