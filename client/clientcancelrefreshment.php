<?php session_start(); ?>
<?php
    include("../linkDB.php");

    $id = $_GET['id'];
    $sql = "DELETE FROM client_refreshments WHERE id=$id";

    $res = mysqli_query($linkDB, $sql);

    if ($res==TRUE)
    {
        header('location: clientmyfacilities.php');
    }
    else
    {
        header('location: clientmyfacilities.php');
    }
?>