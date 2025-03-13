<?php
include 'DBconnection.php';
try {
    $select = $con->prepare("SELECT `Customer_ID`, `Name` FROM `Customer` WHERE `Delete_Flag` = '0'");
    $select->execute();
    $customer = $select->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($customer); // Return JSON array
} catch (PDOException $e) {
    error_log("Database error: " . $e->getMessage());
    echo json_encode([]); // Return empty array on error
}
?>