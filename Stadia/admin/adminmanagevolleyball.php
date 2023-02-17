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

           
            <div class="form">
            <h1>Manage Slot - Volleyball</h1>
            <div class="detailsleft-main">
                <div class="detailsleft">
                    <form name="form1" id="form1" action="/action_page.php">
                        Date: &nbsp; &nbsp; &nbsp; <select name="Days" id="days">
                            <option>Monday</option>
                            <option>Tuesday</option>
                            <option>Wednesday</option>
                            <option>Thursday</option>
                            <option>Friday</option>
                            <option>Saturday</option>
                            <option>Sunday</option>
                            <br><br>
                        </select>
                    </form>
                </div>
              
                <div class="detailsleft">
                <form name="form1" id="form1" form action="/action_page.php">
                    <br>
                    <label for="time">Time Slot: &nbsp;</label>
                    <input type="text" id="time" name="time" value="8.00 am">
                    <input type="text" id="time2" name="time" value="9.00 am">
                </form>
                </div>
            </div>
            <div class="detailsright">
            <br><h4>Manage Slot</h4>
            <form name="form1" id="form1"form action="/action_page.php">
            
                <input type="radio" id="slot" name="slot" value="addslot">
                <label for="slot">Only for the day </label>
                
                <input type="radio" id="slot" name="slot" value="addslot">
                <label for="slot">Only for the month </label>
                
                <input type="radio" id="slot" name="slot" value="addslot">
                <label for="slot">Only for whole year </label>
                
                <input type="radio" id="slot" name="slot" value="addslot">
                <label for="slot">Indefinitely </label>
                
                <div class="button">
                <input type="submit" name="Add Slot" value="Add Slot" class="btn">
                <input type="submit" name="Delete Slot" value="Delete Slot" class="btn">
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