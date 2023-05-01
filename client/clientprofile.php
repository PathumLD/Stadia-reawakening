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
    <link rel="stylesheet" href="../css/client/clientprofile.css">
 
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

            <h1>My Profile</h1>

            <div class="content">

              <div class="left">

                <table id="tableprofile">   

                  <?php

                      $sql = "SELECT * FROM users WHERE email = '".$var."'";

                      $result = mysqli_query($linkDB, $sql);

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
                                  </tr>

                                  <td class='mylabel'>Date of Birth:</td>
                                  <td class='mydata'>".$row['dob']."</td>
                                  </tr>

                                  <td class='mylabel'>NIC / Guardian NIC:</td>
                                  <td class='mydata'>".$row['NIC']."</td>
                                  </tr>

                                  <td class='mylabel'>Emergency Contact Number:</td>
                                  <td class='mydata'>".$row['emphone']."</td>
                                  </tr>

                                  <td class='mylabel'>Emergency Contact Name:</td>
                                  <td class='mydata'>".$row['emname']."</td>
                                  </tr>";
                              
                          }
                      }

                      ?>
                </table>

                <div class="details"><h3>Update Your Details</h3></div><br>

                  <button class="btn" onclick="openPopup()">Change Password</button>

                  <button class="btn" onclick="openPopup1()">Change Phone Number</button>
                  <button class="btn" onclick="openPopup2()">Change Emergency Contact Number</button>
                  <button class="btn" onclick="openPopup3()">Change Emergency Contact Name</button>

          
              </div>

              <div class="right">

                <div class="top">

                  <h3>Profile Photo</h3>

                  <div class="profilepic">

                    <?php

                        // Retrieve the image from the database
                        $folder = "../img/";
                        $result = mysqli_query($linkDB, "SELECT * FROM users WHERE email = '".$var."'");
                        $row = mysqli_fetch_array($result);
                        $filename = $row['dp'];
                        
                        // Display the image on the web page
                        echo '<img src="' . $folder . $filename . '" alt ="dp">';

                    ?>

                    <!-- HTML form to upload the image -->
                    <table>
                      <tr>
                    <form method="post" enctype="multipart/form-data">
                      <td><label for="inputTag">
                        <i class="fa fa-2x fa-camera"></i>
                        <input type="file" id="inputTag" name="image" accept="image/*">
                      </label></td>
                      <td><span id="imageName"></span></td>
                      <td> <input type="submit" name="submit" value="Update"></td>
                    </form>
                    </tr>  
                  </table>

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
                            $sql = "UPDATE users SET dp='$tempname' WHERE email= '".$var."'";
                            $rs=mysqli_query($linkDB, $sql);

                            if($rs){
      
                              echo "<script>window.location.href='clientprofile.php'; </script>";
                            
                            }
                          }
                        ?>
                    
                  </div>
                      
                </div>

                <div class="bottom">

                  
                </div>

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


<script>
// Open the popup
function openPopup1() {
  document.getElementById("popup1").style.display = "block";
}

// Close the popup
function closePopup1() {
  document.getElementById("popup1").style.display = "none";
}
</script>

<div id="popup1" class="popup1">
  <div class="popup-content">
    <span class="close" onclick="closePopup1()">&times;</span>
    <h3>Change Phone Number</h3>
    <form method="post" >
    
      <label for='phone'>Update Phone</label>
      <input type='tel' placeholder='Enter phone' name='phone' pattern='[0-9]{10}'required>
                                    
      <input type='submit' class='btn' id='update-btn' name='update1' value='Update'>

    </form>
  </div>
</div>

<script>
// Open the popup
function openPopup2() {
  document.getElementById("popup2").style.display = "block";
}

// Close the popup
function closePopup2() {
  document.getElementById("popup2").style.display = "none";
}
</script>

