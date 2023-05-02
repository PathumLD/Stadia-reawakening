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
    <link rel="stylesheet" href="../css/coach/coachprofile.css">
 
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

        <?php include('../include/coachnavbar.php'); ?>

    </nav>

    <div class="home-content">

        <div class="main-content">

          <?php $var = $_SESSION['email']; ?>

          <h1>My Profile</h1>

          <div class="content">

                <div class="profiledata">
                          
                <table id="tableprofile">   

                    <?php

                          $sql = "SELECT * FROM users WHERE email = '".$var."'";

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
                                      <td><button class='open-button' onclick='openForm()'><i class='fa fa-pencil-square-o' ></i></button>
                                        <div class='form-popup' id='myForm'>
                                          <form class='form-container' action='' method='POST'>
                                        
                                            <label for='phone'><b>Update Phone</b></label>
                                            <input type='tel' placeholder='Enter phone' name='phone' pattern='[0-9]{10}'required>
                                        
                                            <input type='submit' class='btn' id='update-btn' name='update' value='Update'>
                                            <button type='button' class='cancelbtn' onclick='closeForm()'><i class='fa fa-times' ></i></button>
                                          </form>
                                        </div></td>
                                      </tr>

                                      <td class='mylabel'>Date of Birth:</td>
                                      <td class='mydata'>".$row['dob']."</td>
                                      </tr>
                                      <td class='mylabel'>NIC / Guardian NIC:</td>
                                      <td class='mydata'>".$row['NIC']."</td>
                                      </tr>

                                      <td class='mylabel'>Emergency Contact Number:</td>
                                      <td class='mydata'>".$row['emphone']."</td>
                                      <td><button class='open-button' onclick='openForm2()'><i class='fa fa-pencil-square-o' ></i></button>
                                        <div class='form-popup' id='myForm2'>
                                          <form class='form-container' action='' method='POST'>
                                        
                                            <label for='emphone'><b>Emergency Contact Number</b></label>
                                            <input type='tel' placeholder='Enter number' name='emphone' pattern='[0-9]{10}'required>
                                        
                                            <input type='submit' class='btn' id='update-btn' name='update2' value='update'>
                                            <button type='button' class='cancelbtn' onclick='closeForm2()'><i class='fa fa-times' ></i></button>
                                          </form>
                                        </div></td>
                                      </tr>
                                      
                                      <td class='mylabel'>Emergency Contact Name:</td>
                                      <td class='mydata'>".$row['emname']."</td>
                                      <td><button class='open-button' onclick='openForm3()'><i class='fa fa-pencil-square-o' ></i></button>
                                        <div class='form-popup' id='myForm3'>
                                          <form class='form-container' action='' method='POST'>
                                        
                                            <label for='emname'><b>Emergency Contact Name</b></label>
                                            <input type='text' placeholder='Enter name' name='emname' required>
                                        
                                            <input type='submit' class='btn' id='update-btn' name='update3' value='update'>
                                            <button type='button' class='cancelbtn' onclick='closeForm3()'><i class='fa fa-times' ></i></button>
                                          </form>
                                        </div></td>
                                      </tr>";
                                  
                              }
                          }

                    ?>

                </table>     

                          
                          
                </div>

                <div class="cv">

                

                    <div class="button">
                        <a href="coachchangepassword.php"> Change Password </a>
                        <a href="coachupdateprofilephoto.php">Update Profile Photo</a>
                        <a href="coachuploadcv.php">Upload CV</a>
                    </div>    

                        

                </div>

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

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
<script>
function openForm2() {
  document.getElementById("myForm2").style.display = "block";
}

function closeForm2() {
  document.getElementById("myForm2").style.display = "none";
}
</script>
<script>
function openForm3() {
  document.getElementById("myForm3").style.display = "block";
}

function closeForm3() {
  document.getElementById("myForm3").style.display = "none";
}
</script>

<?php
if(isset($_POST['update'])) {
$phone=$_POST['phone'];
$var = $_SESSION['email'];

$query = "UPDATE users SET phone=$phone WHERE email = '".$var."' ";

$res = mysqli_query($linkDB, $query); 

if($res){
  echo "<script>window.location.href='coachprofile.php'; </script>";

}
else{
  echo "Could not update the profile - please try again.";
}

}
?>

<?php
if(isset($_POST['update2'])) {
$emphone=$_POST['emphone'];
$var = $_SESSION['email'];

$query = "UPDATE users SET emphone=$emphone WHERE email = '".$var."' ";

$res = mysqli_query($linkDB, $query) or die(mysqli_error($linkDB)); 

if($res){
  echo "<script>window.location.href='coachprofile.php'; </script>";

}
else{
  echo "Could not update the profile - please try again.";
}
}
?>

<?php
if(isset($_POST['update3'])) {
$emname=$_POST['emname'];
$var = $_SESSION['email'];

$query = "UPDATE users SET emname= '$emname' WHERE email = '".$var."' ";

$res = mysqli_query($linkDB, $query) or die(mysqli_error($linkDB)); 
    
if($res){
  echo "<script>window.location.href='coachprofile.php'; </script>";

}
else{
  echo "Could not update the profile - please try again.";
}

}
?>