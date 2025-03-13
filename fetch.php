<?php
include 'DBconnection.php';
try {
    
$select =$con->prepare("SELECT `Customer_ID`, `Name` FROM `Customer` WHERE  `Delete Flag` = '0' ;");
$select->execute();
$customer = $select->fetchAll((PDO::FETCH_ASSOC));
echo json_encode($customer);
} catch (PDOException$e) {
    error_log("Databse error check fetch".$e->getMessage());
}
?>
 
