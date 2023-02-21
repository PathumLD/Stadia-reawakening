<?php  
// Database configuration  
$dbHost     = "localhost";  
$dbUsername = "root";  
$dbPassword = "";  
$dbName     = "stadia-new";  
  
// Create database connection  
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);  
  
// Check connection  
if ($db->connect_error) {  
    die("Connection failed: " . $db->connect_error);  
}
?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
     <?php include('styles.php'); ?>

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
     
     <title>Test</title>
     
 </head>
 <body>
 <div class="container">
 <!---------- NAVIGATION BAR ---------->    

 <div class="topnav">
 
 <?php include('topnav.php'); ?>

    </div>
  <div class= "wrapper">
  <?php include('clientsidebar.php'); ?> 
        
    </div>
    <div class= "main_content">
     <h1>test </h1>
                      <!--------Cancel Booking------>
                      <form action="" method="post" enctype="multipart/form-data">
    <label>Select Image File:</label>
    <input type="file" name="image">
    <input type="submit" name="submit" value="Upload">
</form>
    </div>


  </div>
  <?php $var = $_SESSION['email']; ?>
 

 <!---------- Footer ----------> 

 <div class="footer">
     <a href="facebook.com"> <img alt="facebook logo" src="pics/fblogo.png" width="30" height="30"> </a>
    <a href="instagram.com" ><img alt="instagram logo" src="pics/iglogo.png" width="30" height="30"> </a>
    <a href="whatsapp.com" ><img alt="whatsapp logo" src="pics/walogo.png" width="30" height="30"> </a>
    <a href="twitter.com" ><img alt="twitter logo" src="pics/twlogo.jpg" width="30" height="30"> </a>
    <a href="about.php">About</a> <a href="photos.php">Photos</a>
 
  </div>
  
</div>


 </body>
 </html>

 <?php
 
// If file upload form is submitted 
$status = $statusMsg = ''; 
if(isset($_POST["submit"])){ 
    $status = 'error'; 
    if(!empty($_FILES["image"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 
         
            // Insert image content into database 
            $insert = $db->query("INSERT into images (image, created) VALUES ('$imgContent', NOW())"); 
             
            if($insert){ 
                $status = 'success'; 
                $statusMsg = "File uploaded successfully."; 
            }else{ 
                $statusMsg = "File upload failed, please try again."; 
            }  
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
        } 
    }else{ 
        $statusMsg = 'Please select an image file to upload.'; 
    } 
} 
 
// Display status message 
echo $statusMsg; 
?>

<?php
$result = $db->query("SELECT image FROM images ORDER BY id DESC"); 
?>

<?php if($result->num_rows > 0){ ?> 
    <div class="gallery"> 
        <?php while($row = $result->fetch_assoc()){ ?> 
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" /> 
        <?php } ?> 
    </div> 
<?php }else{ ?> 
    <p class="status error">Image(s) not found...</p> 
<?php } ?>
