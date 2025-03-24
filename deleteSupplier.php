<?php 
include './DBconnection.php' ;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['supplier_id'])) {
                $supplier_id = $_POST['supplier_id'];
                echo"the supplier id is selec".$supplier_id;
        } else {
                echo"please select a supplier";
        }

        try {
                $update_delete_flag = $con->prepare("UPDATE `Supplier` SET  `Delete_Flag`='1' WHERE `Supplier_ID` =:id ;");
$update_delete_flag->bindParam(':id', $supplier_id);

if ($update_delete_flag->execute()) {
        // header("location:AdminDashboard.php");
        echo "<h2>Supplier is deleted successfully.</h2>";
    }
    else{
        echo"Error during deleting supplier!";
        error_log("Database Error: ".print_r($update->errorInfo(),true));
    }
} catch (PDOException $e) {
    error_log("Database Error: ".$e->getMessage());

}
}

?>