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
    <link rel="stylesheet" href="../css/client.css">
 
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

            <table id="searchtable">
              <tr>
                <td>
                  <form method="post">
                    <select name="search" class="search" id="disable">
                      <option value="" disabled selected>Search by Day</option>
                      <option value="Monday">Monday</option>
                      <option value="Tuesday">Tuesday</option>
                      <option value="Wednesday">Wednesday</option>
                      <option value="Thursday">Thursday</option>
                      <option value="Friday">Friday</option>
                      <option value="Saturday">Saturday</option>
                      <option value="Sunday">Sunday</option>
                    </select>                  
                    <input type="submit" name="go" value="Search" id="searchbtn">
                  </form>
                </td>
                <td>
                  <form method="post">
                    <select name="sport_search" class="search" id="disable">
                      <option value="" disabled selected>Search by Court</option>
                      <option value="Badminton">Badminton</option>
                      <option value="Basketball">Basketball</option>
                      <option value="Volleyball">Volleyball</option>
                      <option value="Tennis">Tennis</option>
                      <option value="Swimming">Swimming</option>
                    </select>                  
                    <input type="submit" name="go2" value="Search" id="searchbtn">
                    <a href="clientmyclasses.php"><input type="submit" value="reset" id = "resetbtn"></a>
                  </form>
                </td>
              </tr>
            </table>

                <div class="left">

                
        
                </div>

                <div class="right">

                    <div class="top">

                        <h3>Payments to be done</h3>
                    
                    </div>

                    <div class="bottom">

                        <h3>Enroll for classes</h3>

                        <h4><b>Enroll with the classes we provide!</b><br>
                        Whether you're looking to learn a new skill, develop a new hobby, or advance your career, taking classes can help you achieve your goals.</h4>

                        <a href="clientcoachbadminton.php"><button class="enroll">Badminton</button></a>
                        <a href="clientcoachbasketball.php"><button class="enroll">Basketball</button></a><br>
                        <a href="clientcoachvolleyball.php"><button class="enroll">Volleyball</button></a>
                        <a href="clientcoachtennis.php"><button class="enroll">Tennis</button></a><br>
                        <a href="clientcoachswimming.php"><button class="enroll sw">Swimming</button></a>

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