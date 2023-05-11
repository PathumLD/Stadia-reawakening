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
    <link rel="stylesheet" href="../css/client/clientequipment.css">
 
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

            <h1>Order Equipment</h1>

            <div class="content">

                <h3><b>Haven't got your own equipment?</b><br>
                    Don't worry we have got you covered! <br>
                    Rent any equipment you need for the cheapest price.</h3>

                <table id="searchtable">
                    <tr>
                        <td>
                       
                            <form method="post">
                                <input type="text" name="search" placeholder="Item Name..." class="search">
                                <input type="submit" name="go" value="Search" id="searchbtn">
                                <a href="clientbookings.php"><input type="submit" value="reset" id = "resetbtn"></a>
                            </form>
                         
                        </td>
                    </tr>
                </table>

                <form method="post" action="clientcart.php">
                    <table>
                        <thead>
                            <tr>
                                <th>Item Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Date and Time</th>
                                <th></th>
                            </tr>
                        </thead>
                        <?php

                            $query_equipment = "SELECT * FROM equipment";
                            $result_equipment = mysqli_query($linkDB, $query_equipment);
                            while ($row_equipment = mysqli_fetch_assoc($result_equipment)) {
                                $productId = $row_equipment['itemid'];
                        ?>
                            <div>
                                <input type="hidden" name="product_id_<?= $productId ?>" value="<?= $row_equipment['itemid'] ?>">
                                <input type="hidden" name="product_name_<?= $productId ?>" value="<?= $row_equipment['itemname'] ?>">
                                <input type="hidden" name="product_price_<?= $productId ?>" value="<?= $row_equipment['price'] ?>">
                                <tr>
                                    <td><label><?= $row_equipment['itemname'] ?></label></td>
                                    <td><label><?= $row_equipment['price'] ?></label></td>
                                    <td><input type="datetime-local" name="datetime_<?= $productId ?>" min="<?= date('Y-m-d\TH:i', strtotime('now')) ?>" max="<?= date('Y-m-d\TH:i', strtotime('+3 months')) ?>"></td>
                                    <td><input type="number" name="quantity_<?= $productId ?>" value="1" min="1"></td>
                                    <td><button type="submit" name="add_to_cart_<?= $productId ?>"><i class='fa fa-cart-plus'></i></button></td>
                                </tr>
                            </div>
                            <?php
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

