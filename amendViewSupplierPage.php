<!-- 
    File:           AddSupplierForm.html
    Purpose:        Form for viewing and updating supplier information
    Member:         Muhammad Fahad (C00311349)
    Functionality:
                   Dynamic supplier selection dropdown via javascrip,AJAX
                   Form auto-population when supplier selected
                   Integrated suppliers list display(suppliersList.php)
          	   	   Form validation (client-side)
                   Responsive design
                   Required field validation
    Dependencies:
           		   ShowSuppliers.css for styling
                   Admindashboard.css (main layout)
                   fetch.php (dynamic dropdown data)
                   amendViewSupplier.php (form processor)
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
    /* Add this to your CSS file */
    select.drop_down_list option {
        color: black !important;
        font-size: 16px !important;
    }
</style>

<body>
    <main class="delete_supplier_main_conatainer">
        <!-- <section class="suppliers_list_section_container"> -->
        <div class="div">
            <div class="form_title">
                <h1>Amend View Supplier</h1>
            </div>
            <form action="./amendViewSupplier.php" method="post" id="form" class="form">
                <!-- Supplier Selection Dropdown -->
                <div class="inputMain">
                    <label for="Supplier">Suppleir List:</label>
                    <select
                        data-amend-supplier-dropdown="Supplier"
                        class="drop_down_list"
                        name="supplier_id"
                        id="Supplier"
                        data_file_link="fetch.php"
                        data_value="Supplier_ID"
                        data_text="Name" required>
                        <option value="">---Select Supplier---</option>
                    </select>
                </div>
                <!-- Supplier ID -->
                <div class="inputMain">
                    <label for="id">Supplier's ID: </label>
                    <input type="text" id="id" placeholder="Supplier's ID" name="supplier_id" readonly>
                </div>
                <!-- Supplier Name -->
                <div class="inputMain">
                    <label for="supplier_name">Supplier's Name: </label>
                    <input type="text" id="supplier_name" placeholder="Enter supplier's name" name="name" required>
                </div>
                <!-- Supplier Email -->
                <div class="inputMain">
                    <label for="supplier_email">Supplier's Email: </label>
                    <input type="email" id="supplier_email" placeholder="Enter supplier's email" name="email" required>
                </div>
                <!-- Supplier Telephone -->
                <div class="inputMain">
                    <label for="supplier_telephone">Supplier's Telephone: </label>
                    <input type="text" id="supplier_telephone" placeholder="Enter supplier's Telephone" name="telephone" required>
                </div>
                <!-- Supplier Address -->
                <div class="inputMain">
                    <label for="supplier_address">Supplier's Address: </label>
                    <input type="text" id="supplier_address" placeholder="Enter supplier's address" name="address" required>
                </div>
                <!-- Website URL -->
                <div class="inputMain">
                    <label for="web_url">Website URL: </label>
                    <input type="url" id="web_url" placeholder="Enter website URL, https://example.com" name="web_url" required>
                </div>
                <!-- Form Buttons -->
                <div class="form_buttons">
                    <input type="reset" value="Cancel" class="formButton">
                    <input type="submit" value="Update Info" class="formButton">
                </div>
                <!-- Success/Error Message -->
                <p id="message"></p>
            </form>
            <?php
            include './suppliersList.php';
            ?>
        </div>
    </main>
</body>

</html>