<?php

include './DBconnection.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['stock_id'])) {
                $stock_id = $_POST['stock_id'];
                 echo "the stock id is selec" . $stock_id;
                try {
                        // Stock quantity checking
                        $check_stock_quantity = $con->prepare("SELECT COUNT(*) FROM `Stock_Item` WHERE `Stock_ID` =:id AND `Stock_Quantity` = 0;");
                        $check_stock_quantity->bindParam(':id',$stock_id);
                        $check_stock_quantity->execute();
                        $stock_quantity = $check_stock_quantity->fetchColumn();


                        //Re-order Quantity checking
                        $check_reorder_quantity = $con->prepare("SELECT COUNT(*) FROM `Stock_Item` WHERE `Stock_ID` =:id AND `Reorder_Quantity` = 0;");
                        $check_reorder_quantity->bindParam(':id', $stock_id);
                        $check_reorder_quantity->execute();
                        $reorder_quantity = $check_reorder_quantity->fetchColumn();

                        if ($stock_quantity > 0) {
                                echo "<h2>Cannot delete Stock Item. As Item is in Stock.</h2>";
                            } 
                            elseif ($reorder_quantity > 0) {
                                echo "<h2>Cannot delete Stock Item. As Item is on order.</h2>";
                            }
                             else {
                                // update delete flag status 
                                $update_delete_flag = $con->prepare("UPDATE `Stock_Item` SET `Status`='1' WHERE `Stock_ID` =:id ;");
                                $update_delete_flag->bindParam(':id', $stock_id);



                                if ($update_delete_flag->execute()) {
                                        // header("location:AdminDashboard.php");
                                        echo "<h2>Stock Item is deleted successfully.</h2>";
                                } else {
                                        echo "Error during deleting Stock Item.";
                                        error_log("Database Error: " . print_r($update_delete_flag->errorInfo(), true));
                                }
                        }
                } catch (PDOException $e) {
                        error_log("Database Error: " . $e->getMessage());
                }
        }
} else {
        echo "please select a Stock Item";
}
