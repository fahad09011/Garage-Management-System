<!-- 
    File:           	fetch.php
    Purpose:        	Provides JSON data for dynamic dropdown menus
    Member:         	Muhammad Fahad (C00311349)
    Functionality:
                   		Fetches active records from multiple tables:
          	   	   		Customers
                   		Suppliers
                        Job Types
                        Stock Items
                        Returns data as JSON for AJAX consumption
    Security:       	Uses prepared statements to prevent SQL injection
    Error Handling: 	Includes try-catch block for database operations
 	Database Impact: 	Reads from Booking and Customer tables
	Date:		   		26/03/2025
-->
<?php 
include 'DBconnection.php';
$response = [
    'customer' => [],       // Will hold customer dropdown data
    'supplier'  => [],      // Will hold supplier dropdown data
    'job_type'  => [],      // Will hold job type dropdown data
    'stock_item'  => []     // Will hold stock item dropdown data
];
// drop down for ustomer
try {
    $Customer = $con->prepare("SELECT `Customer_ID`, `Name` FROM `Customer` WHERE `Delete_Flag` = '0';");
    $Customer->execute();
    $response['customer'] = $Customer->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    
    error_log("Database Error while fetching dropdown".$e->getMessage());
    echo json_encode([]); // Return empty array on error
}
//Drop Down For Supplier 
try {
    $Supplier = $con->prepare("SELECT `Supplier_ID`, `Name` FROM `Supplier` WHERE `Delete_Flag` = '0' ;");
    $Supplier->execute();
    $response['supplier'] = $Supplier->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log("Database Error while fetching dropdown".$e->getMessage());
    echo json_encode([]); // Return empty array on error
}
// drop down for job type
 try {
     $jobtype = $con->prepare("SELECT `Job_Type_ID`, `Job_Type_Name` FROM `Job_Type` WHERE `Delete_Flag` = '0' ;");
     $jobtype->execute();
     $response['job_type'] = $jobtype->fetchAll(PDO::FETCH_ASSOC);
 } catch (PDOException $e) {
     error_log("Database Error while fetching dropdown".$e->getMessage());
     echo json_encode([]);
 }

// drop down for stock item
try {
    $stockitem = $con->prepare("SELECT `Stock_ID`, `Description` FROM `Stock_Item` WHERE `Status` = '0';");
    $stockitem->execute();
    $response['stock_item'] = $stockitem->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log("Database Error while fetching dropdown".$e->getMessage());
    echo json_encode([]);
}
// Set the content type to JSON
header('Content-Type: application/json');
echo json_encode($response);
?>

