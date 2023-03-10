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

            <h1>Coaches - Swimming</h1>
            
            <div class="content">

            <label for="coachswimming">Select Coach:</label>

            <select name="coachswimming" class="search">
                <option value="sir1">sir1</option>
                <option value="sir2">sir2</option>
                <option value="sir3">sir3</option>
                <option value="sir4">sir4</option>
            </select>
            <form method="post">
                <input type="submit" name="go" value="Search" id="searchbtn">
            </form>

            <table class="table">

            <tr>

                <th>Age Group</th>
                <th>Level</th>
                <th>Date</th>
                <th>Time</th>
                <th>Class Fee</th>
                <th>Action</th>

            </tr>


            <?php

                if(isset($_POST['go'])){

                    $search = $_POST['search'];

                    $query = "SELECT * FROM coach_classes WHERE sport='swimming'AND coachname LIKE '%$search%' ";
                    $res = mysqli_query($linkDB, $query); 
                        if($res == TRUE) 
                        {
                            $count = mysqli_num_rows($res); //calculate number of rows
                            if($count>0)
                            {
                                while($rows=mysqli_fetch_assoc($res))
                                {
                                    echo "<tr>
                                            <td>" . $rows["age_group"]. "</td>
                                            <td>" . $rows["level"]. "</td>
                                            <td>" . $rows["date"]. "</td>
                                            <td>" . $rows["time"]. "</td>
                                            <td>" . $rows["fee"]. "</td>
                                            <td><a href='clientmycart.php'>Register</a></td>
                                        </tr>";                                
                                    }
                            } else {
                                echo "0 results";
                            }
                        }
                }
                else{

                    $query = "SELECT * FROM coach_classes WHERE sport='swimming'";
                    $res = mysqli_query($linkDB, $query); 
                            if($res == TRUE) 
                            {
                                $count = mysqli_num_rows($res); //calculate number of rows
                                if($count>0)
                                {
                                    while($rows=mysqli_fetch_assoc($res))
                                    {
                                        echo "<tr>
                                                <td>" . $rows["age_group"]. "</td>
                                                <td>" . $rows["level"]. "</td>
                                                <td>" . $rows["date"]. "</td>
                                                <td>" . $rows["time"]. "</td>
                                                <td>" . $rows["fee"]. "</td>
                                                <td><a href='clientmycart.php'>Register</a></td>
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