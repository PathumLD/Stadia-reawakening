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

            <h1>My Facilities</h1>

            <div class="content">

            <h3> NOTE: To cancel refreshments ordered you have to cancel it atleast 3 days prior to the order date. </h3>

            <table class="table">

            <caption id="cap"> Refreshments </caption>

                <tr>

                    <th>Date</th>
                    <th>Time</th>
                    <th>Item Name</th>
                    <th>Ordered Quantity</th>
                    <th>Action</th>

                </tr>
                
                    <?php
                        $query = "SELECT * FROM client_refreshments WHERE status=1 AND email = '".$var."'";
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
                                                    <td>" . $rows["itemname"].  "</td>
                                                    <td>" . $rows["orderedquantity"]."</td>
                                                    <td> <button class='submit-button' onclick='confirmRowData($id)'><i class='fa fa-trash'></i></button> 
                                                        <a href='clientupdaterefreshment.php?id=$id; ?>'><i class='fa fa-pencil-square-o' ></i></a> </td>
                                                </tr>";
                                        }
                                    } else {
                                        echo "0 results";
                                    }
                                }    
                    ?>

                
            </table>

            <table class="table">   

            <caption id="cap"> Equipment </caption>

                <tr>

                    <th>Date</th>
                    <th>Item Name</th>
                    <th>Ordered Quantity</th>
                    <th>Action</th>
                    
                </tr>

                <?php
                    $query = "SELECT * FROM ordered_equipment WHERE status=1 AND email = '".$var."'";
                    $res = mysqli_query($linkDB, $query); 
                            if($res == TRUE) 
                            {
                                $count = mysqli_num_rows($res); //calculate number of rows
                                if($count>0)
                                {
                                    while($rows=mysqli_fetch_assoc($res))
                                    {
                                        $id=$rows['id'];
                                        echo "<tr id='row__$id'>
                                                <td>" . $rows["date"]. "</td>
                                                <td>" . $rows["itemname"]. "</td>
                                                <td>" . $rows["orderedquantity"]. "</td>
                                                <td><button class='submit-button' onclick='confirmRowData2($id)'><i class='fa fa-trash'></i></button>
                                                    <a href='clientupdateequipment.php?id=$id; ?>'><i class='fa fa-pencil-square-o' ></i> </a> </td>
                                            </tr>";
                                    }
                                } else {
                                    echo "0 results";
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
  var item_name = row.cells[2].innerHTML;
  var ordered_quantity = row.cells[3].innerHTML;

  // Create a custom confirm box
  var confirmBox = document.createElement('div');
  confirmBox.classList.add('confirm-box');
  confirmBox.innerHTML = '<h2>Confirm Cancellation?</h2><p>Order Details:</p><ul><li>Date: ' + date + '</li><li>Time: ' + time + '</li><li>Item: ' + item_name + '</li><li>Ordered Quantity: ' + ordered_quantity + '</li></ul><h4><p>NOTE: We will be only refunding 75% of your payment per each cancellation</p></h4><button id="confirm-button">Confirm</button><button id="cancel-button">Cancel</button>';

  // Add the confirm box to the page
  document.body.appendChild(confirmBox);

  // Add event listeners to the confirm and cancel buttons
  var confirmButton = document.getElementById('confirm-button');
  var cancelButton = document.getElementById('cancel-button');
  confirmButton.addEventListener('click', function() {
    // Redirect to the clientcancelrefreshment.php page
    window.location.href = 'clientcancelrefreshment.php?id=' + id;
  });
  cancelButton.addEventListener('click', function() {
    // Remove the confirm box from the page
    document.body.removeChild(confirmBox);
  });
}
</script>

<script>
function confirmRowData2(id) {
  // Get the row with the booking data
  var row = document.getElementById('row__' + id);

  // Get the booking data from the row
  var date = row.cells[0].innerHTML;
  var item_name = row.cells[1].innerHTML;
  var ordered_quantity = row.cells[2].innerHTML;

  // Create a custom confirm box
  var confirmBox = document.createElement('div');
  confirmBox.classList.add('confirm-box');
  confirmBox.innerHTML = '<h2>Confirm Cancellation?</h2><p>Order Details:</p><ul><li>Date: ' + date + '</li><li>Item: ' + item_name + '</li><li>Ordered Quantity: ' + ordered_quantity + '</li></ul><h4><p>NOTE: We will be only refunding 75% of your payment per each cancellation</p></h4><button id="confirm-button">Confirm</button><button id="cancel-button">Cancel</button>';

  // Add the confirm box to the page
  document.body.appendChild(confirmBox);

  // Add event listeners to the confirm and cancel buttons
  var confirmButton = document.getElementById('confirm-button');
  var cancelButton = document.getElementById('cancel-button');
  confirmButton.addEventListener('click', function() {
    // Redirect to the clientcancelequipment.php page
    window.location.href = 'clientcancelequipment.php?id=' + id;
  });
  cancelButton.addEventListener('click', function() {
    // Remove the confirm box from the page
    document.body.removeChild(confirmBox);
  });
}
</script>