<?php
    include("../linkDB.php");

    $id = $_GET['id'];
    $sql = "DELETE FROM client_classes WHERE id=$id";

    $res = mysqli_query($linkDB, $sql);

    if ($res==TRUE)
    {
        header('location: clientmyclasses.php');
    }
    else
    {
        header('location: clientmyclasses.php');
    }
?>