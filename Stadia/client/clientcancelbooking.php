<?php
    include("../linkDB.php");

    $id = $_GET['id'];
    $sql = "DELETE FROM bookings WHERE id=$id";

    $res = mysqli_query($linkDB, $sql);

    if ($res==TRUE)
    {
        header('location: clientbookings.php');
    }
    else
    {
        header('location: clientbookings.php');
    }
?>