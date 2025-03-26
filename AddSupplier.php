<!-- 
    File:           	add_supplier.php
    Purpose:        	Handles creation of new supplier records in the database
    Member:         	Muhammad Fahad (C00311349)
    Functionality:
                   		Processes supplier form submissions
          	   	   		Inserts records into Supplier table
                   		Implements error handling and logging
    Security:       	Uses prepared statements to prevent SQL injection
    Error Handling: 	Includes try-catch block for database operations
 	Database Impact: 	Inserts records into Supplier table
	Date:		   		26/03/2025
-->
<?php
include './DBconnection.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $address = $_POST['address'];
    $web_url = $_POST['web_url'];
    try {
        // insert data into supplier table
        $insert = $con->prepare("INSERT INTO `Supplier`(`Name`, `Address`, `Telephone`, `Email`, `web_url`) 
    VALUES (:name, :address, :telephone, :email, :web_url )");

        $insert->bindParam(':name', $name);
        $insert->bindParam(':address', $address);
        $insert->bindParam(':telephone', $telephone);
        $insert->bindParam(':email', $email);
        $insert->bindParam(':web_url', $web_url);

        if ($insert->execute()) {
            echo "<h2>Data is inserted into database successfully.</h2>";
        } else {
            echo "Error occurred while inserting data into database.";
            error_log("Dtabase Error: " . print_r($insert->errorInfo(), true));
        }
    } catch (PDOException $e) {
        // display error log in case of any error
        echo ("Databse error: " . $e->getMessage());
        error_log("database error: " . $e->getMessage());
    }
}
?>