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
    <link rel="stylesheet" href="../css/client/clientcoach.css">

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

            <h1>Coaches - Badminton</h1>
            
            <div class="content">

                        <h3><b>Enroll with the classes we provide!</b><br><br>
                        Whether you're looking to learn a new skill, develop a new hobby, or advance your career, taking classes can help you achieve your goals.</h3>

            <table id="searchtable">
              <tr>
                <td>
                    <form method="post">

                        <select name="coach_email" class="search" id="disable">
                        <option value="" disabled selected>Search by Coach</option>
                        <?php
                            $query = "SELECT * from users WHERE type = 'coach' ";
                            $res = mysqli_query($linkDB, $query);
                            if($res == TRUE)
                            {
                                $count =mysqli_num_rows($res); //calculate the number of rows
                                if($count>0)
                                {
                                    $option = '';
                                    while($rows=mysqli_fetch_assoc($res))
                                    {
                                        $option .= '<option value="' .$rows['email'] . '">' .$rows['fname'] . " " . $rows['lname'] .'</option>';
                                    }
                                    echo '' . $option . '</select>';
                                } else{
                                    echo "0 results";
                                }
                            }
                        ?>

                        <input type="submit" name="go" value="Search" id="searchbtn">

                        <a href="clientbookings.php"><input type="submit" value="reset" id = "resetbtn"></a>
                    </form>
                    </td>

                    <td>
                    <button id="view-cv-btn">View CV</button>

                        <?php

                            if(isset($_POST['go'])){

                                $email = $_POST['coach_email'];

                                // Retrieve the pdf from the database
                                $folder = "../pdf/";
                                $sql = "SELECT * FROM pdf_data WHERE email = '$email' ";
                                $result = mysqli_query($linkDB, $sql);
                                $row = mysqli_fetch_array($result);
                                if($row){
                                    $filename = $row['filename'];
                                    // code to display the pdf
                                    } else {
                                    echo "CV not found for the given email.";
                                    }
                            }
                            
                            else {
                                echo "Please select a coach to view his/her CV";
                            }
        
                        ?>
                    </td>

            </tr>
            </table>

            <table class="table">

            <tr>

                <th>Date</th>
                <th>Age Group</th>
                <th>Level</th>
                <th>Time</th>
                <th>Class Fee</th>
                <th>Action</th>

            </tr>


            <?php

                if(isset($_POST['go'])){

                    $email = $_POST['coach_email'];

                    $query = "SELECT * FROM coach_classes WHERE sport='badminton'AND email = '$email' ";
                    $res = mysqli_query($linkDB, $query); 
                        if($res == TRUE) 
                        {
                            $count = mysqli_num_rows($res); //calculate number of rows
                            if($count>0)
                            {
                                while($rows=mysqli_fetch_assoc($res))
                                {
                                    echo "<tr>
                                            <td>" . $rows["date"]. "</td>
                                            <td>" . $rows["age_group"]. "</td>
                                            <td>" . $rows["level"]. "</td>
                                            <td>" . $rows["time"]. "</td>
                                            <td>" . $rows["fee"]. "</td>
                                            <td><a href='clientmycart.php'>Register</a></td>
                                        </tr>";                                
                                    }
                            } else {
                                echo "0 results";
                            }
                        }
                }
                else{

                    $query = "SELECT * FROM coach_classes WHERE sport='badminton'";
                    $res = mysqli_query($linkDB, $query); 
                            if($res == TRUE) 
                            {
                                $count = mysqli_num_rows($res); //calculate number of rows
                                if($count>0)
                                {
                                    while($rows=mysqli_fetch_assoc($res))
                                    {
                                        echo "<tr>
                                                <td>" . $rows["age_group"]. "</td>
                                                <td>" . $rows["level"]. "</td>
                                                <td>" . $rows["date"]. "</td>
                                                <td>" . $rows["time"]. "</td>
                                                <td>" . $rows["fee"]. "</td>
                                                <td><a href='clientmycart.php'>Register</a></td>
                                            </tr>";
                                    }
                                } else {
                                    echo "0 results";
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
      const section = document.querySelector(".section"),
        overlay = document.querySelector(".overlay"),
        showBtn = document.querySelector(".show-modal"),
        closeBtn = document.querySelector(".close-btn");

      showBtn.addEventListener("click", () => section.classList.add("active"));

      overlay.addEventListener("click", () =>
        section.classList.remove("active")
      );

      closeBtn.addEventListener("click", () =>
        section.classList.remove("active")
      );
    </script>

<script>
    const viewCvBtn = document.getElementById('view-cv-btn');
    
    viewCvBtn.addEventListener('click', () => {
        const url = "<?php echo $folder . $filename; ?>";
        window.open(url, '_blank');
    });
</script>