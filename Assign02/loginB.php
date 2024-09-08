<?php
$userID = $_POST["userID"];
$passwd = $_POST["passwd"];

if(($userID == "Doosan") &&($passwd == "Bears"))
{
    header("Location:page1B.php");
    exit;
}

else if(( $userID == "NC")&&($passwd == "Dinos"))
{
    header("Location:page2B.php");
    exit;
}

else if(( $userID == "Hanwha")&&($passwd == "Eagles"))
{
    header("Location:page3B.php");
    exit;
}

else if(( $userID == "Samsung")&&($passwd == "Lions"))
{
    header("Location:page4B.php");
    exit;
}

else{
    header("Location:errorB.php");
}
?>