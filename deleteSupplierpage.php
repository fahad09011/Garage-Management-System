<?php
include './deleteSupplier.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Supplier</title>
    <link rel="stylesheet" href="./Assets/css/Admindashboard.css">
    <link rel="stylesheet" href="./Assets/css/ShowSuppliers.css">
</head>
<style>
    /* Add this to your CSS file */
    select.drop_down_list option {
        color: black !important;
        font-size: 16px !important;
    }
</style>

<body>
    <main class="delete_supplier_main_conatainer">
        

        <section class="suppliers_list_section_container">


<!-- delete supplier page pr hi form add krdo or initialy form empty rahe ga , jb supplier select hoga to form uski details se fill ho jae ga or usi form pe delete button hoga supplier deleten krne le liye -->



        <form action="./fetchDeleteSupplier.php" method="post">




        <section class="header_section">
            <header class="delete_supplierheader">
                <ul>
                    <li>
                        <label for="Supplier">Suppleir List:</label>
                        <select

                            class="drop_down_list"
                            name="supplier_id"

                            id="Supplier"
                            data_file_link="fetch.php"
                            data_value="Supplier_ID"
                            data_text="Name">>
                            <option value="">---Select Supplier---</option>
                        </select>
                    </li>
                    <li><a href="./deletSupplierForm.php">Delete Supplier</a></li>
                </ul>
            </header>
        </section>


        
        </form>





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
                    if (!empty($row)) {
                        
                    foreach ($row  as $rs) {


                        echo "
                           <tr class='table_row'>
                               <td>  {$rs['Supplier_ID']}  </td>
                               <td>  {$rs['Name']}         </td>
                               <td>  {$rs['Address']}      </td>
                               <td>  {$rs['Telephone']}    </td>
                               <td>  {$rs['Email']}        </td>
                          </tr> ";
                    }
                    } else {
                        
                        echo"
                        <tr>
                        <td><h2>No Records Available Yet ComeBack later!</h2></td>
                        </tr> 
                             ";
                    }
                    
                    ?>
                </table>
            </div>

        </section>

    </main>
</body>

</html>