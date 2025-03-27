<!-- 
    File:           DBconnection.ph
    Purpose:        contain the databse connectivity
    Created By:       Muhammad Fahad (c00311349)
    Group Members :
                    c00298483 Adam Dowling
                    C00295140 Taemour Basharat
                    C00311349 Muhammad Fahad
                    C00297032 Emoshoke Saliu
                    C00290944 Gleb Tutubalin  
      Date:			26/03/2025
-->
<!-- header -->
<?php
$hostName = "localhost";
$userName="garageuser";
$password="garageUserPass4";
$dbName="garage_system";
try {
    // PDO > PHP data object
    // create new pdo object to create connection with database
    $con = new PDO("mysql:host=$hostName;dbname=$dbName;charset=utf8",$userName, $password);
    // set PDO to throw exception on errors
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
catch (PDOException $e) {
    die("Databse connection failed.: ".$e->getMessage());
}
?>