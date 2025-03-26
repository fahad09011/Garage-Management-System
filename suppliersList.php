<!-- 
    File:           SupplierList.php 
    Description:    This file display the active suppliers from the databse
                    - Retrieves non-deleted suppliers from database
                    - Displays them in a responsive HTML table
                    - Handles empty result set gracefully
    Member:         Muhammad Fahad (C00311349)
    Dependencies:   Requires DBconnection.php for database access
	Date:			26/03/2025
    -->
    <?php
include 'DBconnection.php';
$sql = "SELECT `Supplier_ID`, `Name`, `Address`, `Telephone`, `Email`, `web_url` FROM `Supplier` WHERE `Delete_Flag` = '0' ;";
// Execute query and fetch all results as associative array
$result = $con->query($sql);
$row = $result->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="suppliers_list_container_heading">
    <h2 class="heading">List of Active Suppliers</h2>
</div>
<div class="supplier_table_conatainer">
    <table class="table">
        <tr class="table-column">
            <th>Supplier ID</th>
            <th>Supplier Name</th>
            <th>Address</th>
            <th>Telephone</th>
            <th>Email Address</th>
            <th>Website Address</th>
        </tr>
        <?php
        // Check if any suppliers were found
        if (!empty($row)) {
            foreach ($row  as $rs) {
                echo "
                           <tr class='table_row'>
                               <td>  {$rs['Supplier_ID']}  </td>
                               <td>  {$rs['Name']}         </td>
                               <td>  {$rs['Address']}      </td>
                               <td>  {$rs['Telephone']}    </td>
                               <td>  {$rs['Email']}        </td>
                               <td>  {$rs['web_url']}        </td>
                          </tr> ";
            }
        } else {
            echo "
                        <tr>
                        <td><h2>No Active Suppliers Found!</h2></td>
                        </tr> 
                             ";
        }
        ?>
    </table>
</div>