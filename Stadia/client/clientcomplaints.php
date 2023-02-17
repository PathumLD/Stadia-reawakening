<!-- <?php include("../linkDB.php"); //database connection function ?> -->


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

          <div class="content">

            <?php $var = $_SESSION['email']; ?>

            <h1>My Complaints</h1>

            <table class="table">

                <tr>

                    <th>Subject</th>
                    <th>Details</th>
                    <th>Date Time</th>

                </tr>
                
                <?php

                    $query = "SELECT * FROM complaints WHERE email = '".$var."'" ;
                    $res = mysqli_query($linkDB, $query); 
                            if($res == TRUE) 
                            {
                                $count = mysqli_num_rows($res); //calculate number of rows
                                if($count>0)
                                {
                                    while($rows=mysqli_fetch_assoc($res))
                                    {
                                    
                                        $subject=$rows['subject'];
                                        $details=$rows['details'];
                                        $datetime=$rows['datetime']
                                    ?>
                                    <tr>
                                                <td><?php echo $subject; ?> </td>
                                                <td><?php echo $details; ?></td>
                                                <td><?php echo $datetime; ?></td>
                                            </tr>
                                            <?php
                                    }
                                }    

                            } 
                    ?>

            </table>
            
            <div class="form" id="submitComplaint">

                <form method="POST" >
            
                    <input type="text" name="subject" placeholder="Subject" required> 
                    <textarea id="details" name="details"  required>Enter Your Complaint Here... </textarea><br><br>
                    <input type="submit" name="submit" value="Submit" class="btn">
                
                </form>

            </div>

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

if(isset($_POST['submit'])){
  
include('linkDB.php');  

$subject = $_POST['subject'];
$details = $_POST['details'];
$email = $_SESSION['email'];



$sql = "INSERT INTO complaints (subject, details, email, datetime)
VALUES ('$subject', '$details' , '$email' , CURRENT_TIMESTAMP)";

$rs= mysqli_query($linkDB,$sql);

if($rs){
  //header("location : http://localhost/stadia/clientviewcomplaints.php");
  echo "<script>window.location.href='clientcomplaints.php'; </script>";

}
else{
  $error3="<p>Could not submit the complaint - please try again.</p>";
}
 
}
?>