<?php
require '../linkDB.php';
$_SESSION["id"] = 3; // User's session
$sessionId = $_SESSION["id"];
$user = mysqli_fetch_assoc(mysqli_query($linkDB, "SELECT * FROM profile_photo WHERE id = $sessionId"));
?>


<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Stadia </title>

    <link rel="stylesheet" href="styles.css">
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

            <h1>photo</h1>

            <div class="content">

            <form class="form" id = "form" action="" enctype="multipart/form-data" method="post">
                <div class="upload">
                    <?php
                    $id = $user["id"];
                    $name = $user["name"];
                    $image = $user["image"];
                    $email = $_SESSION['email'];
                    ?>
                    <img src="../img/<?php echo $image; ?>" width = 125 height = 125 title="<?php echo $image; ?>">
                    <div class="round">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="hidden" name="name" value="<?php echo $name; ?>">
                    <input type="file" name="image" id = "image" accept=".jpg, .jpeg, .png">
                    <input type="hidden" name="email" value="<?php echo $email; ?>">
                    <i class = "fa fa-camera" style = "color: #fff;"></i>
                    </div>
                </div>
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

<script type="text/javascript">
      document.getElementById("image").onchange = function(){
          document.getElementById("form").submit();
      };
    </script>
    <?php
    if(isset($_FILES["image"]["name"])){
      $id = $_POST["id"];
      $name = $_POST["name"];
      $email = $_SESSION['email'];

      $sql = "INSERT INTO profile_photo (email) VALUES ('$email')";
      $rs= mysqli_query($linkDB,$sql);

      if($rs){

      $imageName = $_FILES["image"]["name"];
      $imageSize = $_FILES["image"]["size"];
      $tmpName = $_FILES["image"]["tmp_name"];

      // Image validation
      $validImageExtension = ['jpg', 'jpeg', 'png'];
      $imageExtension = explode('.', $imageName);
      $imageExtension = strtolower(end($imageExtension));
      if (!in_array($imageExtension, $validImageExtension)){
        echo
        "
        <script>
          alert('Invalid Image Extension');
          document.location.href = 'clientphoto.php';
        </script>
        ";
      }
      elseif ($imageSize > 1200000){
        echo
        "
        <script>
          alert('Image Size Is Too Large');
          document.location.href = 'clientphoto.php';
        </script>
        ";
      }
      else{
        $newImageName = $name . " - " . date("Y.m.d") . " - " . date("h.i.sa"); // Generate new image name
        $newImageName .= '.' . $imageExtension;
        $query = "UPDATE profile_photo SET image = '$newImageName' WHERE id = $id";
        mysqli_query($linkDB, $query);
        move_uploaded_file($tmpName, '../img/' . $newImageName);
        echo
        "
        <script>
        document.location.href = 'clientphoto.php';
        </script>
        ";
      }
    }
  }
    ?>