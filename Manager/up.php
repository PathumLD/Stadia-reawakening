<?php session_start(); ?>
<!-- <?php include("../linkDB.php"); //database connection function ?> -->


<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Stadia </title>
    
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/manager.css">
 
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <?php include('../include/javascript.php'); ?>
     <?php include('../include/styles.php'); ?>

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

   </head>
<body onload="initClock()">

<div class="sidebar">

    <?php include('../include/managersidebar.php'); ?>

</div>

<section class="home-section">

    <nav>

        <?php include('../include/managernavbar.php'); ?>

    </nav>

    <div class="home-content">

        <div class="main-content">

          <div class="content">


            <h1>First-Aid Records</h1>
            

            <a href="manageraddfirstaid.php"><i class="fa fa-plus-circle" id="plus" style="font-size:36px;"></i></a>
            <table class="ps">
                <tr><td>    </td></tr>
               <tr><td> <form method="post">
                    <input type="text" name="search" class ="search" placeholder="Item name...">
                    <input type="submit" name="go" value="search" id = "searchbtn">
                    <input type="submit" name="reset" value="reset" id = "resetbtn">
                </form></td></tr>
            </table>



            <div class = "scroll">

            <table class="table">

                <tr>

                <th>First Aid Item Id</th>
                <th>First Aid Item Name</th>
                <th>Quantity</th>
                <th>Action</th>

                </tr>
 <?php

    $query = "SELECT * FROM first_aid ";
    $res = mysqli_query($linkDB, $query); 
    if($res == TRUE) 
             {
                $count = mysqli_num_rows($res); //calculate number of rows
                if($count>0)
                {
                    while($rows=mysqli_fetch_assoc($res))
                    {
                        $id=$rows['item_id'];
                    
                    echo "<tr id = 'row_$id'>

                                <td>" . $rows["item_id"]. "</td>
                                <td>" . $rows["item_name"]. "</td>
                                <td>" . $rows["quantity"]. "</td>
                                <td> <button class='submit-button' onclick='confirmRowData($id)'><i class='fa fa-trash'></i></button>
                                 <button class='submit-button' onclick='confirmUpdate($id)'><i class='fa fa-trash'></i></button></td>
                                
                                
                                
                                
                    </tr>";

                                
                            
                            
                    }
                }else{
                  echo "0 results";
                }    

            }  
?>
                
                

            </table>

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
function confirmRowData(id) {
  // Get the row with the booking data
  var row = document.getElementById('row_' + id);

  // Get the booking data from the row
  var item_id = row.cells[0].innerHTML;
  var item_name = row.cells[1].innerHTML;
  var quantity = row.cells[2].innerHTML;

  // Create a custom confirm box
  var confirmBox = document.createElement('div');
  confirmBox.classList.add('confirm-box');
  confirmBox.innerHTML = '<h2>Confirm Cancellation?</h2><p>Order Details:</p><ul><li>Date: ' + item_id + '</li><li>Item: ' + item_name + '</li><li>Ordered Quantity: ' + quantity + '</li></ul><h4><p>NOTE: We will be only refunding 75% of your payment per each cancellation</p></h4><button id="confirm-button">Confirm</button><button id="cancel-button">Cancel</button>';

  // Add the confirm box to the page
  document.body.appendChild(confirmBox);

  // Add event listeners to the confirm and cancel buttons
  var confirmButton = document.getElementById('confirm-button');
  var cancelButton = document.getElementById('cancel-button');
  confirmButton.addEventListener('click', function() {
    // Redirect to the clientcancelequipment.php page
    window.location.href = 'managerdismissfirstaid.php?id=' + id;
  });
  cancelButton.addEventListener('click', function() {
    // Remove the confirm box from the page
    document.body.removeChild(confirmBox);
  });
}
</script>

<script>

function confirmUpdate(id) {
  // Get the row with the booking data
  var row = document.getElementById('row_' + id);

  // Get the booking data from the row
  var item_id = row.cells[0].innerHTML;
  var item_name = row.cells[1].innerHTML;
  var quantity = row.cells[2].innerHTML;

  // Create a custom confirm box
  var confirmBox = document.createElement('div');
  confirmBox.classList.add('confirm-box');
  confirmBox.innerHTML = '<h2>Update Data?</h2><p>Item Details:</p><ul><li>ID: ' + item_id + '</li><li>Name: ' + item_name + '</li><li>Quantity: ' + quantity + '</li></ul><form method="post"><label for="new_item_id">New Item ID:</label><input type="text" id="new_item_id" name="new_item_id" value="' + item_id + '" required><label for="new_item_name">New Item Name:</label><input type="text" id="new_item_name" name="new_item_name" value="' + item_name + '" required><label for="new_quantity">New Quantity:</label><input type="number" id="new_quantity" name="new_quantity" value="' + quantity + '" required><button type="submit" name="update" id="confirm-button">Confirm</button><button id="cancel-button">Cancel</button></form>';

  // Add the confirm box to the page
  document.body.appendChild(confirmBox);

  // Add event listeners to the confirm and cancel buttons
  var confirmButton = document.getElementById('confirm-button');
  var cancelButton = document.getElementById('cancel-button');

  confirmButton.addEventListener('click', function(event) {
    event.preventDefault(); // Prevent the default form submission behavior
    
    // Get the form data
    var formData = new FormData();
    formData.append('item_id', document.getElementById('new_item_id').value);
    formData.append('item_name', document.getElementById('new_item_name').value);
    formData.append('quantity', document.getElementById('new_quantity').value);

    // Send an HTTP POST request to the server
    fetch('update.php', {
      method: 'POST',
      body: formData
    })
    .then(function(response) {
      if (response.ok) {
        // Reload the page to reflect the updated data
        window.location.reload();
      } else {
        console.log('Error: ' + response.statusText);
      }
    })
    .catch(function(error) {
      console.log('Error: ' + error);
    })
    .finally(function() {
      confirmBox.remove(); // Remove the confirm box from the page
    });
  });
  
  cancelButton.addEventListener('click', function() {
    confirmBox.remove(); // Remove the confirm box from the page
  });
}

</script>
