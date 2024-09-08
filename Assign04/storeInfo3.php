<?php
session_start();
header("Cache-Control: no-cache");
if( !empty($_POST["id"]))
    $_SESSION["id"] = $_POST["id"];

if( !empty($_POST["projectname"]))
    $_SESSION["projectname"] = $_POST["projectname"];

if( !empty($_POST["description"]))
    $_SESSION["description"] = $_POST["description"];

if( !empty($_POST["managername"]))
    $_SESSION["managername"] = $_POST["managername"];

if( !empty($_POST["email"]))
    $_SESSION["email"] = $_POST["email"];

if( !empty($_POST["phone"]))
    $_SESSION["phone"] = $_POST["phone"];

    if( !empty($_POST["department"]))
    $_SESSION["department"] = $_POST["department"];

if( !empty($_POST["address"]))
    $_SESSION["address"] = $_POST["address"];

if( !empty($_POST["comments"]))
    $_SESSION["comments"] = $_POST["comments"];

if((empty($_POST["projectname"])) || (empty($_POST["description"]))||
( empty($_POST["managername"])) || (empty($_POST["department"]))||
( empty($_POST["address"])) || (empty($_POST["comments"])))
{
    $_SESSION["errorMessage"] = "* Please fill out all of the require form elements";
    header("Location:index3.php");
    exit;
}

//get shipping
if(empty($_POST["Sname"]))
{
    //Sname is empty, so copy value from billing
    $_SESSION["Cid"] = $_SESSION["id"];
    $_SESSION["Cprojectname"] = $_SESSION["projectname"];
    $_SESSION["Cdescription"] = $_SESSION["description"];
}
else
{
    $_SESSION["Cid"] = $_POST["id"];
    $_SESSION["Cprojectname"] = $_POST["projectname"];
    $_SESSION["Cdescription"] = $_POST["description"];
}
header("Location:displayInfo3.php");

?>
