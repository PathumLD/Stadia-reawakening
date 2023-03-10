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
            <h1>Add New Sport</h1>
                    <!-- form start -->
                    <form method="POST" action="">
                    <p class="add">Sport Name</p><input type="text" name="sportname"  required> <br><br>
                    <p class="add">Courts Allocated</p><input type="text" name="courtsallocated"  required> <br><br>
                    <button type="submit" class="btn">Save</button>
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

<?php

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Get the form data
    $sportname = $_POST["sportname"];
    $courtsallocated = $_POST["courtsallocated"];
    
       
    //insert the data
    $sql = "INSERT INTO adminaddsport (sportname, courtsallocated) VALUES ('$sportname', '$courtsallocated')";
    
    if (mysqli_query($linkDB, $sql)) {
        echo "New sport added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
}

?>
