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

            <h1>Equipments</h1>

       

                <form method="post">
                    <input type="text" name="search" class ="search" placeholder="Equipment Name...">
                    <input type="submit" name="go" value="search" id = "searchbtn">
                    <a href="coachequipments.php"><input type="submit" name="reset" value="reset" id = "resetbtn"></a>
                </form>

            <?php $var = $_SESSION['email']; ?>
            
            <table class="table">

                <tr>
                    <th>Item Name</th>
                    <th>Price</th> 
                    <th>Available</th>
                    <th>Quantity Needed</th>  
                </tr>

                <?php

                    if(isset($_POST['go'])){
                    
                        $search = $_POST['search'];

                        $query = "SELECT * FROM equipment WHERE itemname LIKE '%$search%' ";
                        $res = mysqli_query($linkDB, $query); 
                            if($res == TRUE) 
                            {
                                $count = mysqli_num_rows($res); //calculate number of rows
                                if($count>0)
                                {
                                    while($rows=mysqli_fetch_assoc($res))
                                    {
                                        echo "<tr><td>" . $rows["itemname"]. "</td><td>" . $rows["price"]. "</td><td>" . $rows["quantity"]. "</td><td><input type='number' name='quantity'></td></tr>";
                                    }
                                } else {
                                    echo "0 results";
                                }
                            }
                    }
                    else{
                    $query = "SELECT * FROM equipment ";
                    $res = mysqli_query($linkDB, $query); 
                            if($res == TRUE) 
                            {
                                $count = mysqli_num_rows($res); //calculate number of rows
                                if($count>0)
                                {
                                    while($rows=mysqli_fetch_assoc($res))
                                    {
                                        echo "<tr><td>" . $rows["itemname"]. "</td><td>" . $rows["price"]. "</td><td>" . $rows["quantity"]. "</td><td><input type='number' name='quantity'></td></tr>";
                                    }
                                } else {
                                    echo "0 results";
                                }
                            }    
                        }      
                    ?>

            </table>

                    <div class="button">
                        <a href="coachmycart.php"> Add to Cart </a>
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