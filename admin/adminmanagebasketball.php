<?php include("../linkDB.php"); //database connection function ?>


<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Stadia </title>

    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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


                <div class="form">
                    <h1>Add Slot - Basketball</h1>
                    <div class="detailsleft-main">
                        <div class="detailsleft">
                            <form name="form1" method="post" action="adminmanagebasketball.php">
                                Date: &nbsp; &nbsp; &nbsp; <select name="day" class="search">
                                    <option value="" disabled selected>Search by Day</option>
                                    <option value="Monday">Monday</option>
                                    <option value="Tuesday">Tuesday</option>
                                    <option value="Wednesday">Wednesday</option>
                                    <option value="Thursday">Thursday</option>
                                    <option value="Friday">Friday</option>
                                    <option value="Saturday">Saturday</option>
                                    <option value="Sunday">Sunday</option>
                                    <br><br>
                                </select>

                            </form>
                        </div>

                        <div class="detailsleft">
                            <form name="form1" method="post" action="adminmanagebasketball.php">
                                <br>
                                <label for="time">Time Slot: &nbsp;</label>
                                <input type="text" name="start_time" >
                                <input type="text" name="end_time">
                                </form>
                        </div>
                    </div>

                    <div class="detailsright">
                        <h4>Add Slot</h4>
                        <form name="form1" method="post" action="adminmanagebadminton.php">

                            <input type="radio" id="duration" name="duration" value="Only for the day" >
                            <label for="duration">Only for the day </label>

                            <input type="radio" id="duration" name="duration" value="Only for the month">
                            <label for="duration">Only for the month </label>

                            <input type="radio" id="duration" name="duration" value="Only for whole year">
                            <label for="duration">Only for whole year </label>

                            <input type="radio" id="duration" name="duration" value="Indefinitely">
                            <label for="duration">Indefinitely </label>

                            <div class="button">
                                <input type="submit" name="add_slot" value="Confirm Add" class="btn">

                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>

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


<?php

include("../linkDB.php"); //database connection function 

if (isset($_POST['add_slot'])) {

    // Get the form data
    $day =  mysqli_real_escape_string($linkDB, $_POST['day']);
    $start_time =  mysqli_real_escape_string($linkDB, $_POST['start_time']);
    $end_time =  mysqli_real_escape_string($linkDB, $_POST['end_time']);
    $court =  mysqli_real_escape_string($linkDB, $_POST['court']);
    $duration =  mysqli_real_escape_string($linkDB, $_POST['duration']);

    // Insert the data into the database
    $sql = "INSERT INTO adminmanageslot (day, start_time, end_time, court, duration) VALUES ('$day', '$start_time', '$end_time', '$court', '$duration')";
    $result = mysqli_query($linkDB, $sql);

    // Check if the query was successful
    if ($result) {
        echo '<script>alert("Slot added successfully.");</script>';
    } else {
        echo '<script>alert("Error adding slot.");</script>';
    }
}

?>