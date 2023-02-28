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

        <?php include('../include/navbar.php'); ?>

    </nav>

    <div class="home-content">

        <div class="main-content">

          <div class="content">

            <?php $var = $_SESSION['email']; ?>

            <h1> Update Classes </h1>

            <div class="form" id="getdetails">

            <form method="POST">

<select name="level" class="drop">
    <option value="beginner">Beginner</option>
    <option value="intermediate">Intermediate</option>
    <option value="pro">Pro</option>
</select> <br><br>

<select name="sport" class="drop">
    <option value="badminton">Badminton</option>
    <option value="basketball">Basketball</option>
    <option value="volleyball">Volleyball</option>
    <option value="tennis">Tennis</option>
    <option value="swimming">Swimming</option>
</select> <br><br>

<select name="date" class="drop">
    <option value="monday">Monday</option>
    <option value="tuesday">Tuesday</option>
    <option value="wednesday">Wednesday</option>
    <option value="thursday">Thursday</option>
    <option value="friday">Friday</option>
    <option value="saturday">Saturday</option>
    <option value="sunday">Sunday</option>
</select> <br><br>

<select name="time" class="drop">
    <option value="6.00 - 7.00 a.m">6.00 - 7.00 a.m</option>
    <option value="7.00 - 8.00 a.m">7.00 - 8.00 a.m</option>
    <option value="8.00 - 9.00 a.m">8.00 - 9.00 a.m</option>
    <option value="9.00 - 10.00 a.m">9.00 - 10.00 a.m</option>
    <option value="10.00 - 11.00 a.m">10.00 - 11.00 a.m</option>
    <option value="11.00 - 12.00 a.m">11.00 - 12.00 a.m</option>
    <option value="12.00 - 13.00 p.m">12.00 - 13.00 p.m</option>
    <option value="13.00 - 14.00 p.m">13.00 - 14.00 p.m</option>
    <option value="14.00 - 15.00 p.m">14.00 - 15.00 p.m</option>
    <option value="15.00 - 16.00 p.m">15.00 - 16.00 p.m</option>
    <option value="16.00 - 17.00 p.m">16.00 - 17.00 p.m</option>
    <option value="17.00 - 18.00 p.m">17.00 - 18.00 p.m</option>
    <option value="18.00 - 19.00 p.m">18.00 - 19.00 p.m</option>
    <option value="19.00 - 20.00 p.m">19.00 - 20.00 p.m</option>
    <option value="20.00 - 21.00 p.m">20.00 - 21.00 p.m</option>
    <option value="21.00 - 22.00 p.m">21.00 - 22.00 p.m</option>
</select> <br><br>

<select name="age_group" class="drop">
    <option value="Below 12 Years">Below 12 Years</option>
    <option value="13 - 20 Years">13 - 20 Years</option>
    <option value="Above 21 Years">Above 21 Years</option>
</select> <br><br>

        <input type="text" name="no_of_students" placeholder="No of Students" > <br><br>
        <input type="submit" name="update" value="Update" class="btn">

        <?php 
            $id = $_GET['id'];

            if(isset($_POST['update'])) {
                $level = $_POST['level'];
                $sport = $_POST['sport'];
                $date = $_POST['date'];
                $time = $_POST['time'];
                $age_group = $_POST['age_group'];
                $no_of_students = $_POST['no_of_students'];
                
                // Query the database to update the information for the class
                $sql = "UPDATE coach_classes SET level = '$level', sport = '$sport', date = '$date', time = '$time', age_group = '$age_group', no_of_students = '$no_of_students' WHERE class_id = $id";
                
                if(mysqli_query($linkDB, $sql)){
                    echo "Records were updated successfully.";
                } else{
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($linkDB);
                }
            }
        ?>

</form>

                

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