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
    <link rel="stylesheet" href="../css/client/clientrefreshments.css">
 
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <?php include('../include/javascript.php'); ?>
     <?php include('../include/styles.php'); ?>

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


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

            <h1>Order Refreshments</h1>

            <div class="content">

                <h3><b>Try our snacks and drinks!</b><br>
                        We sell the best snacks and drinks in town. Try them out to quench your thirst and hunger.</h3>

            <div class="left">

                <h3>Drinks</h3>

                <table class="table">

                    <tr>
                        <th>Item Name</th>
                        <th>Price</th> 
                        <th>Quantity</th>  
                        <th></th>
                    </tr>

                    <?php
                        $query = "SELECT * FROM refreshments_drinks ";
                        $res = mysqli_query($linkDB, $query); 
                                if($res == TRUE) 
                                {
                                    $count = mysqli_num_rows($res); //calculate number of rows
                                    if($count>0)
                                    {
                                        while($rows=mysqli_fetch_assoc($res))
                                        {
                                            echo "<tr>
                                                    <td>" . $rows["itemname"]. "</td>
                                                    <td>" . $rows["price"]. "</td>
                                                    <td><input type='number' name='quantity' id='qty_" . $rows["id"] . "'></td>
                                                    <td><button type='button' name='add-to-cart' onclick='addToCart(" . $rows["id"] . ", document.getElementById(\"qty_" . $rows["id"] . "\").value)'><i class='fa fa-cart-plus'></i></button></td>      </tr>";
                                            }
                                        } else {
                                            echo "0 results";
                                        }
                                    }    
                            ?>

                </table>


            </div>

            <div class="right">

                <h3>Snacks</h3>

                <table class="table">

                    <tr>
                        <th>Item Name</th>
                        <th>Price</th> 
                        <th>Quantity</th>  
                        <th></th>
                    </tr>

                    <?php
                        $query = "SELECT * FROM refreshments_snacks ";
                        $res = mysqli_query($linkDB, $query); 
                        if($res == TRUE) {
                            $count = mysqli_num_rows($res); //calculate number of rows
                            if($count>0) {
                                while($rows=mysqli_fetch_assoc($res)) {
                                    $id=$rows['id'];
                                    echo "<tr id='row__$id'>
                                        <td>" . $rows["itemname"]. "</td>
                                        <td>" . $rows["price"]. "</td>
                                        <td><input type='number' name='quantity'></td>
                                        <td>
                                            <button type='button' class='add-to-cart-btn' data-item-id='$id'><i class='fa fa-cart-plus'></i></button>
                                            <a href='clientaddtocart.php?id=$id; ?>'><i class='fa fa-pencil-square-o' ></i> </a>
                                        </td>
                                    </tr>";
                                }
                            } else {
                                echo "0 results";
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

