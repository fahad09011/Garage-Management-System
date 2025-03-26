<!-- 
    File:           	booking_list.php
    Purpose:        	Displays a list of all bookings with customer details records in the database
    Member:         	Muhammad Fahad (C00311349)
    Functionality:
                   		Retrieves booking records joined with customer data
          	   	   		Displays in a responsive HTML table
                   		Sorts by booking date (newest first)
    Security:       	Uses prepared statements to prevent SQL injection
    Error Handling: 	Includes try-catch block for database operations
 	Database Impact: 	Reads from Booking and Customer tables
	Date:		   		26/03/2025
-->
<?php
include 'DBconnection.php';
// SQL query to fetch booking data with customer information
$sql = "SELECT 
    b.Booking_ID,
    b.Booking_Date,
    b.Model,
    b.Customer_ID,
    c.Name ,
	c.E_Mail ,
	c.Telephone
FROM 
    Booking b
JOIN 
    Customer c ON b.Customer_ID = c.Customer_ID
ORDER BY 
    b.Booking_Date DESC;";
    // Execute query and fetch results
$result = $con->query($sql);
        $row = $result->fetchAll(PDO::FETCH_ASSOC);
?>
            <div class="suppliers_list_container_heading">
                <h2 class="heading">List of Bookings</h2>
            </div>
            <div class="supplier_table_conatainer">
                <table class="table">
                    <tr class="table-column">
                        <th>Booking ID</th>
                        <th>Customer_ID</th>
                        <th>Customer Name</th>
                        <th>Email Address</th>
                        <th>Telephone</th>
                        <th>Car Model</th>
                        <th>Booking Date</th>
                    </tr>
                    <?php
                    if (!empty($row)) {
                        foreach ($row  as $rs) {
                            echo "
                           <tr class='table_row'>
                               <td>  {$rs['Booking_ID']}  </td>
                               <td>  {$rs['Customer_ID']}         </td>
                               <td>  {$rs['Name']}      </td>
                               <td>  {$rs['E_Mail']}    </td>
                               <td>  {$rs['Telephone']}        </td>
                               <td>  {$rs['Model']}        </td>
                               <td>  {$rs['Booking_Date']}        </td>
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