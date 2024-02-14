<?php
session_start();

if (isset($_POST['add-to-cart'])) {
    $productId = $_POST['id'];
    $productName = $_POST['name'];
    $productPrice = $_POST['price'];
    $productImage = $_POST['image'];

    $cartItem = array(
        'id' => $productId,
        'name' => $productName,
        'price' => $productPrice,
        'image' => $productImage,
    );

    // Check if the cart array exists in the session
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Add the item to the cart
    $_SESSION['cart'][] = $cartItem;

    // Redirect back to the previous page (product details page)
    // Use JavaScript to navigate back
    echo '<script>window.history.back();</script>';
    exit(); // Make sure to exit after using JavaScript to prevent further execution
}
?>
