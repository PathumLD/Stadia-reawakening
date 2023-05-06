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
            <h1>View Equipment</h1>
            
            <form method="POST">
            
            <input type="text" placeholder="Item Name.." name="search">
            <input type="submit" name="go" value="Go">
            <button class="plus"><i class="fa fa-plus-circle" style="font-size:36px" ><a href="adminaddnewequipment.php"></i></button></a>
            </form>

            <table class="table">
                <tr>
                    <th>ItemId</th>
                    <th>ItemName</th>
                    <th>Quantity</th>

                </tr>

                <?php
                include('../linkDB.php');
                if(isset($_POST['go'])){

                    $search = $_POST['search'];

                    $query = "SELECT * FROM adminaddequipment WHERE Itemname LIKE '%$search%' ";
                    $res = mysqli_query($linkDB, $query); 
                        if($res == TRUE) 
                        {
                            $count = mysqli_num_rows($res); //calculate number of rows
                            if($count>0)
                            {
                                while($rows=mysqli_fetch_assoc($res))
                                {
                                    echo "<tr><td>" . $rows["ItemId"]. "</td><td>" . $rows["Itemname"]. "</td><td>" . $rows["Quantity"].  "</td></tr>";

                                }
                            } else {
                                echo "0 results";
                            }
                        }
                }
                else{
                $query = "SELECT * FROM adminaddequipment ";
                $res = mysqli_query($linkDB, $query);
                if ($res == TRUE) {
                    $count = mysqli_num_rows($res); //calculate number of rows
                    if ($count > 0) {
                            while ($rows = mysqli_fetch_assoc($res)) {
                                $ItemId = $rows['ItemId'];
                                $Itemname = $rows['Itemname'];
                                $Quantity = $rows['Quantity'];
                                ?>
                            <tr>
                                <td>
                                    <?php echo $ItemId; ?>
                                </td>
                                <td>
                                    <?php echo $Itemname; ?>
                                </td>
                                <td>
                                    <?php echo $Quantity; ?>
                                </td>
                            </tr>
                            <?php

                            }                                }

                    }
                }
                ?>
        </div>
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