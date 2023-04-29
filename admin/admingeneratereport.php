<?php include("../linkDB.php"); //database connection function 
// Check if the form was submitted
if (isset($_POST['generate_report'])) {

    // Get the user inputs from the form
    $report_type = $_POST['report_type'];
    $month = $_POST['month'];


if ($report_type == 'equipment_rental') {
    $sql = "SELECT itemname, SUM(rental) AS total_rental FROM equipment_rental WHERE MONTH(date) = $month ";
    $result = mysqli_query($linkDB, $sql);

    
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[$row['itemname']] = $row['total_rental'];
    }
// } else {
//     // Set the code for the other report types here
// }
}
}

?>




<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Stadia </title>

    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include('../include/javascript.php'); ?>
    <?php include('../include/styles.php'); ?>

</head>

<body onload="initClock()">

    <div class="sidebar">

        <?php include('../include/adminsidebar.php'); ?>

    </div>

    <section class="home-section">

        <nav>

            <?php include('../include/adminnavbar.php'); ?>

        </nav>

        <div class="home-content">
            <div class="main-content">
            
                <div class="report-generator">
                <h1>Generate Reports</h1>
                    <form  method="post" >
                        <label for="report-type">Select report type:</label>
                        <select id="report-type" name="report_type">
                            <option value="monthly_revenue">Monthly Revenue Report</option>
                            <option value="equipment_rental">Equipment Rental Report</option>
                            <option value="refreshment_sales">Refreshment Sales Report</option>
                            <option value="payment">Salary Payment Report</option>
                        </select>
                        <label for="month">Select month:</label>
                        <select id="month" name="month">
                            <option value="1">January</option>
                            <option value="2">February</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                        <button class="btn-new" type="submit" name="generate_report">Generate Report</button>
                    </form>
                </div>

            </div>
        </div>
        <canvas id="myChart"></canvas>
        <script>
        // Retrieve the data from PHP
        var data = <?php echo json_encode($data); ?>;

        // Create the chart
        var ctx = document.createElement('canvas');
        ctx.id = 'myChart';
        document.body.appendChild(ctx);

        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: Object.keys(data),
                datasets: [{
                    label: 'Equipment Rental',
                    data: Object.values(data),
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
        <footer>
            <div class="foot">
                <span>Created By <a href="#">Stadia.</a> | &#169; 2023 All Rights Reserved</span>
            </div>
        </footer>

    </section>
    

</body>

</html>

<script>
    /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;

    for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function () {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "block";
            }
        });
    }
</script>


  