<div id="popup2" class="popup2">
  <div class="popup-content">
    <span class="close" onclick="closePopup2()">&times;</span>
    <h3>Change Emergency Contact Number</h3>
    <form method="post" >
    
      <label for='emphone'>Update Contact Number</label>
      <input type='tel' placeholder='Enter number' name='emphone' pattern='[0-9]{10}'required>
                                    
      <input type='submit' class='btn' id='update-btn' name='update2' value='Update'>

    </form>
  </div>
</div>

<script>
// Open the popup
function openPopup3() {
  document.getElementById("popup3").style.display = "block";
}

// Close the popup
function closePopup3() {
  document.getElementById("popup3").style.display = "none";
}
</script>

<div id="popup3" class="popup3">
  <div class="popup-content">
    <span class="close" onclick="closePopup3()">&times;</span>
    <h3>Change Emergency Contact Number</h3>
    <form method="post" >

      <label for='emname'>Update Contact Name</label>
      <input type='text' placeholder='Enter name' name='emname' required>
                                    
      <input type='submit' class='btn' id='update-btn' name='update3' value='Update'>

    </form>
  </div>
</div>

<?php
if(isset($_POST['update1'])) {
$phone=$_POST['phone'];
$var = $_SESSION['email'];

$query = "UPDATE users SET phone=$phone WHERE email = '".$var."' ";

$res = mysqli_query($linkDB, $query); 

if($res){
  echo "<script>window.location.href='clientprofile.php'; </script>";

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
  echo "<script>window.location.href='clientprofile.php'; </script>";

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

$query = "UPDATE users SET emname='$emname' WHERE email = '".$var."' ";

$res = mysqli_query($linkDB, $query) or die(mysqli_error($linkDB)); 
    
if($res){
  echo "<script>window.location.href='clientprofile.php'; </script>";

}
else{
  echo "Could not update the profile - please try again.";
}

}
?>

<script>
        let input = document.getElementById("inputTag");
        let imageName = document.getElementById("imageName")

        input.addEventListener("change", ()=>{
            let inputImage = document.querySelector("input[type=file]").files[0];

            imageName.innerText = inputImage.name;
        })
</script>

<div id="popup" class="popup">
  <div class="popup-content">
    <span class="close" onclick="closePopup()">&times;</span>
    <h3>Change Password</h3>
    <form method="post" >
    <label for="oldPassword">Old Password</label>
      <input type="password" id="oldPassword" name="oldPassword" required>

      <label for="newPassword">New Password</label>
      <input type="password" id="newPassword" name="newPassword" required>

      <label for="confirmPassword">Confirm New Password</label>
      <input type="password" id="confirmPassword" name="confirmPassword" required>

      <input type="submit" value="Change Password" name="changePassword" class="btn">

    </form>
  </div>
</div>

<script>
// Open the popup
function openPopup() {
  document.getElementById("popup").style.display = "block";
}

// Close the popup
function closePopup() {
  document.getElementById("popup").style.display = "none";
}
</script>

<?php
if(isset($_POST['changePassword'])) {
    $oldPassword = $_POST['oldPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];
    $var = $_SESSION['email'];
    
    // Retrieve the current password from the database
    $sql = "SELECT password FROM users WHERE email = '".$var."'";
    $result = mysqli_query($linkDB, $sql);
    
    if($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $currentPassword = $row['password'];
        
        // Verify if the old password matches the current password
        if(password_verify($oldPassword, $currentPassword)) {
            // Check if the new password and confirm password match
            if($newPassword === $confirmPassword) {
                // Hash the new password
                $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                
                // Update the password in the database
                $sqlUpdate = "UPDATE users SET password = '".$hashedPassword."' WHERE email = '".$var."'";
                $resultUpdate = mysqli_query($linkDB, $sqlUpdate);
                
                if($resultUpdate) {
                    echo "Password updated successfully.";
                } else {
                    echo "Could not update the password - please try again.";
                }
            } else {
                echo "New password and confirm password do not match.";
            }
        } else {
            echo "Old password is incorrect.";
        }
    }
}
?>

