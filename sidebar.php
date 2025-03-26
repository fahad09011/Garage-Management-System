<!-- 
    File:           dashboard_sidebar.php
    Purpose:        Main navigation sidebar for AutoSphere dashboard
    Features:
                    > Brand logo/name header
                    > Collapsible menu system with icons
                    > 7 main menus  with submenus
                    > All the Sub-menu are display via JavaScript by targeting their customize attribute calles *file-link*
                    > Expandable submenus for each category
    Dependencies:
                    > Font Awesome for icons
                    > CSS for styling
                    > JavaScript for dynamic loading
    Created By:       Muhammad Fahad (c00311349)
    Group Members :
                    c00298483 Adam Dowling
                    C00295140 Taemour Basharat
                    C00311349 Muhammad Fahad
                    C00297032 Emoshoke Saliu
                    C00290944 Gleb Tutubalin  
      Date:			26/03/2025
-->


<aside class="dashboard_sidebar">
        <!-- Branding Section -->
    <div class="logo_name_Container">
        <i class="fa-solid fa-screwdriver-wrench logo"></i>
        <h1 class="name">AutoSphere</h1>
    </div>

    <!-- Main Navigation -->
    <nav class="dashboard_navbar">
        <ul class="main_menu_continer">

            <li>
                <a href="#" class="main_menu">
                    <i class="fa-solid fa-chart-line icon"></i>Dashboard
                </a>
            </li>

            <li>
                <a href="#" class="main_menu">
                    <i class="fa-regular fa-calendar-days icon"></i>
                    Booking Menu</a>
                <ul class="submenu">
                    <li>
                        <a href="#" file-link="AddNewBookingForm.php" class="load-file" >Make a Booking</a>
                    </li>
                    <li>
                        <a href="#" file-link="" class="load-file" >Cancel a Booking</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#" class="main_menu">
                    <i class="fa-solid fa-screwdriver-wrench icon"></i>
                    Jobs Menu
                </a>

                <ul class="submenu">
                    <li>
                        <a href="#" file-link="Commence_Job_Form.php" class="load-file" >Commencment/Start of Job</a>
                    </li>
                    <li>
                        <a href="#" file-link="completeJobForm.php" class="load-file" >Completion of Job</a>
                    </li>
                    <li>
                        <a href="#" file-link="" class="load-file" >Payment for Job</a>
                    </li>
                </ul>
            </li>



            <li>
                <a href="#" class="main_menu">
                    <i class="fa-solid fa-dolly icon"></i>
                    Stock Control Menu
                </a>
                <ul class="submenu">
                    <li>
                        <a href="#" file-link="reorderStockForm.php" class="load-file" >Re-order Stock</a>
                    </li>
                    <li>
                        <a href="#" file-link="" class="load-file" >Recive Deliveries</a>
                    </li>
                </ul>
            </li>


            <li>
                <a href="#" class="main_menu">
                    <i class="fa-solid fa-truck-field icon"></i>
                    Supplier Accounts Menu
                </a>
                <ul class="submenu">
                    <li>
                        <a href="#" file-link="newInvoicesForm.php" class="load-file" >New Invoices from Suppliers</a>
                    </li>
                    <li>
                        <a href="#" file-link="paymentForm.php" class="load-file" >Payment to Suppliers</a>
                    </li>
                </ul>
            </li>


            <li>
                <a href="#" class="main_menu">
                    <i class="fa-solid fa-file-pen icon"></i>
                    File Maintenance Menu
                </a>
                <ul class="submenu">
                    <li>
                        <a href="#" file-link="add_customer_form.php" class="load-file" >Add a New Customer</a>
                    </li>

                    <li>
                        <a href="#" file-link="delete_customer_form.php" class="load-file" >Delete a Customer</a>
                    </li>

                    <li>
                        <a href="#" file-link="amend_customer_form.php" class="load-file" >Amend / View a Customer</a>
                    </li>

                    <li>
                        <a href="#" file-link="AddSupplierForm.php" class="load-file" >Add a New Supplier</a>
                    </li>

                    <li>
                        <a href="#" file-link="deleteSupplierPage.php" class="load-file" >Delete a Supplier</a>
                    </li>

                    <li>
                        <a href="#" file-link="amendViewSupplierPage.php" class="load-file" >Amend / View a Supplier</a>
                    </li>

                    <li>
                        <a href="#" file-link="AddNewStockForm.php" class="load-file" >Add a New Stock Item</a>
                    </li>

                    <li>
                        <a href="#" file-link="DeleteStockPage.php" class="load-file" >Delete a Stock Item</a>
                    </li>

                    <li>
                        <a href="#" file-link="AmendViewStockPage.php" class="load-file" >Amend / View a Stock Item</a>
                    </li>

                    <li>
                        <a href="#" file-link="addJobTypeForm.php" class="load-file" >Add a New Job Type</a>
                    </li>

                    <li>
                        <a href="#" file-link="DeleteJobTypePage.php" class="load-file" >Delete a Job Type</a>
                    </li>

                    <li>
                        <a href="#" file-link="AmendJobTypeForm.php" class="load-file" >Amend / View a Job Type</a>
                    </li>
                </ul>
            </li>


            <li>
                <a href="#" class="main_menu">
                    <i class="fa-solid fa-square-poll-vertical icon"></i>
                    Reports Menu
                </a>
                <ul class="submenu">
                    <li>
                        <a href="#" file-link="" class="load-file" >Stock Status Report</a>
                    </li>

                    <li>
                        <a href="#" file-link="" class="load-file" >Jobs Report</a>
                    </li>

                    <li>
                        <a href="#" file-link="unpaidInvoicesReport.php" class="load-file" >Unpaid Invoices Report</a>
                    </li>
                </ul>
            </li>


            <li>
                <a href="#" class="main_menu">
                    <i class="fa-solid fa-person-walking-arrow-right icon"></i>
                    Exit
                </a>
            </li>
        </ul>
    </nav>
</aside>