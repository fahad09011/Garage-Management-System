
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

                <section class="header_section">
                    
                    
                </section>
            <!-- </form> -->




            <!--  -->
            <form action="./amendViewSupplier.php" method="post" id="form" class="form">
            
            <label for="Supplier">Suppleir List:</label>
                                <select
                                data-amend-supplier-dropdown="Supplier" 
                                    class="drop_down_list"
                                    name="supplier_id"

                                    id="Supplier"
                                    data_file_link="fetch.php"
                                    data_value="Supplier_ID"
                                    data_text="Name">>
                                    <option value="">---Select Supplier---</option>
                                </select>
            







                <!-- Supplier ID -->
                <div class="inputMain">
                    <label for="id">Supplier's ID: </label>
                    <input type="text" id="id" placeholder="Supplier's ID" name="supplier_id"  readonly>
                </div>

                <!-- Supplier Name -->
                <div class="inputMain">
                    <label for="supplier_name">Supplier's Name: </label>
                    <input type="text" id="supplier_name" placeholder="Enter supplier's name" name="name" >
                </div>

                <!-- Supplier Email -->
                <div class="inputMain">
                    <label for="supplier_email">Supplier's Email: </label>
                    <input type="email" id="supplier_email" placeholder="Enter supplier's email" name="email" >
                </div>

                <!-- Supplier Telephone -->
                <div class="inputMain">
                    <label for="supplier_telephone">Supplier's Telephone: </label>
                    <input type="text" id="supplier_telephone" placeholder="Enter supplier's Telephone" name="telephone" >
                </div>

                <!-- Supplier Address -->
                <div class="inputMain">
                    <label for="supplier_address">Supplier's Address: </label>
                    <input type="text" id="supplier_address" placeholder="Enter supplier's address" name="address" >
                </div>

                <!-- Website URL -->
                <div class="inputMain">
                    <label for="web_url">Website URL: </label>
                    <input type="url" id="web_url" placeholder="Enter website URL, https://example.com" name="web_url" >
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
include './suppliersList.php' ;
?>


            
        </section>

    </main>
</body>

</html>