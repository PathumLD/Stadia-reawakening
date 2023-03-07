<?php include("../linkDB.php"); //database connection function ?> 


<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Stadia </title>
    
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
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

            
          <div class="class">
          <h1>Verfiy New Classes</h1>
          <table class="table">
                        <tr>
                            <td>Coach Id - 125</td>
                            <td>Date - 2022/09/23</td>
                            <td>Time - 4.00 - 6.00 pm</td>
                        </tr>
                        <tr>
                            <td>Coach Name - M.Perera</td>
                            <td>Class Fee - Rs.3000</td>
                            <td>No.of Months - 06 Months</td>
                        </tr>

                        <tr>
                            <td>Sport - Swimming</td>
                            <td>Age Group - 12-15 years</td>
                            <td><div class="button"><a href="#">Verify</a></div></td>
                        </tr>
                    </table>
                    <table class="table">
                        <tr>
                            <td>Coach Id - 180</td>
                            <td>Date - 2022/10/15</td>
                            <td>Time - 7.00 - 8.00 am</td>
                        </tr>
                        <tr>
                            <td>Coach Name - R.Kumar</td>
                            <td>Class Fee - Rs.1500</td>
                            <td>No.of Months - 04 Months</td>
                        </tr>

                        <tr>
                            <td>Sport - Volleyball</td>
                            <td>Age Group - 17-19 years</td>
                            <td><div class="button"><a href="#">Verify</a></div></td>
                        </tr>
                    </table>
                    <table class="table">
                        <tr>
                            <td>Coach Id - 180</td>
                            <td>Date - 2022/10/15</td>
                            <td>Time - 7.00 - 8.00 am</td>
                        </tr>
                        <tr>
                            <td>Coach Name - R.Kumar</td>
                            <td>Class Fee - Rs.1500</td>
                            <td>No.of Months - 04 Months</td>
                        </tr>

                        <tr>
                            <td>Sport - Volleyball</td>
                            <td>Age Group - 17-19 years</td>
                            <td><div class="button"><a href="#">Verify</a></div></td>
                        </tr>
                    </table>

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
          dropdown[i].addEventListener("click", function() {
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