<!-- 
    File:           job type /services Graph Data 
    Purpose:        This file retrieves job type /services provided by garage, 
					data from the database to display in the dashboard graph container
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
     * Query to calculate total job types/ services of the garage
     * Uses COUNT(*) to get the total records in the job type table
     * Prepared statement is used for security against SQL injection
     */
        $job_types = $con->prepare("SELECT COUNT(*) AS total_job_types FROM `Job_Type`;");
        $job_types->execute();
        $total_job_types = $job_types->fetch(PDO::FETCH_ASSOC);

        if (isset($total_job_types['total_job_types'])) {
            $total = $total_job_types['total_job_types'];
        } else {
            $total = 0 ;
        }
         echo "<h2 class='income'>"."<i class='fa-solid fa-toolbox  currency'> </i> "
         .$total.
         "</h2>";
    } catch (PDOException $e) {
                        // shows error log in case of any error for debugging

        error_log("Database Error: " . $e->getMessage());
        echo "<h2>System error occurred. Please try again.</h2>";
    }