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

                <!-- <h1>Update About Page</h1> -->
                <div class="form">
                    <h1>Update About Page</h1>
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                        <textarea id="details" name="details" rows="10" cols="100"
                            required>Enter the details you want to update... </textarea><br><br>
                        <button type="submit" class="btn">Confirm Update</button>
                    </form>
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
if (isset($_POST['submit'])) {
    $details = $_POST['details'];
    //update query to update the details in the database
    $update_query = "UPDATE adminabout SET details='$details'";
    $result = mysqli_query($linkDB, $update_query);
    if ($result) {
        echo "<script type='text/javascript'>alert('Details updated successfully');</script>";
    }
}
?>