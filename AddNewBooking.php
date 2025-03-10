<?php 
include 'DBconnection.php';
// include 'fetch_customer.php' ;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $model = $_POST['vehicle_model'];

    $customer_id = $_POST['customer_id'];
    // $job_type_id = $_POST['job_type_id'];
    $vehicle_model = $_POST['vehicle_model'];
    $registration_num = $_POST['registration_num'];
    $mile_age = $_POST['mile_age'];
    $form_date =date("y-m-d");
    $booking_date = $_POST['booking_date'];
    $details = $_POST['details'];

    try {
        $insert = $con->prepare("INSERT INTO `Booking`(`Customer_ID`, `Model`, `Registration_Number`, `Mileage`, `Details`, `Origin_Date`, `Booking_Date`) 
        VALUES (:customer_id, :vehicle_model, :registration_num, :mile_age, :details, :form_date, :booking_date) ");
        
        $insert->bindParam(':customer_id',$customer_id);
        $insert->bindParam(':vehicle_model',$vehicle_model);
        $insert->bindParam(':registration_num',$registration_num);
        $insert->bindParam(':mile_age',$mile_age);
        $insert->bindParam(':details',$details);
        $insert->bindParam(':form_date',$form_date);
        $insert->bindParam(':booking_date',$booking_date);

        if ($insert->execute()) {
            echo "<h2>Data is inseeted to database successfully.</h2>";
        }
        else{
            echo"Error during inserting data into Database!";
            error_log("Databse Error: ".print_r($insert->errorInfo(),true));
        }
    } catch (PDOException $e) {
        error_log("Databse Error: ".$e->getMessage());

    }
}

?>