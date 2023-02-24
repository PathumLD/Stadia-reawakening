<!-- <?php include("../linkDB.php"); //database connection function ?> -->


<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Equipments </title>
    
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 
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

        <?php include('../include/navbar.php'); ?>

    </nav>

    <div class="home-content">

        <div class="main-content">

            <h1>Equipments</h1>

       

        <table class="ps">
                <tr><td>    </td></tr>
               <tr><td> <form method="post">
                    <input type="text" name="search" class ="search" placeholder="Equipment Name...">
                    <input type="submit" name="go" value="search" id = "searchbtn">
                </form></td></tr>
            </table>

            <?php $var = $_SESSION['email']; ?>
            
            <table class="table">

                <tr>

                    <th>Item Name</th>
                    <th>Price</th> 
                    <th>Quantity</th>

                </tr>

                <?php

class CoachEquipment {
    private $linkDB;

    public function __construct($db) {
        $this->linkDB = $db;
    }

    public function getEquipment($search) {
        $query = "SELECT * FROM coachequipment WHERE item LIKE '%$search%' ";
        $res = mysqli_query($this->linkDB, $query); 
        if($res == TRUE) {
            $count = mysqli_num_rows($res); //calculate number of rows
            if($count>0) {
                while($rows=mysqli_fetch_assoc($res)) {
                    echo "<tr>
                        <td>" . $rows["item"]. "</td>
                        <td>" . $rows["price"]. "</td>
                        <td>" . $rows["quantity"]. "</td>
                    </tr>";
                }
            } elseif($search=='all') {
                $query = "SELECT * FROM coachequipment ";
                $res = mysqli_query($this->linkDB, $query); 
                if($res == TRUE) {
                    $count = mysqli_num_rows($res); //calculate number of rows
                    if($count>0) {
                        while($rows=mysqli_fetch_assoc($res)) {
                            echo "<tr>
                                <td>" . $rows["item"]. "</td>
                                <td>" . $rows["price"]. "</td>
                                <td>" . $rows["quantity"]. "</td>
                            </tr>";
                        }
                    } else {
                        echo "0 results";
                    }
                }
                // echo "0 results";
            }
        }
    }

    public function getAllEquipment() {
        $query = "SELECT * FROM coachequipment ";
        $res = mysqli_query($this->linkDB, $query); 
        if($res == TRUE) {
            $count = mysqli_num_rows($res); //calculate number of rows
            if($count>0) {
                while($rows=mysqli_fetch_assoc($res)) {
                    echo "<tr>
                    <td>" . $rows["item"]. "</td>
                    <td>" . $rows["price"]. "</td>
                    <td>" . $rows["quantity"]. "</td>
                        </tr>";
                }
            } else {
                echo "0 results";
            }
        }
    }
}

// Usage Example
$equipment = new CoachEquipment($linkDB);
if(isset($_POST['go'])) {
    $search = $_POST['search'];
    $equipment->getEquipment($search);
} else {
    $equipment->getAllEquipment();
}

?>

     
            </table>

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