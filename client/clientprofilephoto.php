<?php session_start(); ?>
<?php include("../linkDB.php"); //database connection function ?> 
<?php $var = $_SESSION['email']; ?>

<link rel="stylesheet" href="../css/photo.css">
<div class="profilepic">
<?php
    // Check if the form was submitted
    if(isset($_POST['submit'])) {
        
        // Upload the image to a temporary location
        $tempname = $_FILES['image']['name'];
        $folder = "../img/";
        $target_file = $folder . basename($tempname);
        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
        $email = $_SESSION['email'];
        
        // Store the image file name in the database
        $sql = "INSERT INTO images (filename, email) VALUES ('$tempname', '$email')";
        mysqli_query($linkDB, $sql);
        
        // Retrieve the image from the database
        $result = mysqli_query($linkDB, "SELECT * FROM images WHERE email = '".$var."'");
        $row = mysqli_fetch_array($result);
        $filename = $row['filename'];
        
        // Display the image on the web page
        echo '<img src="' . $folder . $filename . '">';
        
        // Close the database connection
        mysqli_close($linkDB);
    }
?>
</div>

<!-- HTML form to upload the image -->
<form method="post" enctype="multipart/form-data">
    <input type="file" name="image">
    <input type="submit" name="submit" value="Upload">
</form>
