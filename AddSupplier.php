<?php
include './DBconnection.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $address = $_POST['address'];
try {
    
    $insert = $con->prepare("INSERT INTO `Supplier`(`Name`, `Address`, `Telephone`, `Email`) 
    VALUES (:name, :address, :telephone, :email )");

    $insert->bindParam(':name', $name);
    $insert->bindParam(':address', $address);
    $insert->bindParam(':telephone', $telephone);
    $insert->bindParam(':email', $email);


    if($insert->execute())
        {
        echo "<h2>Data is inseeted to database successfully.</h2>";

        }
    else
        {
        echo "error occur during inserting data to database.";
        error_log("Dtabase Error: ".print_r($insert->errorInfo(),true));
        }

} 
    catch (PDOException $e) 
        {
        echo("Databse error: ".$e->getMessage());
        error_log("database error: ".$e->getMessage());
    }
}
?>


