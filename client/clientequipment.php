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

            <h1>Order Equipment</h1>

            <div class="content">

            <form method="post">
                <input type="text" name="search" placeholder="Item Name..." class="search">
                <input type="submit" name="go" value="Search" id="searchbtn">
                <a href="clientbookings.php"><input type="submit" value="reset" id = "resetbtn"></a>
            </form>

            <table class="table">

                <tr>
                    <th>Item Name</th>
                    <th>Price</th> 
                    <th>Available</th>
                    <th>Quantity Needed</th> 
                    <th>Action</th> 
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
                                        $id=$rows['itemid'];
                                        echo "<tr>
                                                <td>" . $rows["itemname"]. "</td>
                                                <td>" . $rows["price"]. "</td>
                                                <td>" . $rows["quantity"]. "</td>
                                                <td><input type='number' name='quantity'></td>
                                                <td><button type='submit' name='add-to-cart'><i class='fa fa-cart-plus'></i></button></td>
                                            </tr>";
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
                                        $id=$rows['itemid'];
                                        echo "<tr>
                                                <td>" . $rows["itemname"]. "</td>
                                                <td>" . $rows["price"]. "</td>
                                                <td>" . $rows["quantity"]. "</td>
                                                <td><input type='number' name='quantity'></td>
                                                <td><button type='submit' name='add-to-cart'><i class='fa fa-cart-plus'></i></button></td>
                                            </tr>";
                                    }
                                } else {
                                    echo "0 results";
                                }
                            }    
                        }      
                    ?>

            </table>

            <!-- <div class="button">
                <a href="clientmycart.php"> Add to Cart </a>
            </div> -->

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

<?php

if(isset($_POST['add-to-cart'])){
  
include('linkDB.php');  
$id = $_GET['id'];

$item = $_POST['$rows["itemname"]'];
$price = $_POST['$rows["price"]'];
$quantity = $_POST['quantity'];
$email = $_SESSION['email'];

$sql = "INSERT INTO cart (email, item, amount)
VALUES ('$email', '$item' , '$quantity' )";

$rs= mysqli_query($linkDB,$sql);

if($rs){
  
  echo "<script>window.location.href='clientmycart.php'; </script>";

}
else{
  echo "Could not add to the cart - please try again.";
}
 
}
?>