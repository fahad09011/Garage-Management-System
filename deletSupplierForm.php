<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Supplier|GMS</title>
    <link rel="stylesheet" href="./Assets/css/ShowSuppliers.css">
</head>

<body>
    
    <main class="main_form_container">
        <div class="div">
        <div class="form_title">
            <h1>Delete Suppiler</h1>
        </div>
        <form action="deleteSupplier.php" method="post" id="form" class="form">


        <!-- id -->
        <div class="inputMain">
            <label for="supplier_id">Supplier's ID: </label>
            <input type="text" id="supplier_id" placeholder="Supplier's ID" name="id" readonly>
            </div>

            <!-- name -->
             <div class="inputMain">
            <label for="supplier_name">Supplier's Name: </label>
            <input type="text" id="supplier_name" placeholder="Supplier's name" name="name" readonly>
            </div>


            <!-- Email -->
             <div class="inputMain">
            <label for="supplier_email">Supplier's Email: </label>
            <input type="email" id="supplier_email" placeholder="Supplier's email" name="email" readonly>
            </div>

            <!--  telephone-->
              <div class="inputMain">
            <label for="supplier_telephone">Supplier's Telephone: </label>
            <input type="text" id="supplier_telephone" placeholder="Supplier's Telephone" name="telephone" readonly>
            </div>

            <!-- Address -->
             <div class="inputMain">
            <label for="supplier_address">Supplier's Address: </label>
            <input type="text" id="supplier_address" placeholder="Supplier's address" name="address" readonly>
            </div>
            <!-- Form Buttons -->
            <div class="form_buttons">
                <input type="reset" value="Cancel" class="formButton">
                <input type="submit" value="Delete Supplier" class="formButton">
            </div>
            <!-- success /error message will show here -->
            <p id="message"></p>
        </form>
        </div>
    </main>
    <script src="./Assets/js/supplierFormValidation.js"></script>

</body>

</html>