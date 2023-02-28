<?php session_start(); ?>
<?php include("../linkDB.php"); //database connection function ?> 

<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Stadia </title>
    
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/client.css">
 
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

            <h1>Update Emergency Contact Phone Number</h1>

            <div class="content">

            <form action="" method="POST">
                
                <label for="Mobile Number"><b>Emergency Contact Number</b></label><br>
                <input type="text" placeholder="Enter Emergency Contact Number" name="emphone" required><br>
                
            
                <hr>
            
                <input type="submit" name="submit" ></input>
            
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
$emphone=$_POST['emphone'];
$var = $_SESSION['email'];

$query = "UPDATE users SET emphone=$emphone WHERE email = '".$var."' ";

$res = mysqli_query($linkDB, $query) or die(mysqli_error($linkDB)); 
    if($res==TRUE)
    {
      header('location: http://localhost/stadia/client/clientprofile.php');
      // $_SESSION[ 'add'] = "<p>Successfully Updated </p>";
      // header('location: clientprofile.php');

    }
    else 
    {
      $_SESSION['add'] = "<p>Failed to Update </p> ";
      header('location: http://localhost/learn3/profiles.php'); 
    }
}
?>