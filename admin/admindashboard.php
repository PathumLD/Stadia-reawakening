<?php include("../linkDB.php"); //database connection function ?>


<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title> Stadia </title>

  <!-- Fontawesome CDN Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
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
        <div class="overview-boxes">
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Booked Slots</div>
              <div class="number">40</div>
              <div class="indicator">
                <i class='bx bx-up-arrow-alt'></i>
                <span class="text">Up from this week</span>
              </div>
            </div>
            <i class='bx bx-cart-alt cart'></i>
          </div>
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Remain Slots</div>
              <div class="number">20</div>
              <div class="indicator">
                <i class='bx bx-up-arrow-alt'></i>
                <span class="text">Up from this week</span>
              </div>
            </div>
            <i class='bx bxs-cart-add cart two'></i>
          </div>
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Verified Slots</div>
              <div class="number">25</div>
              <div class="indicator">
                <i class='bx bx-up-arrow-alt'></i>
                <span class="text">Up from this week</span>
              </div>
            </div>
            <i class='bx bx-cart cart three'></i>
          </div>
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Cancel Slots</div>
              <div class="number">15</div>
              <div class="indicator">
                <i class='bx bx-up-arrow-alt'></i>
                <span class="text">Up from this week</span>
              </div>
            </div>
            <i class='bx bx-cart cart three'></i>
          </div>
        </div>
      </div>
    </div>
<div class="main-content">
  <div class="text-box-right">
    <div class="title">Users of the System</div>
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