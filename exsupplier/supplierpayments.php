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

        <?php include('../include/suppliersidebar.php'); ?>

    </div>

    <section class="home-section">

        <nav>

            <?php include('../include/suppliernavbar.php'); ?>

        </nav>

        <div class="home-content">
            

            <div class="main-content">
            <h1>Payments Received </h1>

           
            
            <table class="table">

<tr>

    <th>Date</th>
    <th>Order Id</th>
    <th>Amount</th>
    <th>Received</th>
    
</tr>

<?php
$query = "SELECT * FROM suppliermyorders";
$res = mysqli_query($linkDB, $query);
if ($res == TRUE) {
    $count = mysqli_num_rows($res); //calculate number of rows
    if ($count > 0) {
        while ($rows = mysqli_fetch_assoc($res)) {
            $Date= $rows['Date'];
            $OrderId = $rows['OrderId'];
            $Amount = $rows['Amount'];
           
            ?>
            <tr>
                <td>
                    <?php echo $Date; ?>
                </td>
                <td>
                    <?php echo $OrderId; ?>
                </td>
                <td>
                    <?php echo $Amount; ?>
                </td>
                <td><input type="checkbox" id="checkItem" class="chckbox" name="check[]" value="1"></td>
            </tr>
            <?php
        }
    }

}
?>

</table>
                
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