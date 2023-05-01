<?php
    include("../linkDB.php");

    if (isset($_POST['update'])) {
        $item_id = $_POST['item_id'];
        $item_name = $_POST['item_name'];
        $quantity = $_POST['quantity'];

        $sql = "UPDATE first_aid SET item_name='$item_name', quantity='$quantity' WHERE item_id=$id";

        $res = mysqli_query($linkDB, $sql);

        if ($res == TRUE) {
            header('location: managerfirstaidrecords.php');
        } else {
            echo "Error updating data: " . mysqli_error($linkDB);
        }
    }
?>
