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

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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

        <?php $var = $_SESSION['email']; ?>

            <h1>My Classes</h1>


            <table class = "searchtable">
            <tr><td><a href="coachaddnewclass.php"><i class="fa fa-plus-circle" id="plus" style="font-size:36px;"></i></a></td>

            <td><form method="POST">
            
                    <select class="search"name="search">
                    <option value="all">All</option>
                    <option value="monday">Monday</option>
                    <option value="tuesday">Tuesday</option>
                    <option value="wednesday">Wednesday</option>
                    <option value="thursday">Thursday</option>
                    <option value="friday">Friday</option>
                    <option value="saturday">Saturday</option>
                    <option value="sunday">Sunday</option>
                    </select>
                    <input type="submit" name="go" value="Search" id="searchbtn">
                    <a href="coachclasses.php"><input type="submit" name="reset" value="reset" id = "resetbtn"></a>
                
                </form></td></tr>
        </table>

            
            
            <table class="table">

                <tr>

                    <th> Day </th>
                    <th> Sport </th>
                    <th> Time</th>
                    <th> Age Group </th>
                    <th> No. of Students </th>
                    <th> Student Details </th>
                    <th> Action </th>

                </tr>

                            <?php

                                if(isset($_POST['go'])) {
                                    $search = $_POST['search'];
                                } else {
                                    $search = null;
                                }

                                if($search == 'all') {
                                    $query = "SELECT * FROM coach_classes";
                                } else {
                                    $query = "SELECT * FROM coach_classes WHERE date LIKE '%$search%' && status = '1'";
                                }

                                $res = mysqli_query($linkDB, $query);

                                if($res == TRUE) {
                                    $count = mysqli_num_rows($res);

                                    if($count > 0) {
                                        while($rows = mysqli_fetch_assoc($res)) {
                                            $id = $rows['id'];

                                            echo "<tr id='row_$id'>  
                                                <td>" . $rows["date"]. "</td>
                                                <td>" . $rows["sport"]. "</td>
                                                <td>" . $rows["time"]. "</td>
                                                <td>" . $rows["age_group"]. "</td>
                                                <td>" . $rows["no_of_students"]. "</td>
                                                <td><a href='coachstudentdetails.php?id=$id;'>View</a> </td>
                                                <td><a href='coachupdateclass.php?id=$id;'><i class='fa fa-edit' id='edit' style='font-size:24px'></i></a>
                                                
                                            </tr>";
                                        }
                                    } else {
                                        echo "0 results";
                                    }
                                }
                                
                                ?>





     
            </table>

            <table class ="table2">
                <tr>
                    <th>Pending Classes</t>
                </tr>
            </table>

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
