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

          <div class="content">

            <?php $var = $_SESSION['email']; ?>

            <h1>My Bookings</h1>

            <section>
              <button class='popup'><i style='color:black;' class='fa fa-trash'></i></button>
              <span class="overlay"></span>

              <div class="modal-box">
                <i class="fa fa-minus-circle"></i>
                <h2>Confirm Cancellation?</h2>
                <h4>NOTE: We will be charging Rs.100 per every cancellation</h4>

                <div class="buttons">
                    <button onclick="window.location.href='clientcancelbooking.php';">Yes, Confirm</button>
                    <button class="close-btn">Don't Cancel</button>
                </div>
              </div>
            </section>

            <table class="table">

                <tr>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Court</th>    
                        <th>Action</th>
                </tr>

                <?php
                    $query = "SELECT * FROM bookings WHERE email = '".$var."'";
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
                                              <td>" . $rows["date"]. "</td>
                                              <td>" . $rows["time"]. "</td>
                                              <td>" . $rows["court"]. "</td>
                                              <td><a href='clientcancelbooking.php?id=$id; ?>'><i class='fa fa-trash'></i></a></td> 
                                              <td> <button class='ppp'><i style='color:black;' class='fa fa-trash'></i></button> </td> 
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

<script>
      const section = document.querySelector("section"),
        overlay = document.querySelector(".overlay"),
        showBtn = document.querySelector(".popup"),
        closeBtn = document.querySelector(".close-btn");

      showBtn.addEventListener("click", () => section.classList.add("active"));

      overlay.addEventListener("click", () =>
        section.classList.remove("active")
      );

      closeBtn.addEventListener("click", () =>
        section.classList.remove("active")
      );
    </script>