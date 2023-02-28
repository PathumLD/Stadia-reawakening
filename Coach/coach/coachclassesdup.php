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

            <h1>My Classes</h1>

            <?php $var = $_SESSION['email']; ?>

            

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
                    <th> Update </th>
                    <th> Action </th>

                </tr>

                <?php

                      if(isset($_POST['go'])){
                                          
                          $search = $_POST['search'];

                          $query = "SELECT * FROM bookings WHERE date LIKE '%$search%' AND email = '".$var."'";
                          $res = mysqli_query($linkDB, $query); 
                          if($res == TRUE) 
                          {
                              $count = mysqli_num_rows($res); //calculate number of rows
                              if($count>0)
                              {
                                  while($rows=mysqli_fetch_assoc($res))
                                  {
                                      $id=$rows['id'];
                                      echo "<tr id='row_$id'>
                                              <td>" . $rows["date"]. "</td>
                                              <td>" . $rows["time"]. "</td>
                                              <td>" .$rows["court"]. "</td>
                                              <td><button class='submit-button' onclick='confirmRowData($id)'><i class='fa fa-trash'></i></button></td>
                                          </tr>";
                                  }
                              } else {
                                  echo "0 results";
                              }
                          }
                      } 
                      else{                  

                        if(isset($_POST['go'])){
                                            
                            $court_search = $_POST['court_search'];

                            $query = "SELECT * FROM bookings WHERE court LIKE '%$court_search%' AND email = '".$var."'";
                            $res = mysqli_query($linkDB, $query); 
                            if($res == TRUE) 
                            {
                                $count = mysqli_num_rows($res); //calculate number of rows
                                if($count>0)
                                {
                                    while($rows=mysqli_fetch_assoc($res))
                                    {
                                        $id=$rows['id'];
                                        echo "<tr id='row_$id'>
                                                <td>" . $rows["date"]. "</td>
                                                <td>" . $rows["time"]. "</td>
                                                <td>" .$rows["court"]. "</td>
                                                <td><button class='submit-button' onclick='confirmRowData($id)'><i class='fa fa-trash'></i></button></td>
                                            </tr>";
                                    }
                                } else {
                                    echo "0 results";
                                }
                            }
                        } 
                        else{
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
                                        echo "<tr id='row_$id'>
                                                <td>" . $rows["date"]. "</td>
                                                <td>" . $rows["time"]. "</td>
                                                <td>" .$rows["court"]. "</td>
                                                <td><button class='submit-button' onclick='confirmRowData($id)'><i class='fa fa-trash'></i></button></td>
                                            </tr>";
                                    }
                                } else {
                                    echo "0 results";
                                }
                            }
                        }  
                      } 
                  ?>




     
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






<?php

// Check if the form has been submitted
if (isset($_POST['submit'])) {

    // Get the search term from the search bar
    $searchTerm = $_POST['searchTerm'];

    // Split the search term into two variables
    list($variable1, $variable2) = explode(',', $searchTerm);


    // Build the SQL query
    $sql = "SELECT * FROM coach_classes WHERE column1 LIKE '%$variable1%' AND column2 LIKE '%$variable2%'";

    // Execute the query
    $result = $conn->query($sql);

    // Check if any results were found
    if ($result->num_rows > 0) {

        // Output the results
        while ($row = $result->fetch_assoc()) {
            echo "Column 1: " . $row["column1"] . "<br>";
            echo "Column 2: " . $row["column2"] . "<br><br>";
        }

    } else {
        echo "No results found";
    }
}

?>