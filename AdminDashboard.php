<!-- 
        File:           admin_dashboard.html
        Purpose:        Main administrative interface for Garage Management System
        Features:
                        Three key metric graphs (income, bookings, services)
                        Recent bookings list
                        Dynamic form display area
                        Responsive layout with sidebar navigation
        Student:        Muhammad Fahad (C00311349)
        Date:           26/03/2025
        Dependencies:
                       Admindashboard.css (main layout)
                       sidebar.css (navigation styling)
                       Syncfusion EJ2 (graphing library)
                       Multiple PHP data files
                       JavaScript for dynamic behavior
    -->
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GMS|Admin Dashboard</title>
    <link rel="stylesheet" href="./Assets/css/Admindashboard.css" />
    <link rel="stylesheet" href="./Assets/css/sidebar.css">
    <script src="https://kit.fontawesome.com/0cd0283581.js" crossorigin="anonymous"></script>
    <script src="https://cdn.syncfusion.com/ej2/dist/ej2.min.js" type="text/javascript"></script>
</head>
<body>
    <!-- main container with display grip to handle the layout of page -->
    <main class="main_container">
        <?php include 'header.php';
        ?>
        <?php include 'sidebar.php';
        ?>
        <!-- main dashboard content -->
        <main class="admin_dashboard_main">
            <!-- dashboard section -->
            <section class="dashboard_content_Section" id="dashboard_content">
                <div class="dashboard_main_container">
                    <!-- weekly booking income container -->
                    <div class="top_dashboard">
                        <!-- income -->
                        <div class="graph_container gc1">
                            <div class="income_status">
                                <div class="income_status_sub_container">
                                    <?php
                                    include './Assets/graph_data/incomeGraphData.php'
                                    ?>
                                    <p>Total gross income</p>
                                </div>
                          <div id="graph_container1"></div>
                            </div>
                        </div>
                        <!-- customer  -->
                        <div class="graph_container gc2">
                            <div class="income_status">
                                <div class="income_status_sub_container">
                                <?php
                                    include './Assets/graph_data/bookingGraphData.php'
                                    ?><p>Total Garage Bookings</p>
                                </div>
                                <div id="graph_container2"></div>
                            </div>
                        </div>
                        <!-- income -->
                        <div class="graph_container gc3">
                            <div class="income_status">
                                <div class="income_status_sub_container">
                                <?php
                                    include './Assets/graph_data/jobTypeGraphData.php'
                                    ?><p> All maintenance services</p>
                                </div>                                 
                                <div id="graph_container3"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <main class="recent_booking_main_conatiner">
                    <section class="recent_booking_section_container">
                <?php include './bookingList.php'; ?>
                    </section>
                </main>
            </section>
            <!-- suppiler form container here we will show form dynamically -->
            <div id="dynamicDisplayForms"></div>
        </main>
    </main>
    <script src="./Assets/js/side_bar.js"></script>
    <script src="./Assets/js/admin_dashboard.js"></script>
</body>

</html>