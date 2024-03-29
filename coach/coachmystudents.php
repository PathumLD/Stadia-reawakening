<?php 
session_start(); 
include "../linkDB.php"; //database connection function 
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Stadia</title>    
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/coach/coachmystudents.css"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../include/javascript.php'; ?>
    <?php include '../include/styles.php'; ?>
  </head>
  <body onload="initClock()">
    <div class="sidebar">
      <?php include '../include/coachsidebar.php'; ?>
    </div>
    <section class="home-section">
      <nav>
        <?php include '../include/coachnavbar.php'; ?>
      </nav>
      <div class="home-content">
        <div class="main-content">
          <h1>My Students</h1>

          <?php $var = $_SESSION['email']; ?>


                <form method="post">
                    <input type="text" name="search" class ="search" placeholder="Student Name...">
                    <input type="submit" name="go" value="search" id = "searchbtn">
                    <a href="coachmystudents.php"><input type="submit" name="reset" value="reset" id = "resetbtn"></a>
                </form>
            
            <table class="table">

                <tr>
                    <th> Name</th>
                    <th> Date of Birth </th>
                    <th> Gender </th>
                    <th> NIC </th>
                    <th> Contact No. </th>
                    <th> Address </th>
                    <th> Emergency Contact No. </th>
                    <th> Emergency Contact Name </th>
                </tr>

          

          <?php
                    if(isset($_POST['go'])){
                        $search = $_POST['search'];

                        $query = "SELECT * FROM users 
                            WHERE email IN (SELECT client_classes.email FROM client_classes INNER JOIN coach_classes 
                                ON coach_classes.class_id = client_classes.class_id 
                                WHERE coach_classes.email = '".$var."')
                            AND fname LIKE '%$search%' ";
                        $res = mysqli_query($linkDB, $query); 

                        if($res == TRUE) {
                            $count = mysqli_num_rows($res);
                            if($count > 0) {
                                while($rows = mysqli_fetch_assoc($res)) {
                                    echo "<tr>
                                        <td>" . $rows["fname"]. "</td>
                                        <td>" . $rows["dob"]. "</td>
                                        <td>" . $rows["gender"]. "</td>
                                        <td>" . $rows["NIC"]. "</td>
                                        <td>" . $rows["phone"]. "</td>
                                        <td>" . $rows["address"]. "</td>
                                        <td>" . $rows["emphone"]. "</td>
                                        <td>" . $rows["emname"]. "</td>
                                    </tr>";
                                }
                            } else {
                                echo "0 results";
                            }
                        }
                    } else {    
                  $query = "SELECT * FROM users 
                  WHERE email IN (SELECT client_classes.email FROM client_classes INNER JOIN coach_classes 
                                  ON coach_classes.class_id = client_classes.class_id 
                                  WHERE coach_classes.email = '$var')";
                        $res = mysqli_query($linkDB, $query); 

                        if($res == TRUE) {
                            $count = mysqli_num_rows($res);
                            if($count > 0) {
                                while($rows = mysqli_fetch_assoc($res)) {
                                    echo "<tr>
                                        <td>" . $rows["fname"]. "</td>
                                        <td>" . $rows["dob"]. "</td>
                                        <td>" . $rows["gender"]. "</td>
                                        <td>" . $rows["NIC"]. "</td>
                                        <td>" . $rows["phone"]. "</td>
                                        <td>" . $rows["address"]. "</td>
                                        <td>" . $rows["emphone"]. "</td>
                                        <td>" . $rows["emname"]. "</td>
                                    </tr>";
                                }
                            } else {
                                echo "0 results";
                            }
                        }    
                    }      
                ?>

<script>
  // Add an event listener to remove the error message after 3 seconds
  setTimeout(function() {
    var errorBox = document.getElementById("error-box");
    if (errorBox) {
      errorBox.parentNode.removeChild(errorBox);
    }
  }, 3000);
</script>   

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
  </body>
</html>