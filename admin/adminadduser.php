<?php include("../linkDB.php"); //database connection function 
session_start(); // Start session
?>

<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title> Stadia </title>

  <!-- Fontawesome CDN Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <?php include('../include/javascript.php'); ?>
  <?php include('../include/styles.php'); ?>

</head>

<body onload="initClock()">

  <div class="sidebar">

    <?php include('../include/adminsidebar.php'); ?>

  </div>

  <section class="home-section">

    <nav>

      <?php include('../include/adminnavbar.php'); ?>

    </nav>

    <div class="home-content">

      <div class="main-content">


        <div class="form">
          <h1>Add New User</h1>
          <form method="post">
            <p class="add">Email</p>
            <input type="email" name="Email">
            <p class="add">Username</p>
            <input type="text" name="Username">
            <p class="add">Password</p>
            <input type="password" name="Password">
            <br>
            <p class="add">Role</p>
            <select name="role_search" class="search" id="disable">
              <option value="" disabled selected>Search by Role</option>
              <option value="admin">Admin</option>
              <option value="Manager">Manager</option>
              <option value="Coach">Coach</option>
              <option value="Client">Client</option>
              <option value="Equipment Manager">Equipment Manager</option>
              <option value="external supplier">External supplier</option>
            </select>
            <br><br>
            <button type="submit" class="btn">Confirm Add</button>
          </form>
        </div>

      </div>

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
    dropdown[i].addEventListener("click", function () {
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
//------ PHP code for add user---
$error = "";

//Taking HTML Form Data from User
$Email = mysqli_real_escape_string($linkDB, $_POST['Email']);
$Username = mysqli_real_escape_string($linkDB, $_POST['Username']);
$Password = mysqli_real_escape_string($linkDB, $_POST['Password']);
$role = mysqli_real_escape_string($linkDB, $_POST['role_search']);

$query = "SELECT User_Id FROM adminuser WHERE Username = '$Username'";
$result = mysqli_query($linkDB, $query);
if (mysqli_num_rows($result) > 0) {
  $error .= "<p>This username has taken already!</p>";
} else {

  //Password hashing
  $hashedPassword = password_hash($Password, PASSWORD_DEFAULT);
  $query = "INSERT INTO adminuser (Email,Username, Password, Type) VALUES ('$Email','$Username', '$hashedPassword', '$role')";

  if (!mysqli_query($linkDB, $query)) {
    $error = "<p>Could not sign you up - please try again.</p>";
  } else {
     // Generate random password
  $password = substr(md5(mt_rand()), 0, 8);
  $hashedPassword = md5($password);
   // Update user's password in the database
   $query = "UPDATE adminuser SET Password = '$hashedPassword' WHERE User_Id = " . mysqli_insert_id($linkDB);
   mysqli_query($linkDB, $query);
  
    //session variables to keep user logged in
    $_SESSION['User_Id'] = mysqli_insert_id($linkDB);
    $_SESSION['Username'] = $Username;
     // Send email to user with username and password
  $to = $Email;
  $subject = "Welcome to Stadia";
  $message = "Hello $Username,\n\nYour Stadia account has been created with the following credentials:\n\nUsername: $Username\nPassword: $password\n\nPlease log in to the Stadia website using these credentials and change your password as soon as possible.\n\nRegards,\nThe Stadia Team";
  $headers = "From: stadia@gmail.com" . "\r\n" .
             "Reply-To: stadia@gmail.com". "\r\n" .
             "X-Mailer: PHP/" . phpversion();

  if(mail($to, $subject, $message, $headers)) {
    // Show success message
    echo '<script>alert("This user is added successfully and email sent");</script>';
  } else {
    // Show error message
    echo '<script>alert("This user is added successfully but there was an error sending the email");</script>';
  }
}
}
?>

