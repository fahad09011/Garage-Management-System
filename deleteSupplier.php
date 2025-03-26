<!-- 
    File:               delete_supplier.php
    Purpose:            Handles safe deletion (soft delete) of supplier records
    Member:             Muhammad Fahad (C00311349)
    Functionality:
                        Checks for unpaid invoices before deletion
          	   	        Verifies no open orders exist
                        Implements soft delete via Delete_Flag
                        Provides comprehensive error handling
                        Block deletion if unpaid invoices exist
                        Block deletion if open orders exist
    Security:       	Uses prepared statements to prevent SQL injection
    Error Handling: 	Includes try-catch block for database operations
 	Database Impact: 	Reads from Invoice and Order tables
                        Updates Supplier table (Delete_Flag)
	Date:		   		26/03/2025
-->
<?php
include './DBconnection.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['supplier_id'])) {
    $supplier_id = $_POST['supplier_id'];
    try {
        // Check for unpaid invoices
        $check_invoice = $con->prepare("SELECT COUNT(*) FROM `Invoice` WHERE `Supplier_ID` = :id AND `Status` = 'ISSUED'");
        $check_invoice->bindParam(':id', $supplier_id);
        $check_invoice->execute();
        $unpaid_invoice = $check_invoice->fetchColumn();
        // Check for open orders (fixed missing AND)
        $check_order = $con->prepare("SELECT COUNT(*) FROM `Order` WHERE `Supplier_ID` = :id AND `Status` = '0'");
        $check_order->bindParam(':id', $supplier_id);
        $check_order->execute();
        $open_order = $check_order->fetchColumn();
        if ($unpaid_invoice > 0) {
            echo "<h2>Cannot delete supplier - there are $unpaid_invoice unpaid invoices.</h2>";
        } elseif ($open_order > 0) {
            echo "<h2>Cannot delete supplier - there are $open_order open orders.</h2>";
        } else {
            // Update delete flag
            $update = $con->prepare("UPDATE `Supplier` SET `Delete_Flag` = '1' WHERE `Supplier_ID` = :id");
            $update->bindParam(':id', $supplier_id);
            if ($update->execute()) {
                echo "<h2>Supplier has been successfully flagged for deletion.</h2>";
            } else {
                echo "<h2>Error processing supplier deletion.</h2>";
                error_log("Database Error: " . print_r($update->errorInfo(), true));
            }
        }
    } catch (PDOException $e) {
        // display error logs in case of any erros
        error_log("Database Error: " . $e->getMessage());
        echo "<h2>System error occurred. Please try again.</h2>";
    }
} else {
    echo "<h2>Please select a valid supplier.</h2>";
}