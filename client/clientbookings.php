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

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
     
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

            <h1>My Bookings</h1>

            <div class="content">

            <table id="searchtable">
              <tr>
                <td>
                    <form method="post">
                        <input type="text" name="search" class="search" onfocus="(this.type = 'date')" placeholder="Search by Date">
                        <input type="submit" name="go" value="Search" id="searchbtn">
                    </form>
                </td>
                <td>
                    <form method="post">
                            <select name="court_search" class="search" id="disable">
                                <option value="" disabled selected>Search by Court</option>
                                <option value="Badminton">Badminton</option>
                                <option value="Basketball">Basketball</option>
                                <option value="Volleyball">Volleyball</option>
                                <option value="Tennis">Tennis</option>
                                <option value="Swimming">Swimming</option>
                            </select>
                        <input type="submit" name="go2" value="Search" id="searchbtn">
                        <a href="clientbookings.php"><input type="submit" value="reset" id = "resetbtn"></a>
                    </form>
                </td>
              </tr>
            </table>

              <table class="table">

                  <tr>
                      <th>Date</th>
                      <th>Time</th>
                      <th>Court</th>    
                      <th>Action</th>
                  </tr>

                  <?php

                      if(isset($_POST['go'])){
                                          
                          $search = $_POST['search'];

                          $query = "SELECT * FROM bookings WHERE date LIKE '%$search%' AND status=1 AND email = '".$var."'";
                          $res = mysqli_query($linkDB, $query); 
                          if($res == TRUE) 
                          {
                              $count = mysqli_num_rows($res); //calculate number of rows
                              if($count>0)
                              {
                                  while($rows=mysqli_fetch_assoc($res))
                                  {
                                      $id=$rows['id'];
                                      echo "<tr id='row_$id'>
                                              <td>" . $rows["date"]. "</td>
                                              <td>" . $rows["time"]. "</td>
                                              <td>" .$rows["court"]. "</td>
                                              <td><button class='submit-button' onclick='confirmRowData($id)'><i class='fa fa-trash'></i></button></td>
                                          </tr>";
                                  }
                              } else {
                                  echo "0 results";
                              }
                          }
                      } 
                      else{                  

                        if(isset($_POST['go2'])){
                                            
                            $court_search = $_POST['court_search'];

                            $query = "SELECT * FROM bookings WHERE court LIKE '%$court_search%' AND status=1 AND email = '".$var."'";
                            $res = mysqli_query($linkDB, $query); 
                            if($res == TRUE) 
                            {
                                $count = mysqli_num_rows($res); //calculate number of rows
                                if($count>0)
                                {
                                    while($rows=mysqli_fetch_assoc($res))
                                    {
                                        $id=$rows['id'];
                                        echo "<tr id='row_$id'>
                                                <td>" . $rows["date"]. "</td>
                                                <td>" . $rows["time"]. "</td>
                                                <td>" .$rows["court"]. "</td>
                                                <td><button class='submit-button' onclick='confirmRowData($id)'><i class='fa fa-trash'></i></button></td>
                                            </tr>";
                                    }
                                } else {
                                    echo "0 results";
                                }
                            }
                        } 
                        else{
                            $query = "SELECT * FROM bookings WHERE status=1 AND email = '".$var."'";
                            $res = mysqli_query($linkDB, $query); 
                            if($res == TRUE) 
                            {
                                $count = mysqli_num_rows($res); //calculate number of rows
                                if($count>0)
                                {
                                    while($rows=mysqli_fetch_assoc($res))
                                    {
                                        $id=$rows['id'];
                                        echo "<tr id='row_$id'>
                                                <td>" . $rows["date"]. "</td>
                                                <td>" . $rows["time"]. "</td>
                                                <td>" .$rows["court"]. "</td>
                                                <td><button class='submit-button' onclick='confirmRowData($id)'><i class='fa fa-trash'></i></button></td>
                                            </tr>";
                                    }
                                } else {
                                    echo "0 results";
                                }
                            }
                        }  
                      } 
                  ?>

              </table>
                    
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
function confirmRowData(id) {
  // Get the row with the booking data
  var row = document.getElementById('row_' + id);

  // Get the booking data from the row
  var date = row.cells[0].innerHTML;
  var time = row.cells[1].innerHTML;
  var court = row.cells[2].innerHTML;

  // Create a custom confirm box
  var confirmBox = document.createElement('div');
  confirmBox.classList.add('confirm-box');
  confirmBox.innerHTML = '<h2>Confirm Cancellation?</h2><p>Booking Details:</p><ul><li>Date: ' + date + '</li><li>Time: ' + time + '</li><li>Court: ' + court + '</li></ul><h4><p>NOTE: We will be only refunding 75% of your payment per each cancellation</p></h4><button id="confirm-button">Confirm</button><button id="cancel-button">Cancel</button>';

  // Add the confirm box to the page
  document.body.appendChild(confirmBox);

  // Add event listeners to the confirm and cancel buttons
  var confirmButton = document.getElementById('confirm-button');
  var cancelButton = document.getElementById('cancel-button');
  confirmButton.addEventListener('click', function() {
    // Redirect to the clientcancelclass.php page
    window.location.href = 'clientcancelbooking.php?id=' + id;
  });
  cancelButton.addEventListener('click', function() {
    // Remove the confirm box from the page
    document.body.removeChild(confirmBox);
  });
}
</script>