<?php
include 'DBconnection.php';
$sql = "SELECT `Supplier_ID`, `Name`, `Address`, `Telephone`, `Email`  FROM `Supplier` WHERE `Delete_Flag` = '0' ;";
$result = $con->query($sql);
        $row = $result->fetchAll(PDO::FETCH_ASSOC);
?>
<!-- order
 stock item
 invoice -->