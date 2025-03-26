<!-- 
    File:           Booking Graph Data 
    Purpose:        This file retrieves booking data from the database to display in 
					the dashboard graph container
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
     * Query to calculate total number of bookings in the system
     * Uses COUNT(*) to get the total records in the Booking table
     * Prepared statement is used for security against SQL injection
     */
        $booking = $con->prepare("SELECT COUNT(*) AS total_bookings FROM `Booking`;");
        $booking->execute();
        $total_booking = $booking->fetch(PDO::FETCH_ASSOC);

        if (isset($total_booking['total_bookings'])) {
            $total = $total_booking['total_bookings'];
        } else {
            $total = 0 ;
        }
         echo "<h2 class='income'>"."<i class='fa-solid fa-users  currency'> </i> "
         .$total.
         "</h2>";
    } catch (PDOException $e) {
        // shows error log in case of any error for debugging
        error_log("Database Error: " . $e->getMessage());
        echo "<h2>System error occurred. Please try again.</h2>";
    }