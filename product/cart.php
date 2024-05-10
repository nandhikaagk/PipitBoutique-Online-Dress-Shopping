<?php
// Start the session
session_start();

// Check if the cart session variable is set
if (!isset($_SESSION['cart'])) {
    // If the cart is not set, initialize it as an empty array
    $_SESSION['cart'] = array();
  
}
$rto=0;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
</head>
<body>
    <h1>Shopping Cart</h1>
    <table>
        <tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>quantity</th>
        </tr>
        <?php
        // Loop through the cart items and display them in a table
        foreach ($_SESSION['cart'] as $product_id) {
            // Retrieve product details from the database based on the product ID
            // You may need to implement your own logic here to fetch product details
            // Example: Connecting to a MySQL database and fetching product details
            $mysqli = new mysqli('localhost', 'root', '', 'phpcrud1');
            $query = "SELECT * FROM product WHERE productid = $product_id";
            $result = $mysqli->query($query);
            $row = $result->fetch_assoc();

            // Get product details from the fetched row
            $product_name = $row['product_name'];

            $price = '$' . $row['product_prize'];

            // Display the product details in a table row
            echo '<tr>';
            echo '<td>' . $product_id . '</td>';
            echo '<td>' . $product_name . '</td>';
     
       echo '<td>' . $price . '</td>';

            echo '</tr>';
            
            if (isset($_POST['update']))
            {
                
          $rto += $row['product_prize'] ;
            }

        }

       
        ?>
    </table>
    <form  method="post">
      <input type="submit" value="Update" name="update"></form>
   
    <?php
  echo $rto;
  
    ?>
    <button><a href="\instamojo (1)\pyment_form.php">checko out</a><button>
    <a href="clear_cart.php">Clear Cart</a>
    <!-- Link to a script that clears the cart -->
</body>
</html>