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
    <link rel="stylesheet" href="../css/profile.css">

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

            <table id="searchtable">
              <tr>
                <td>
                    <form method="post">

                        <select name="court_search" class="search" id="disable">
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
                    <td><button id = "viewbtn"  onclick='viewCoach()'>View Coach</button></td>
                <!-- <td>
                    <section class="section">
                        <button class="show-modal">View Coach</button>
                        <span class="overlay"></span>

                        <div class="modal-box">
                            <div class="container-fluid content-section" id="profile">
                                <div class="container-fluid ">
                                    <img src="../images/profile.jpg" alt="Profile Photo" class="profile-picture">
                                    <div class="overlay"></div>
                                    <div class="profile-details">
                                        <h1>John Doe</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="about-me container content-section" id="about">
                            <div class="heading text-center">
			<h1>About Me</h1>

			<div class="row about-description-section">
				<section class="col-xs12 col-md-4 container">
					<h4 class="section-heading">Who I am</h4>
					<p class="text-left">
						I am an Android developer who cares for good UI. I'm currently exploring the realm of Web and mobile development. I was introduced to C/C++ in 11<sup>th</sup> grade and I've been a fan of algorithms and programming ever since. I love coffee, Dum Biriyaani, the sweetness of Urdu poetry, the depth of Tarantino's and Kashyap's flicks, the soul in Pink Floyd's and Led Zeppelin's music and the grace with which Madhuri Dixit smiles. I'm a team player and a self starter. I have a keen eye for designing and wire framing and I prefer having an entrepreneurial approach towards my work. When not coding, I can either be found exploring places in the blocked arteries of Mumbai or at some corner of my home, scribbling poetry in illegible handwriting. 
					</p>
				</section>

				
				<section class="col-xs12 col-md-4 list-section container">
					
					<h4 class="section-heading">Languages that I code in/work with</h4>
					<ul class="list-group text-left">
						
						<li class="list-group-item col-xs-12">Core Java</li>
						<li class="list-group-item col-xs-12">XML (For Android UI design)</li>
						<li class="list-group-item col-xs-12">C/C++</li>
						<li class="list-group-item col-xs-12">HTML</li>
						<li class="list-group-item col-xs-12">CSS</li>
						<li class="list-group-item col-xs-12">PHP</li>

					</ul>
				</section>

				<section class="col-xs12 col-md-4 list-section experience-section container">
					<h4 class="section-heading">Experience</h4>
					
					<ul class="list-group">
						<li class="list-group-item text-left col-xs-12">
							
							<div>
								SpeakingLamp Technologies
								
							</div>
							<small class="position-in-company">Android Developer</small>
							
							<div>
								<small class="position-in-company">May'16-present</small>
							</div>
						</li>

						<li class="list-group-item text-left col-xs-12">
							
							<div>
								TOPS Technologies
								
							</div>
							<small class="position-in-company">Android Intern</small>
							
							<div>
								<small class="position-in-company">Feb'16-May'16</small>
							</div>
						</li>

						
					</ul>
				</section>
				

			</div>
		</div>
                            </div>

                            <div class="buttons">
                                <button class="close-btn">Ok, Close</button>
                            </div>
                        </div>
                    </section>
                </td> -->
            </tr>
            </table>

            <table class="table">

            <tr>

                <th>Age Group</th>
                <th>Level</th>
                <th>Date</th>
                <th>Time</th>
                <th>Class Fee</th>
                <th>Action</th>

            </tr>


            <?php

                if(isset($_POST['go'])){

                    $search = $_POST['search'];

                    $query = "SELECT * FROM coach_classes WHERE sport='badminton'AND coachname LIKE '%$search%' ";
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
    function viewCoach() {

    // Create a custom confirm box
    var confirmBox = document.createElement('div');
    confirmBox.classList.add('confirm-box');
    confirmBox.innerHTML = '<h2>Pathum Lakshan</h2><p>Order Details:</p><h4><p>NOTE: We will be only refunding 75% of your payment per each cancellation</p></h4><button id="confirm-button">Confirm</button><button id="cancel-button">Cancel</button>';

    // Add the confirm box to the page
    document.body.appendChild(confirmBox);

    // Add event listeners to the confirm and cancel buttons
    var cancelButton = document.getElementById('cancel-button');
    cancelButton.addEventListener('click', function() {
        // Remove the confirm box from the page
        document.body.removeChild(confirmBox);
    });
    }
    </script>