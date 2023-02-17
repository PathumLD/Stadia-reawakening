<?php
// Open a new connection to the MySQL server
$linkDB = mysqli_connect("127.0.0.1:3300","root","","stadia-new");  
  if (mysqli_connect_error()){ //for connection error finding
  die ('There was an error while connecting to database');
  }
    ?>