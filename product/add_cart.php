<?php
// Start the session
session_start();

// Check if the product ID is provided
if (isset($_GET['id'])) {
    // Get the product ID from the query string
    $product_id = $_GET['id'];

    // Check if the product ID is valid (e.g., exists in the database)
    // You may need to implement your own logic here to validate the product ID

    // If the product ID is valid, add the product to the cart
    if ($product_id) {
        // Check if the cart session variable is already set
        if (isset($_SESSION['cart'])) {
            // If the cart is already set, add the product to the cart
            $_SESSION['cart'][] = $product_id;
        } else {
            // If the cart is not set, create a new cart with the product
            $_SESSION['cart'] = array($product_id);
        }

        // Redirect to a success page or update the cart display
        header('Location:cart.php');
        exit;
    }
}
?>
