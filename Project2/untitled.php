<!doctype html>
<?php
    $_SESSION["loginID"];
?>
<html>
<head>
    <neta charset="utf-8">
        <tite>Untitled Document</title>
</head>
<body>
    <?php
        $sql = "SELECT * FROM P2Billing WHERE Login='".$_SESSION["loginID"]."'";
        $sql = "UPDATE P2Billing SET BillName='', BillAddress='',BIllCity='' WHERE BillingID='' AND Login='".$_SESSION["userName"]."'"
    ?>
</body>
</html>