<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Supplier|GMS</title>
    <link rel="stylesheet" href="./Assets/css/ShowSuppliers.css">
</head>
<body>
    <main class="main_form_container">
        <form action="AddSupplier.php" method="post" id="form" class="form">
<div class="form_title">
    <h1>Add Suppiler</h1>
</div>
<!-- name -->
            <label for="supplier_name">Supplier's Name:  </label>
            <input type="text" id="supplier_name" placeholder="Enter supplier's name"  name="name" required>

            <!-- Email -->
            <label for="supplier_email">Supplier's Email:  </label>
            <input type="email" id="supplier_email" placeholder="Enter supplier's email" name="email" required>

            <!--  telephone-->
            <label for="supplier_telephone">Supplier's Telephone:  </label>
            <input type="text" id="supplier_telephone" placeholder="Enter supplier's Telephone" name="telephone">

            <!-- Address -->
            <label for="supplier_address">Supplier's Address:  </label>
            <input type="text" id="supplier_address" placeholder="Enter supplier's address" name="address">

            <!-- Form Buttons -->
            <div class="form_buttons">
            <input type="reset" value="Cancel">
            <input type="submit" value="Add Supplier">
            </div>
        </form>
    </main>
</body>
</html>