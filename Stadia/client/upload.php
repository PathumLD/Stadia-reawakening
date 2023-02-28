<?php session_start();?>
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

            <h1>Upload CV</h1>

            <div class="content"></div>

            <form action="" method="POST" enctype="multipart/form-data">
                <label for="file">Select a file to upload:</label>
                <input type="file" name="file" id="file"><br>
                <input type="submit" name="submit" value="Upload">
            </form>
            
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
if(isset($_POST['submit'])) {
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "stadia";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	// File details
	$file_name = $_FILES['file']['name'];
	$file_size = $_FILES['file']['size'];
	$file_type = $_FILES['file']['type'];
	$file_temp = $_FILES['file']['tmp_name'];

	// Read file 
	$fp = fopen($file_temp, 'r');
	$content = fread($fp, filesize($file_temp));
	$content = addslashes($content);
	fclose($fp);

	// Insert file data into database
	$sql = "INSERT INTO files (name, size, type, content) VALUES ('$file_name', '$file_size', '$file_type', '$content')";

	if (mysqli_query($conn, $sql)) {
		echo "File uploaded successfully.";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	// Close connection
	mysqli_close($conn);
}
?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stadia";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

// Retrieve file data from database
$sql = "SELECT * FROM files";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		$file_name = $row['name'];
		$file_size = $row['size'];
		$file_type = $row['type'];
		$file_content = $row['content'];
		echo "<a href='upload2.php?id=".$row['id']."'>".$file_name."</a><br>";
	}
} else {
	echo "No files found.";
}

// Close connection
mysqli_close($conn);
?>

<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "stadia";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	if (isset($_GET['id'])) {
		$id = $_GET['id'];

		// Retrieve file data from database
		$sql = "SELECT * FROM files WHERE id='$id'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_assoc($result);
			$file_name = $row['name'];
			$file_type = $row['type'];
			$file_size = $row['size'];
			$file_content = $row['content'];

			// Embed file content within iframe
			echo "<iframe srcdoc='" . $file_content . "'></iframe>";
			exit;
		} else {
			echo "File not found.";
		}
	}

	// Close connection
	mysqli_close($conn);
?>

			