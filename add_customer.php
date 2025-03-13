<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $address = $_POST['address'];
    
    try {
        $insert = $con->prepare("INSERT INTO `Customer`(`name`, `address`, `telephone`, `E-Mail`) 
                                 VALUES (:name, :address, :telephone, :email)");

        $insert->bindParam(':name', $name);
        $insert->bindParam(':address', $address);
        $insert->bindParam(':telephone', $telephone);
        $insert->bindParam(':email', $email);

        if ($insert->execute()) {
            echo "<h2>Customer added successfully.</h2>";
        } else {
            echo "Error occurred during inserting data to database.";
            error_log("Database Error: " . print_r($insert->errorInfo(), true));
        }
    } catch (PDOException $e) {
        echo("Database error: " . $e->getMessage());
        error_log("Database error: " . $e->getMessage());
    }
}
?>