<!-- 
    File:           income Graph Data 
    Purpose:        This file retrieves income data from the database to display 
					in the dashboard graph container
    Member:         Muhammad Fahad (C00311349)
    Dependencies:   Requires DBconnection.php for database access
    Security:       Uses prepared statements to prevent SQL injection
    Error Handling: Includes try-catch block for database operations
	Date:			26/03/2025
-->

<?php
include './DBconnection.php';

    try {
         /**
     * Query to calculate total income of the garage
     * Uses COUNT(*) to get the total records in the payment table
     * Prepared statement is used for security against SQL injection
     */
        $payment = $con->prepare("SELECT SUM(Total_Price) AS total_payments FROM `Payment`;");
        $payment->execute();
        $total_payment = $payment->fetch(PDO::FETCH_ASSOC);

        if (isset($total_payment['total_payments'])) {
            $total = $total_payment['total_payments'];
        } else {
            $total = 0 ;
        }
      // formated into 2 decimal places
        $formated = number_format($total,2);

         echo "<h2 class='income'>"."<i class='fa-solid fa-coins  currency'></i>"
         .$formated.
         "</h2>";
    } catch (PDOException $e) {
                // shows error log in case of any error for debugging

        error_log("Database Error: " . $e->getMessage());
        echo "<h2>System error occurred. Please try again.</h2>";
    }