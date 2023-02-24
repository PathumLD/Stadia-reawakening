<!-- <?php include("../linkDB.php"); //database connection function ?> -->


<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Profile </title>
    
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <?php include('../include/javascript.php'); ?>
     <?php include('../include/styles.php'); ?>

   </head>
<body onload="initClock()">

<div class="sidebar">

    <?php include('../include/coachsidebar.php'); ?>

</div>

<section class="home-section">

    <nav>

        <?php include('../include/navbar.php'); ?>

    </nav>

    <div class="home-content">

        <div class="main-content">

            <h1>My Profile</h1>


    <div class="content">
        <table id="tableprofile">   

            <?php $var = $_SESSION['email']; ?>
            
            <?php

                $sql = "SELECT fname, lname, gender, NIC, phone, dob, emphone, emname
                FROM users WHERE email = '".$var."'";

                $result = $linkDB->query($sql);

                if ($result-> num_rows>0){
                    while($row = $result->fetch_assoc()){

                        echo "<tr>

                        <td class='mylabel'>Name:</td>
                        <td class='mydata'>".$row['fname']." ".$row['lname']."</td>
                        </tr>
                        <td class='mylabel'>Gender:</td>
                        <td class='mydata'>".$row['gender']."</td>
                        </tr>
                        <td class='mylabel'>Phone:</td>
                        <td class='mydata'>".$row['phone']."</td>
                        <td><a href='clientupdatephone.php'><i class='fa fa-pencil-square-o' ></i></a></td>
                        </tr>
                        <td class='mylabel'>Date of Birth:</td>
                        <td class='mydata'>".$row['dob']."</td>
                        </tr>
                        <td class='mylabel'>NIC / Guardian NIC:</td>
                        <td class='mydata'>".$row['NIC']."</td>
                        </tr>
                        <td class='mylabel'>Emergency Contact Number:</td>
                        <td class='mydata'>".$row['emphone']."</td>
                        <td><a href='clientupdateemphone.php'><i class='fa fa-pencil-square-o' ></i></td>
                        </tr>
                        <td class='mylabel'>Emergency Contact Name:</td>
                        <td class='mydata'>".$row['emname']."</td>
                        <td><a href='clientupdateemname.php'><i class='fa fa-pencil-square-o' ></i></td>
                        </tr>";
                        
                        
                    }
                }

                ?>

</table>

                  <div class="button">
                    <a href="coachchangepassword.php"> Change Password </a>
                    <a href="coachprofilephoto.php">Update Profile Photo</a>
                  </div>

</div>

<div>
    </div>

    <footer>
        <div class="foot">
            <span>Created By <a href="#">Stadia.</a> | &#169; 2023 All Rights Reserved</span>
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