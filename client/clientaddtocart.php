<?php session_start(); ?>
<?php
    include("../linkDB.php");

// if(isset($_POST['add-to-cart'])){

$id = $_GET['id'];

$query = "SELECT * FROM refreshments_snacks WHERE id=$id ";
$res = mysqli_query($linkDB, $query); 
        if($res == TRUE) 
        {
            $count = mysqli_num_rows($res); //calculate number of rows
            if($count>0)
            {
                while($rows=mysqli_fetch_assoc($res))
                {
                    $itemid = $_POST['$rows["itemid"]'];
                    $itemname = $_POST['$rows["itemname"]'];
                    $price = $_POST['$rows["price"]'];
                    // $quantity = $_POST['quantity'];
                    $email = $_SESSION['email'];

                    $sql = "INSERT INTO cart (email, itemid, itemname, amount)
                    VALUES ('$email', '$itemid' , '$itemname', '$price' )";

                    $rs= mysqli_query($linkDB,$sql);

                    if($rs){
                    
                    echo "<script>window.location.href='clientmycart.php'; </script>";

                    }
                    else{
                    echo "Could not add to the cart - please try again.";
                    }
                }
            }
        }
?>