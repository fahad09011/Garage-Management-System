<!-- 
    File:           stockList.php 
    Description:    This file display the stock items from the databse
                    - Retrieves non-deleted stock items from database
                    - Displays them in a responsive HTML table
                    - Handles empty result set gracefully
    Member:         Adam Dowling (c00298483)
    Dependencies:   Requires DBconnection.php for database access
    -->
    <?php
include 'DBconnection.php';
$sql = "SELECT `Stock_ID`, `Description`, `Stock_Quantity`, `Reorder_Quantity`, `Retail_Price`, `Supplier_ID` FROM `Stock_Item` WHERE `Status` = '0' ; ";
// Execute query and fetch all results as associative array

$result = $con->query($sql);
$row = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="stock_list_container_heading">
    <h2 class="heading">List of Stock Items</h2>
</div>

<div class="stock_table_conatainer">

    <table class="table">
        <tr class="table-column">
            <th>Stock ID</th>
            <th>Stock Name</th>
            <th>Quantity</th>
            <th>Re-Order Quantity</th>
            <th>Price</th>
            <th>Supplier_ID</th>
        </tr>
        <?php
        // Check if any suppliers were found

        if (!empty($row)) {

            foreach ($row  as $rs) {


                echo "
                           <tr class='table_row'>
                               <td>  {$rs['Stock_ID']}  </td>
                               <td>  {$rs['Description']}         </td>
                               <td>  {$rs['Stock_Quantity']}      </td>
                               <td>  {$rs['Reorder_Quantity']}      </td>
                               <td>  {$rs['Retail_Price']}    </td>
                               <td>  {$rs['Supplier_ID']}        </td>
                               
                          </tr> ";
            }
        } else {

            echo "
                        <tr>
                        <td><h2>No Records Available Yet ComeBack later!</h2></td>
                        </tr> 
                             ";
        }

        ?>
    </table>
</div>