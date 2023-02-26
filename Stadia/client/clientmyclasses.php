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

    <?php include('../include/clientsidebar.php'); ?>

</div>

<section class="home-section">

    <nav>

        <?php include('../include/navbar.php'); ?>

    </nav>

    <div class="home-content">

        <div class="main-content">

            <?php $var = $_SESSION['email']; ?>

            <h1>My Classes</h1>

            <div class="content">

            <table class="table">

                <tr>

                    <th>Sport</th>
                    <th>Coach</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Payment Details</th>
                    <th>Action</th>

                </tr>

                <?php
                    $query = "SELECT client_classes.class_id, coach_classes.sport, coach_classes.coach, coach_classes.date, coach_classes.time, client_classes.payment_details FROM coach_classes INNER JOIN client_classes ON coach_classes.class_id = client_classes.class_id WHERE client_classes.email = '".$var."'";
                    $res = mysqli_query($linkDB, $query); 
                            if($res == TRUE) 
                            {
                                $count = mysqli_num_rows($res); //calculate number of rows
                                if($count>0)
                                {
                                    while($rows=mysqli_fetch_assoc($res))
                                    {
                                        $id=$rows['class_id'];
                                        echo "<tr>
                                          <td>" . $rows["sport"]. "</td>
                                          <td>" . $rows["coach"]. "</td>
                                          <td>" . $rows["date"]. "</td>
                                          <td>" . $rows["time"]. "</td>
                                          <td>" .$rows["payment_details"]. "</td>
                                          <td><a href='clientcancelclass.php?id=$id; ?>'><i class='fa fa-trash'></i></a></td>
                                        </tr>";
                                    }
                                } else {
                                    echo "0 results";
                                }
                            }    
                    ?>

            </table>

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