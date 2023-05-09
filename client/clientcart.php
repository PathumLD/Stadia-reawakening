<?php include("../linkDB.php"); //database connection function ?>
<?php
session_start();

// Check if the add to cart button was clicked for any product
foreach ($_POST as $key => $value) {
  if (strpos($key, 'add_to_cart_') !== false) {
    $productId = str_replace('add_to_cart_', '', $key);
    $product_id = $_POST['product_id_'.$productId];
    $product_name = $_POST['product_name_'.$productId];
    $product_price = $_POST['product_price_'.$productId];
    $datetime = $_POST['datetime_'.$productId];
    $quantity = $_POST['quantity_'.$productId];

    // Add product to cart
    $cart_item = array(
      'id' => $product_id,
      'name' => $product_name,
      'price' => $product_price,
      'datetime' => $datetime,
      'quantity' => $quantity
    );

    if(!isset($_SESSION['cart'])) {
      $_SESSION['cart'] = array();
    }

    $_SESSION['cart'][$product_id] = $cart_item;
    $email = $_SESSION['email'];

    // Insert product to the database
    $query = "INSERT INTO orders (email, product_id, quantity, datetime) VALUES ('$email', '$product_id', '$quantity', '$datetime')";
    $result = mysqli_query($linkDB, $query);
    if(!$result) {
      echo "Error inserting product to database: " . mysqli_error($linkDB);
    }

  }
}
?>

<!-- HTML code for displaying the cart -->
<table>
  <thead>
    <tr>
      <th>Product Name</th>
      <th>Price</th>
      <th>Date and Time</th>
      <th>Quantity</th>
      <th>Total</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $total = 0;
      if(isset($_SESSION['cart'])) {
        foreach($_SESSION['cart'] as $cart_item) {
          $product_name = $cart_item['name'];
          $product_price = $cart_item['price'];
          $datetime = $cart_item['datetime'];
          $quantity = $cart_item['quantity'];
          $product_total = $product_price * $quantity;
          $total += $product_total;
    ?>
      <tr>
        <td><?php echo $product_name ?></td>
        <td><?php echo $product_price ?></td>
        <td><?php echo $datetime ?></td>
        <td><?php echo $quantity ?></td>
        <td><?php echo $product_total ?></td>
      </tr>
    <?php
        }
      }
    ?>
  </tbody>
  <tfoot>
    <tr>
      <td colspan="4">Total</td>
      <td><?php echo $total ?></td>
    </tr>
  </tfoot>
</table>
