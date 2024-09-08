<?php
session_start();
$userName = $_POST["userName"];
$passwd = $_POST["passwd"];

include("includes/openDbConn.php");
$sql = "SELECT Login FROM P2User WHERE Login='".$userName."' AND Passwd ='".$passwd."'";
echo($sql);

$result = mysqli_query($db, $sql);
include("includes/closeDbConn.php");

if(empty($result)){
    $num_results = 0;
}
else{
    $num_results = mysqli_num_rows($result);
}

if($num_results == 0){
    $_SESSION["errorMessage"] = "The login or password you entered is incorrect!";
    header("Location:index.php");
    exit;
}
else{
    $_SESSION["userName"] = $userName;
    $_SESSION["errorMessage"] = "login complete!";
    header("Location:index.php");
    exit;

}

?>
