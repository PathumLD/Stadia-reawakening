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
    <link rel="stylesheet" href="../css/coach/coachupdateclass.css">
 
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

          <div class="content">

            <?php $var = $_SESSION['email']; ?>

            <h1> Edit Classes </h1>


            <?php $id = $_GET['id']; ?>

              <?php
              
                  $sql = "SELECT * FROM coach_classes WHERE id = '".$id."'";

                  $result = mysqli_query($linkDB, $sql);
  
                  if($result == TRUE){
                    $count = mysqli_num_rows($result);
                    if($count > 0){
                      while($row = mysqli_fetch_assoc($result)){
                        echo "
                        <table class= 'table'>
                          <th  colspan='6' > Current Status </th>
                            <tr>
                              <td>" . $row['level']. "</td>
                              <td>" . $row['sport']. "</td>
                              <td>" . $row['date']. "</td>
                              <td>" . $row['time']. "</td>
                              <td>" . $row['age_group']. "</td>
                              <td>" . $row['no_of_students']. "</td>
                            </tr> </table>";

                      }
                    }
                  } 

              ?>
  
                  

        <?php 
            $id = $_GET['id'];

            if(isset($_POST['update'])) {
                $level = $_POST['level'];
                $sport = $_POST['sport'];
                $date = $_POST['date'];
                $time = $_POST['time'];
                $age_group = $_POST['age_group'];
                $no_of_students = $_POST['no_of_students'];
                
                // Query the database to update the information for the class
                $sql = "UPDATE coach_classes SET level = '$level', sport = '$sport', date = '$date', time = '$time', age_group = '$age_group', no_of_students = '$no_of_students' WHERE class_id = $id";
                
                if(mysqli_query($linkDB, $sql)){
                    echo "Records were updated successfully.";
                } else{
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($linkDB);
                }
            }
        ?>

                

            </div>

                <div class="update">

                  <h3> Update </h3>

                </div>

                <div class="delete">

                  <h3> Delete </h3>

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