<?php
session_start();
include("../linkDB.php"); //database connection function 
// Handle the form submission
if (isset($_POST['update_status'])) {
    if (!empty($_POST['orders'])) {
        foreach ($_POST['orders'] as $order) {
            $order_data = explode(',', $order);
            $product_id = $order_data[0];
            $date = $order_data[1];
            $quantity = $order_data[2];
           
            $sql = "UPDATE orders SET s_r = 2 WHERE product_id = '$product_id' AND date = '$date' AND quantity = '$quantity'";
            mysqli_query($linkDB, $sql);
        }
        header("Location: suppliermyorders.php"); // Redirect back to the orders page
    }
}
?>