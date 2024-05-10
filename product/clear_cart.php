<?php
// Start the session
session_start();

// Check if the cart session variable is set
if (isset($_SESSION['cart'])) {
    // If the cart is set, unset it to clear the cart
    unset($_SESSION['cart']);
}

// Redirect back to the cart display page or any other page as needed
header('Location: cart.php');
exit;
?>
