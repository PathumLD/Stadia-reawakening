<?php session_start(); ?>
<?php include("../linkDB.php"); //database connection function ?>


<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Stadia </title>
    
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/coach.css">
 
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <?php include('../include/javascript.php'); ?>
     <?php include('../include/styles.php'); ?>

   </head>
<body onload="initClock()">

<div class="sidebar">

    <?php include('../include/coachsidebar.php'); ?>

</div>

<section class="home-section">

    <nav>

        <?php include('../include/coachnavbar.php'); ?>

    </nav>

    <div class="home-content">

        <div class="main-content">

          <div class="content">

            <?php $var = $_SESSION['email']; ?>

            <h1>My Cart</h1>

            <table class="table">

                <tr>

                    <th></th>
                    <th>Court / Item</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Amount</th>

                </tr>

                <?php
                        $query = "SELECT * FROM cart WHERE email = '".$var."'";
                        $res = mysqli_query($linkDB, $query); 
                                if($res == TRUE) 
                                {
                                    $count = mysqli_num_rows($res); //calculate number of rows
                                    if($count>0)
                                    {
                                        while($rows=mysqli_fetch_assoc($res))
                                        {
                                            $id=$rows['id'];
                                            echo "<tr>
                                                    <td><input type='checkbox' id='checkout' name='checkout' ></td>
                                                    <td>" . $rows["item"]. "</td>
                                                    <td>" . $rows["date"]. "</td>
                                                    <td>" . $rows["time"]. "</td>
                                                    <td>" . $rows["amount"].  "</td>
                                                    
                                                </tr>";
                                        }
                                    } else {
                                        echo "0 results";
                                    }
                                }    
                ?>

            </table>

            <div class="button">
                <a href="coachcheckout.php"> Checkout </a>
            </div>

          </div>

        </div>

    </div>

    <footer>
        <div class="foot">
          <?php include("../include/footer.php"); ?>
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