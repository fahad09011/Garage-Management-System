<?php
include './DBconnection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jobTypeName = trim($_POST['Job_Type_Name']);
    $description = trim($_POST['Description']);
    $price = trim($_POST['Price']);
    $leadMechanicID = $_POST['Lead_Mechanic_ID'];

    try {
        // Generate a new unique Job_Type_ID if it's not auto-increment
        $newJobTypeID = null;
        $stmt = $con->query("SELECT MAX(`Job_Type_ID`) AS maxID FROM `Job Type`");
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row && $row['maxID']) {
            $newJobTypeID = $row['maxID'] + 1;
        } else {
            $newJobTypeID = 1;
        }

        // Prepare SQL statement
        $insert = $con->prepare("INSERT INTO `Job Type` (`Job_Type_ID`, `Job_Type_Name`, `Description`, `Price`, `Lead_Mechanic_ID`)
            VALUES (:Job_Type_ID, :Job_Type_Name, :Description, :Price, :Lead_Mechanic_ID)");

        // Bind parameters
        $insert->bindParam(':Job_Type_ID', $newJobTypeID, PDO::PARAM_INT);
        $insert->bindParam(':Job_Type_Name', $jobTypeName, PDO::PARAM_STR);
        $insert->bindParam(':Description', $description, PDO::PARAM_STR);
        $insert->bindParam(':Price', $price, PDO::PARAM_STR);
        $insert->bindParam(':Lead_Mechanic_ID', $leadMechanicID, PDO::PARAM_INT);

        // Execute the query
        if ($insert->execute()) {
            echo "<h2>Job Type added successfully.</h2>";
            echo "<p>Unique Job Type ID: <strong>" . htmlspecialchars($newJobTypeID) . "</strong></p>";
        } else {
            echo "<h2>Error: Could not insert the record.</h2>";
            error_log("Database Error: " . print_r($insert->errorInfo(), true));
        }
    } catch (PDOException $e) {
        echo "<h2>Database error occurred.</h2>";
        error_log("Database error: " . $e->getMessage());
    }
}
?>