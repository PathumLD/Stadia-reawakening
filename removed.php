<!-- <?php include("linkDB.php"); //database connection function ?> -->


<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Stadia </title>
    <link rel="stylesheet" href="css/clientdashboard.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- Fontawesome CDN Link -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <?php include('javascript.php'); ?>

   </head>
<body onload="initClock()">

  <div class="sidebar">
    <div class="logo-details">
      <!-- <i class='bx bxl-c-plus-plus'></i> -->
      <span class="logo_name"><img src="images/logo.png" alt="logo"></span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="#" class="active">
            <!-- <i class='bx bx-grid-alt' ></i> -->
            <i class="fa fa-th-large" ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="clientprofile.php" >
            <!-- <i class='bx bx-box' ></i> -->
            <i class="fa fa-user"></i>
            <span class="links_name">Profile</span>
          </a>
        </li>
        <li>
          <a href="#">
            <!-- <i class='bx bx-list-ul' ></i> -->
            <i class="fa fa-list-ul" ></i>
            <span class="links_name">Bookings</span>
          </a>
        </li>
        <li>
          <a href="#">
            <!-- <i class='bx bx-pie-chart-alt-2' ></i> -->
            <i class="fa fa-calendar" ></i>
            <span class="links_name">Classes</span>
          </a>
        </li>
        <li>
          <a href="#">
            <!-- <i class='bx bx-coin-stack' ></i> -->
            <i class="fa fa-stack-exchange" ></i>
            <span class="links_name">Ordered Facilities</span>
          </a>
        </li>
        <li>
          <a href="#">
            <!-- <i class='bx bx-book-alt' ></i> -->
            <i class="fa fa-clock-o" ></i>
            <span class="links_name">Time Slots</span>
          </a>
        </li>
        <li>
          <a href="#">
            <!-- <i class='bx bx-user' ></i> -->
            <i class="fa fa-users"></i>
            <span class="links_name">Coaches</span>
          </a>
        </li>
        <!-- <li> -->
          <!-- <a href="#"> -->
            <!-- <i class='bx bx-message' ></i> -->
            <button class="dropdown-btn">
            <i class="fa fa-coffee"></i>
            <span class="links_name">Facilities <i class="fa fa-caret-down"></i></span>
            </button>
            <div class="dropdown-container">
          
              <a href="clientrefreshments.php">Refreshments</a>
              <a href="clientequipment.php">Equipment</a>
          
            </div>

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
        <?php
"INSERT INTO Customers (CustomerName, City, Country)VALUES ('Cardinal', 'Stavanger', 'Norway')";

"SELECT * FROM Customers WHERE Country='Germany' AND (City='Berlin' OR City='München')";

"ALTER TABLE Customers ADD Email varchar(255)";

"UPDATE Customers SET ContactName = 'Alfred Schmidt', City= 'Frankfurt' WHERE CustomerID = 1";

"DELETE FROM Customers WHERE CustomerName='Alfreds Futterkiste'";

"SELECT MAX(Price) AS LargestPrice FROM Products";

"SELECT SUM(Quantity) FROM OrderDetails";

"SELECT COUNT(*)FROM Products WHERE Price = 18";

"SELECT * FROM Customers WHERE CustomerName LIKE 'a%'"; //name start with a

"SELECT * FROM Customers WHERE Country IN ('Germany', 'France', 'UK')";

"SELECT * FROM Products WHERE Price BETWEEN 10 AND 20";

"SELECT Orders.OrderID, Customers.CustomerName, Orders.OrderDate
FROM Orders
INNER JOIN Customers ON Orders.CustomerID=Customers.CustomerID";

"SELECT Orders.OrderID, Customers.CustomerName, Shippers.ShipperName FROM ((Orders INNER JOIN Customers ON Orders.CustomerID = Customers.CustomerID) 
INNER JOIN Shippers ON Orders.ShipperID = Shippers.ShipperID)";

"SELECT * FROM Orders INNER JOIN Customers ON Orders.CustomerID=Customers.CustomerID";
"SELECT Customers.CustomerName, Orders.OrderID
FROM Customers
LEFT JOIN Orders ON Customers.CustomerID = Orders.CustomerID
ORDER BY Customers.CustomerName";

"INSERT INTO Customers (CustomerName, City, Country)
SELECT SupplierName, City, Country FROM Suppliers";//copies "Suppliers" into "Customers" (the columns that are not filled with data, will contain NULL):

"CREATE TABLE Persons (
  PersonID int,
  LastName varchar(255),
  FirstName varchar(255),
  Address varchar(255),
  City varchar(255)
)";
?>
</body>
</html>
<form action="submit.php" method="post" target="_self">
  <input type="text" name="username" placeholder="Enter your username">
  <input type="password" name="password" placeholder="Enter your password">
  <button type="submit">Submit</button>

<label>
    <input type="checkbox" name="fruit[]" value="orange"> Orange
  </label>
  <label>
    <input type="radio" name="color" value="blue"> Blue
  </label>
  </form>


  <?php
include("../linkDB.php");

