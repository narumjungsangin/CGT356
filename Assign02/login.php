<?php
$userID = $_POST["userID"];
$passwd = $_POST["passwd"];

if(($userID == "page1") &&($passwd == "alpha"))
{
    header("Location:page1.php");
    exit;
}

else if(( $userID == "page2")&&($passwd == "beta"))
{
    header("Location:page2.php");
    exit;
}

else if(( $userID == "page3")&&($passwd == "gamma"))
{
    header("Location:page3.php");
    exit;
}

else{
    header("Location:error.php");
}
?>