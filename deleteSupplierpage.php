<!-- 
    File:           deleteSupplierPage.html
    Purpose:        Form for selecting and deleting supplier records
    Member:         Muhammad Fahad (C00311349)
    Functionality:
                   Dynamic supplier dropdown list
          	   	   Delete confirmation workflow
                   Responsive design
                   Required field validation
                   Form validation
                   Integrated with suppliers list display
    Dependencies:
           		   ShowSuppliers.css for styling
                   Admindashboard.css (main layout)
                   fetch.php (dynamic dropdown data)
                   deleteSupplier.php (form processor)
                   suppliersList.php (supplier table display)
          		   Admin_dasboard.JS for form validarion
	Date:		   26/03/2025
-->
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
    <main class="main_form_container">
        <section class="div">
            <div class="form_title">
                <h1>Delete Suppiler</h1>
            </div>
            <form action="./deleteSupplier.php" method="post" id="form" class="form bookingform">
                <!-- <section class="header_section"> -->
                    <!-- <header class="delete_supplierheader"> -->
                        <div class="form_title supplier_delete_list_container">
                            <div class="sup_list">
                                <label for="Supplier">Supplier List:</label>
                                <select
                                    class="drop_down_list"
                                    name="supplier_id"
                                    id="Supplier"
                                    data_file_link="fetch.php"
                                    data_value="Supplier_ID"
                                    data_text="Name">
                                    <option value="">---Select Supplier---</option>
                                </select>
                            </div>
                            <div class="sup_but">
                                <input class="formButton" type="submit" value="Delete Supplier">
                            </div>
                        </div>
                        <!-- Success/Error Message -->
                        <p id="message"></p>
                    <!-- </header> -->
                <!-- </section> -->
                <?php
                include './suppliersList.php';
                ?>
            </form>
        </section>
    </main>
</body>
</html>