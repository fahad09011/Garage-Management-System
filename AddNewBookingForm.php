<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Supplier|GMS</title>
    <link rel="stylesheet" href="./Assets/css/ShowSuppliers.css">
    <style>
        /* Add this to your CSS file */
        select.drop_down_list option {
            color: black !important;
            font-size: 16px !important;
        }
    </style>
</head>

<body>
    <main class="main_form_container">
        <div class="div">
            <div class="form_title">
                <h1>Add New Booking</h1>
            </div>
            <form action="AddNewBooking.php" method="post" id="form" class="bookingform form">


                <!-- DropDown For customer -->
                <div class="inputMain">
                    <label for="Customer">Customer:</label>
                    <select

                        class="drop_down_list"
                        name="customer_id"

                        id="Customer"
                        data_file_link="fetch.php"
                        data_value="Customer_ID"
                        data_text="Name">>
                        <option value="">---Select Customer---</option>
                    </select>
                </div>

                <!-- Model -->
                <div class="inputMain">
                    <label for="vehicle_model">Vehicle Model:</label>
                    <input type="text" id="vehicle_model" placeholder="Enter vehicle model" name="vehicle_model" required>
                </div>


                <!-- Registration  number -->
                <div class="inputMain">
                    <label for="reg_num">Registation Number: </label>
                    <input type="text" id="reg_num" placeholder="Enter Registration Number" name="registration_num" required>
                </div>

                <!--  Mileage-->
                <div class="inputMain">
                    <label for="mile_age">Current MileAge: </label>
                    <input type="text" id="mile_age" placeholder="Enter Vehicle's Mileage" name="mile_age">
                </div>

                <!--  Booking Date-->
                <div class="inputMain">
                    <label for="booking_date">Booking Date: </label>
                    <input type="date" id="booking_date" name="booking_date">
                </div>

                <!--  Status-->
                <!-- 0==active
                  1==complete
                  2==delete -->


                <!-- Deatils -->
                <div class="inputMain">
                    <label for="supplier_address">Details: </label>
                    <textarea type="text" id="supplier_address" placeholder="Enter Details of booking" name="details"></textarea>
                </div>

                <!-- Form Buttons -->
                <div class="form_buttons">
                    <input type="reset" value="Cancel" class="formButton">
                    <input type="submit" value="Add Booking" class="formButton">
                </div>
                <!-- success /error message will show here -->
                <p id="message"></p>
            </form>
        </div>
    </main>

</body>

</html>