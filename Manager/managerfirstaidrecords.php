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
            

            
            <a href=manageraddfirstaid.php><i class='fa fa-plus-circle' ></i></a>

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
                                <a href='managerupdatefirstaidrecords.php?id=$id; ?>'><i class='fa fa-pencil-square-o' ></i></a> </td>
                                
                                
                                
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
