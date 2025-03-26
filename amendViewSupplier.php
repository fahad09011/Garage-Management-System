<!-- 
    File:           	amendViewSupplier.php
    Purpose:        	Handles updating supplier records in the database
    Member:         	Muhammad Fahad (C00311349)
    Functionality:
                   		Processes supplier update form submissions
          	   	   		update records into Supplier table
                   		Implements error handling and logging
    Security:       	Uses prepared statements to prevent SQL injection
    Error Handling: 	Includes try-catch block for database operations
 	Database Impact: 	update records into Supplier table
	Date:		   		26/03/2025
-->
<?php
include 'DBconnection.php';
// include 'fetch_customer.php' ;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // this lines shows what data sent to server for adding into  database , these lines are used during debugging. <pre> is a HTML tag who converts the content/data into readable format and structure.
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
    $supplier_id = $_POST['supplier_id'];
    $supplier_name = $_POST['name'];
    $supplier_email = $_POST['email'];
    $supplier_telephone = $_POST['telephone'];
    $supplier_address = $_POST['address'];
    $web_url = $_POST['web_url'];
    // make sure the supplier_id is provided
    if (!$supplier_id) {
        echo "<h2>Please select Supplier</h2>";
        exit();
    }
    // Start from here, need to change the query ahead
    try {
        //this query update the supplier details
        $update = $con->prepare("UPDATE `Supplier` SET `Name`=:name,`Address`=:address,`Telephone`=:telephone,`Email`=:email,`web_url`=:web_url WHERE `Supplier_ID` =:id ;");
        $update->bindParam(':id', $supplier_id);
        $update->bindParam(':name', $supplier_name);
        $update->bindParam(':email', $supplier_email);
        $update->bindParam(':telephone', $supplier_telephone);
        $update->bindParam(':address', $supplier_address);
        $update->bindParam(':web_url', $web_url);
        if ($update->execute()) {
            echo "<h2>Data is updated in the database successfully.</h2>";
        } else {
            echo "Error during inserting data into Database!";
            error_log("Database Error: " . print_r($update->errorInfo(), true));
        }
    } catch (PDOException $e) {
        // display error logs in case of any errors
        error_log("Database Error: " . $e->getMessage());
    }
}
?>