if (isset($_POST['submit'])) {
    $itemtype = $_POST["Item-type"];
    $itemid = $_POST["itemid"];
    $itemname = $_POST["itemname"];
    $price = $_POST["price"];
    $image = "";

    //validate input
    if(empty($itemid) || empty($itemname) || empty($price)){
        echo '<span class="error-new"> *Please fill all the fields</span>';
    }
    if(!is_numeric($price)){
        echo '<span class="error-new"> *Quantity must be numeric values.</span>';
    }

    // Check if an image was uploaded
    if (isset($_FILES["image"])) {
        $image_name = $_FILES["image"]["name"];
        $image_size = $_FILES["image"]["size"];
        $image_tmp = $_FILES["image"]["tmp_name"];
        $image_type = $_FILES["image"]["type"];

        // Move the uploaded file to a permanent location
        move_uploaded_file($image_tmp, "../products/$image_name");

        $image = $image_name;
    }

    // Check if item id already exists in either table
    $sql_check_itemid = "SELECT COUNT(*) AS count FROM refreshments_drinks WHERE itemid = '$itemid' UNION SELECT COUNT(*) AS count FROM refreshments_snacks WHERE itemid = '$itemid'";
    $result_check_itemid = mysqli_query($linkDB, $sql_check_itemid);
    $row_check_itemid = mysqli_fetch_assoc($result_check_itemid);
    $count_itemid = $row_check_itemid['count'];

    if($count_itemid > 0){
        echo '<span class="error-new"> *Item ID already exists</span>';
    }

    // Check if item name already exists in either table
    $sql_check_itemname = "SELECT COUNT(*) AS count FROM refreshments_drinks WHERE itemname = '$itemname' UNION SELECT COUNT(*) AS count FROM refreshments_snacks WHERE itemname = '$itemname'";
    $result_check_itemname = mysqli_query($linkDB, $sql_check_itemname);
    $row_check_itemname = mysqli_fetch_assoc($result_check_itemname);
    $count_itemname = $row_check_itemname['count'];

    if($count_itemname > 0){
        echo '<span class="error-new"> *Item name already exists</span>';
    }

    // Insert data into the correct table based on item type if neither item id nor item name already exist
    if ($count_itemid == 0 && $count_itemname == 0) {
        if ($itemtype == "drinks") {
            $sql = "INSERT INTO refreshments_drinks (itemid, itemname, price, image) VALUES ('$itemid', '$itemname', '$price', '$image')";
        } else {
            $sql = "INSERT INTO refreshments_snacks (itemid, itemname, price, image) VALUES ('$itemid', '$itemname', '$price', '$image')";
        }

        if (mysqli_query($linkDB, $sql)) {
            // Data inserted successfully, redirect to supplierdashboard.php
            echo "<script>window.location.href='supplierdashboard.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($linkDB);
        }
    }
}
?>

//checks without itemname

<?php
include("../linkDB.php");

if (isset($_POST['submit'])) {
    $itemtype = $_POST["Item-type"];
    $itemid = $_POST["itemid"];
    $itemname = $_POST["itemname"];
    $price = $_POST["price"];
    $image = "";

    
    // Check if an image was uploaded
    if (isset($_FILES["image"])) {
        $image_name = $_FILES["image"]["name"];
        $image_size = $_FILES["image"]["size"];
        $image_tmp = $_FILES["image"]["tmp_name"];
        $image_type = $_FILES["image"]["type"];

        // Move the uploaded file to a permanent location
        move_uploaded_file($image_tmp, "../products/$image_name");

        $image = $image_name;
    }
    //validate input
    // Check if item already exists in the appropriate table
    $itemExists = false;
    if ($itemtype == "drinks") {
        $result = mysqli_query($linkDB, "SELECT itemid FROM refreshments_drinks WHERE itemid = '$itemid'");
        if (mysqli_num_rows($result) > 0) {
            $itemExists = true;
        }
    } else {
        $result = mysqli_query($linkDB, "SELECT itemid FROM refreshments_snacks WHERE itemid = '$itemid'");
        if (mysqli_num_rows($result) > 0) {
            $itemExists = true;
        }
    }

    if ($itemExists) {
        echo '<span class="error-new"> *Item with ID ' . $itemid . ' already exists</span>';
    }
        
    elseif(empty($itemid) || empty($itemname) || empty($price)){
        echo '<span class="error-new"> *Please fill all the fields</span>';
    }
    elseif(!is_numeric($price)){
        echo '<span class="error-new"> *Quantity must be numeric values.</span>';
    }

    else {
        // Insert data into the correct table based on item type
        if ($itemtype == "drinks") {
            $sql = "INSERT INTO refreshments_drinks (itemid, itemname, price, image) VALUES ('$itemid', '$itemname', '$price', '$image')";
        } else {
            $sql = "INSERT INTO refreshments_snacks (itemid, itemname, price, image) VALUES ('$itemid', '$itemname', '$price', '$image')";
        }

        if (mysqli_query($linkDB, $sql)) {
            // Data inserted successfully, redirect to supplierdashboard.php
            echo "<script>window.location.href='supplierdashboard.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($linkDB);
        }
    }
}

?>
