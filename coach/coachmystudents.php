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

            <h1>My Students</h1>

            <?php $var = $_SESSION['email']; ?>


                <form method="post">
                    <input type="text" name="search" class ="search" placeholder="Student Name...">
                    <input type="submit" name="go" value="search" id = "searchbtn">
                    <a href="coachmystudents.php"><input type="submit" name="reset" value="reset" id = "resetbtn"></a>
                </form>
            
            <table class="table">

                <tr>

                    <th> </th>
                    <th> Name</th>
                    <th> Date of Birth </th>
                    <th> Gender </th>
                    <th> NIC </th>
                    <th> Contact No. </th>
                    <th> Address </th>

                </tr>

                <?php

                        $linkDB = mysqli_connect('localhost', 'username', 'root', 'stadia-new');

                        if (!$linkDB) {
                            die('Connection failed: ' . mysqli_connect_error());
                        }

                        if (isset($_POST['go'])) {
                            $search = $_POST['search'];
                        } else {
                            $search = null;
                        }

                        if ($search) {
                            $query = "SELECT * FROM coach_students WHERE name LIKE '%$search%'";
                        } elseif ($search) {
                            $query = "SELECT * FROM coach_students WHERE gender LIKE '%$search%'";
                        } else {
                            $query = "SELECT * FROM coach_students";
                        }

                        $res = mysqli_query($linkDB, $query);

                        if ($res == TRUE) {
                            $count = mysqli_num_rows($res);

                            if ($count > 0) {
                                while ($rows = mysqli_fetch_assoc($res)) {
                                    echo "<tr>
                                            <td> </td>
                                            <td>" . $rows["name"]. "</td>
                                            <td>" . $rows["dob"]. "</td>
                                            <td>" . $rows["gender"]. "</td>
                                            <td>" . $rows["NIC"]. "</td>
                                            <td>" . $rows["phoneNo"]. "</td>
                                            <td>" . $rows["address"]. "</td>
                                        </tr>";
                                }
                            } else {
                                echo "0 results";
                            }
                        }

                        mysqli_close($linkDB);

                        ?>
          
     
            </table>

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