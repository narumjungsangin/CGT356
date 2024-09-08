<?php
session_start();
header("Cache-Control: no-cache");
if( !empty($_POST["name"]))
    $_SESSION["name"] = $_POST["name"];

if( !empty($_POST["height"]))
    $_SESSION["height"] = $_POST["height"];

if( !empty($_POST["batthrow"]))
    $_SESSION["batthrow"] = $_POST["batthrow"];

if( !empty($_POST["hometown"]))
    $_SESSION["hometown"] = $_POST["hometown"];

if( !empty($_POST["team"]))
    $_SESSION["team"] = $_POST["team"];

if( !empty($_POST["backnumber"]))
    $_SESSION["backnumber"] = $_POST["backnumber"];

    if( !empty($_POST["position"]))
    $_SESSION["position"] = $_POST["position"];

if( !empty($_POST["salary"]))
    $_SESSION["salary"] = $_POST["salary"];

if( !empty($_POST["comments"]))
    $_SESSION["comments"] = $_POST["comments"];

if((empty($_POST["name"])) || (empty($_POST["height"]))||
( empty($_POST["batthrow"])) || (empty($_POST["backnumber"]))||
( empty($_POST["position"])) || (empty($_POST["salary"]))||
( empty($_POST["comments"])))
{
    $_SESSION["errorMessage"] = "* Please fill out all of the require form elements";
    header("Location:index2.php");
    exit;
}

//get shipping
if(empty($_POST["Sname"]))
{
    //Sname is empty, so copy value from billing
    $_SESSION["Cteam"] = $_SESSION["team"];
    $_SESSION["Cbacknumber"] = $_SESSION["backnumber"];
    $_SESSION["Cposition"] = $_SESSION["position"];
    $_SESSION["Csalary"] = $_SESSION["salary"];
}
else
{
    $_SESSION["Cteam"] = $_POST["team"];
    $_SESSION["Cbacknumber"] = $_POST["backnumber"];
    $_SESSION["Cposition"] = $_POST["position"];
    $_SESSION["Csalary"] = $_POST["salary"];
}
header("Location:displayInfo2.php");

?>
