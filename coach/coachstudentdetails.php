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

            <h1> Student Details </h1>


            <?php $id = $_GET['id']; ?>

            <?php

                    // Query the database to get the information for the headline
                    $sql = "SELECT date, time, age_group FROM coach_classes WHERE class_id = $id ";
                    $result = mysqli_query($linkDB, $sql);

                    // Check if the query was successful
                    if (mysqli_num_rows($result) > 0) {
                    // Output the headline with the database values
                    $row = mysqli_fetch_assoc($result);
                    $day = $row["date"];
                    $timeSlot = $row["time"];
                    $ageGroup = $row["age_group"];
                    echo "<h2>$day | $timeSlot | Age : $ageGroup</h2>";
                    } else {
                    echo "No results found.";
                    }

            ?>



            <table class="searchtable">
                <tr><td>    </td></tr>
               <tr><td> <form method="post">
                    <input type="text" name="search" class ="search" placeholder="Student Name...">
                    <input type="submit" name="go" value="search" id = "searchbtn">
                </form></td></tr>
            </table>

            
            <table class="table">

                <tr>

                    <th> </th>
                    <th> Name</th>
                    <th> Date of Birth </th>
                    <th> Gender </th>
                    <th> NIC </th>
                    <th> Contact No. </th>
                    <th> Emergency Number </th>
                    <th> Emergency Name </th>

                </tr>

                <?php

                    if(isset($_POST['go'])){
                    
                        $search = $_POST['search'];

                        $query = "SELECT * FROM coach_students WHERE name LIKE '%$search%' ";
                        $res = mysqli_query($linkDB, $query); 
                            if($res == TRUE) 
                            {
                                $count = mysqli_num_rows($res); //calculate number of rows
                                if($count>0)
                                {
                                    while($rows=mysqli_fetch_assoc($res))
                                    {
                                        echo "<tr>
                                            <td> </td>
                                            <td>" . $rows["name"]. "</td>
                                            <td>" . $rows["dob"]. "</td>
                                            <td>" . $rows["gender"]. "</td>
                                            <td>" . $rows["NIC"]. "</td>
                                            <td>" . $rows["phoneNo"]. "</td>
                                            
                                        </tr>";
                                    }
                                } elseif($search=='all') {
                                    $query = "SELECT * FROM coach_classes ";
                                    $res = mysqli_query($linkDB, $query); 
                                            if($res == TRUE) 
                                            {
                                                $count = mysqli_num_rows($res); //calculate number of rows
                                                if($count>0)
                                                {
                                                    while($rows=mysqli_fetch_assoc($res))
                                                    {
                                                        echo "<tr>
                                                            <td> </td>
                                                            <td>" . $rows["name"]. "</td>
                                                            <td>" . $rows["dob"]. "</td>
                                                            <td>" . $rows["gender"]. "</td>
                                                            <td>" . $rows["NIC"]. "</td>
                                                            <td>" . $rows["phoneNo"]. "</td>

                                                            </tr>";
                                                    }
                                                } else {
                                                    echo "0 results";
                                                }
                                            }
                                    // echo "0 results";
                                }
                            }
                    }
                    else{
                    $query = "SELECT * FROM users INNER JOIN client_classes ON users.email=client_classes.email where client_classes.class_id = $id ";
                    $res = mysqli_query($linkDB, $query); 
                            if($res == TRUE) 
                            {
                                $count = mysqli_num_rows($res); //calculate number of rows
                                if($count>0)
                                {
                                    while($rows=mysqli_fetch_assoc($res))
                                    {
                                        echo "<tr>
                                                <td> </td>
                                                <td>" . $rows["fname"]. " " . $rows["lname"].  "</td>
                                                <td>" . $rows["dob"]. "</td>
                                                <td>" . $rows["gender"]. "</td>
                                                <td>" . $rows["NIC"]. "</td>
                                                <td>" . $rows["phone"]. "</td>
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