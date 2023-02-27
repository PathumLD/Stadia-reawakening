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

            <form action="" method="post" enctype="multipart/form-data">
                <label for="file">Select a file to upload:</label>
                <input type="file" name="file" id="file"><br>
                <input type="submit" value="Upload">
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
// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'stadia-new');

// Check connection
if ($linkDB->connect_error) {
    die("Connection failed: " . $linkDB->connect_error);
}

// Check if file has been uploaded
if (isset($_FILES['file'])) {
    // Get file information
    $fileName = $_FILES['file']['name'];
    $fileType = $_FILES['file']['type'];
    $fileSize = $_FILES['file']['size'];
    $fileContent = file_get_contents($_FILES['file']['tmp_name']);
    $email = $_SESSION['email'];

    // Prepare and execute the SQL statement
    $stmt = $linkDB->prepare("INSERT INTO files (name, type, size, content, email) VALUES (?, ?, ?, ?, '$email')");
    $stmt->bind_param("ssis", $fileName, $fileType, $fileSize, $fileContent);
    $stmt->execute();

    // Check if the file was successfully uploaded
    if ($stmt->affected_rows > 0) {
        echo "File uploaded successfully.";
    } else {
        echo "Error uploading file.";
    }
}
?>