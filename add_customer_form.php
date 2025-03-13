<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Customer | GMS</title>
    <link rel="stylesheet" href="./css/ShowCustomer.css">
</head>
<body>
    <main class="main_form_container">
        <form action="add_customer.php" method="post" id="form" class="form">
            <div class="form_title">
                <h1>Add Customer</h1>
            </div>
            
            <!-- Name -->
            <label for="customer_name">Customer's Name:  </label>
            <input type="text" id="customer_name" placeholder="Enter customer's name" name="name" required>

            <!-- Email -->
            <label for="customer_email">Customer's Email:  </label>
            <input type="email" id="customer_email" placeholder="Enter customer's email" name="email" required>

            <!-- Telephone -->
            <label for="customer_telephone">Customer's Telephone:  </label>
            <input type="text" id="customer_telephone" placeholder="Enter customer's telephone" name="telephone">

            <!-- Address -->
            <label for="customer_address">Customer's Address:  </label>
            <input type="text" id="customer_address" placeholder="Enter customer's address" name="address">

            <!-- Form Buttons -->
            <div class="form_buttons">
                <input type="reset" value="Cancel">
                <input type="submit" value="Add Customer">
            </div>
        </form>
    </main>
</body>
</html>
