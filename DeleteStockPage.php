
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
    select.drop_down_list option {
        color: black !important;
        font-size: 16px !important;
    }
</style>

<body>
    <main class="delete_supplier_main_conatainer">


        <section class="suppliers_list_section_container">


            <!-- delete supplier page pr hi form add krdo or initialy form empty rahe ga , jb supplier select hoga to form uski details se fill ho jae ga or usi form pe delete button hoga supplier deleten krne le liye -->
            <form action="./deleteStock.php" method="post" id="form">



            <!-- $sql = "SELECT `Stock_ID`, `Description`, `Stock_Quantity`, `Retail_Price`, `Supplier_ID` FROM `Stock_Item` WHERE `Status` = '0';"; -->


                <section class="header_section">
                    <header class="delete_stockheader">
                        <ul>
                            <li>
                                <label for="Stock_Item">Stock Items List List:</label>
                                <select

                                    class="drop_down_list"
                                    name="stock_id"

                                    id="Stock_Item"
                                    data_file_link="fetch.php"
                                    data_value="Stock_ID"
                                    data_text="Description">
                                    <option value="">---Select Supplier---</option>
                                </select>
                            </li>
                            <li><input type="submit" value="Delete Stock Item"></li>
                        </ul>
                        
                <!-- Success/Error Message -->
                <p id="message"></p>
                    </header>
                </section>

                <?php
include './stockList.php' ;
?>
            </form>




            
        </section>

    </main>
</body>

</html>