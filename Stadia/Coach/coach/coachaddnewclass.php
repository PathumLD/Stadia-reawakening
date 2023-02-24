<!-- <?php include("../linkDB.php"); //database connection function ?> -->


<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Add New Class </title>
    
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 
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

        <?php include('../include/navbar.php'); ?>

    </nav>

    <div class="home-content">

        <div class="main-content">

          <div class="content">

            <?php $var = $_SESSION['email']; ?>

            <h1>Add New Class</h1>

          </div>

          <div class="form" id="addnewclass">

                <form method="POST">

                <select name="day" class="drop">
                    <option value="monday">Badminton</option>
                    <option value="tuesday">Basketball</option>
                    <option value="wednesday">Volleyball</option>
                    <option value="thursday">Tennis</option>
                    <option value="friday">Swimming</option>
                </select> <br><br>
                <select name="time" class="drop">
                    <option value="monday">6.00 - 7.00 a.m</option>
                    <option value="tuesday">7.00 - 8.00 a.m</option>
                    <option value="wednesday">8.00 - 9.00 a.m</option>
                    <option value="thursday">9.00 - 10.00 a.m</option>
                    <option value="friday">10.00 - 11.00 a.m</option>
                    <option value="saturday">11.00 - 12.00 a.m</option>
                    <option value="sunday">12.00 - 13.00 p.m</option>
                    <option value="sunday">13.00 - 14.00 p.m</option>
                    <option value="sunday">14.00 - 15.00 p.m</option>
                    <option value="sunday">15.00 - 16.00 p.m</option>
                    <option value="sunday">16.00 - 17.00 p.m</option>
                    <option value="sunday">17.00 - 18.00 p.m</option>
                    <option value="sunday">18.00 - 19.00 p.m</option>
                    <option value="sunday">19.00 - 20.00 p.m</option>
                    <option value="sunday">20.00 - 21.00 p.m</option>
                    <option value="sunday">21.00 - 22.00 p.m</option>
                </select> <br><br>
                        <input type="text" name="age_group" placeholder="Age Group" > <br><br>
                        <input type="text" name="no_of_students" placeholder="No of Students" pattern="[0-9]{10}" > <br><br>
                        <input type="submit" name="Save" value="Save" class="btn">

                </form>
            
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