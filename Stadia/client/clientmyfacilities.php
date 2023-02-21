<?php include("../linkDB.php"); //database connection function ?> 


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

            <h1>My Facilities</h1>

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
                        $query = "SELECT * FROM client_refreshments WHERE email = '".$var."'";
                        $res = mysqli_query($linkDB, $query); 
                                if($res == TRUE) 
                                {
                                    $count = mysqli_num_rows($res); //calculate number of rows
                                    if($count>0)
                                    {
                                        while($rows=mysqli_fetch_assoc($res))
                                        {
                                            $id=$rows['id'];
                                            echo "<tr>
                                                    <td>" . $rows["date"]. "</td>
                                                    <td>" . $rows["time"]. "</td>
                                                    <td>" . $rows["itemname"].  "</td>
                                                    <td>" . $rows["orderedquantity"]."</td>
                                                    <td> <a href='clientcancelrefreshment.php?id=$id; ?>'><i class='fa fa-trash'>&nbsp&nbsp&nbsp</i>  </a> 
                                                        <a href='clientupdaterefreshment.php?id=$id; ?>'><i class='fa fa-pencil-square-o' ></i></a> </td>
                                                    <td> <div class='button'> <a class='ppp' href='#popup1'> Update </a>  </div> </td>
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
                    $query = "SELECT * FROM client_equipment WHERE email = '".$var."'";
                    $res = mysqli_query($linkDB, $query); 
                            if($res == TRUE) 
                            {
                                $count = mysqli_num_rows($res); //calculate number of rows
                                if($count>0)
                                {
                                    while($rows=mysqli_fetch_assoc($res))
                                    {
                                        $id=$rows['id'];
                                        echo "<tr>
                                                <td>" . $rows["date"]. "</td>
                                                <td>" . $rows["itemname"]. "</td>
                                                <td>" . $rows["orderedquantity"]. "</td>
                                                <td><a href='clientcancelequipment.php?id=$id; ?>'><i class='fa fa-trash'>&nbsp&nbsp&nbsp</i>  </a> 
                                                    <a href='clientupdateequipment.php?id=$id; ?>'><i class='fa fa-pencil-square-o' ></i> </a> </td>
                                            </tr>";
                                    }
                                } else {
                                    echo "0 results";
                                }
                            }    
                    ?>

            </table>

            <div id="popup1" class="overlay">
	<div class="popup">
		<h2>Here i am</h2>
		<a class="close" href="#">&times;</a>
		<div class="content">
			Thank to pop me out of that button, but now i'm done so you can close this window.
		</div>
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