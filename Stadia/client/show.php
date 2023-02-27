<?php include("../linkDB.php"); //database connection function ?> 


<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Stadia </title>
    
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 
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

            <h1>Show CV</h1>

            <div class="content">
	<?php
		// Database connection settings
		$host = "localhost";
		$username = "root";
		$password = "";
		$dbname = "stadia-new";

		// Create connection
		$conn = mysqli_connect($host, $username, $password, $dbname);

		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		// Get the file ID from the URL parameter
		$file_id = $_GET["id"];

		// Retrieve the file from the database
		$sql = "SELECT * FROM files WHERE email = '".$var."'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_assoc($result);
			$filename = $row["filename"];
			$filetype = $row["filetype"];
			$filedata = $row["filedata"];

			// Send the file to the browser
			header("Content-type: $filetype");
			header("Content-Disposition: attachment; filename=\"$filename\"");
			echo $filedata;
		} else {
			echo "File not found.";
		}

		// Close connection
		mysqli_close($conn);
	?>
</body>
</html>
