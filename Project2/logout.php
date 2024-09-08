<?php
    session_start();
    $_SESSION["userName"] = "";
    $_SESSION["errorMessage"] = "logout complete!";
    session_destroy();
    header("Location:index.php");
    exit;
?>
