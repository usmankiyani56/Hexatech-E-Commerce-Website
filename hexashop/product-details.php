<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "hexashop";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming you have a product ID in the URL like product-details.php?id=123
$productId = isset($_GET['id']) ? $_GET['id'] : null;

if (!$productId) {
    // Handle the case where no ID is provided
    die('Invalid product ID');
}

// Use a prepared statement to avoid SQL injection
$sql = "SELECT * FROM products WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $productId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $product = $result->fetch_assoc();
    // Continue with rendering the product details
} else {
    // Handle the case where no product is found
    die('Product not found');
}

// Close the prepared statement
$stmt->close();

// Close the database connection
$conn->close();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mstyle.css">
    <title><?php echo $product['name']; ?> - Product Details</title>
    <!-- Add this JavaScript code in the head section -->
</head>

<body>
    <?php include 'header.html'; ?>
    <div class="container mt-5">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
            <div class="col mb-4 mx-auto">
                <div class="card custom-card">

                    <img src="<?php echo $product['image_path']; ?>" class="card-img-top" alt="Product Image">
                    <div class="card-body bg-custom-color">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title"><?php echo $product['name']; ?></h5>
                            </div>
                            <div class="col text-end">
                                <?php for ($i = 1; $i <= 5; $i++) : ?>
                                    <?php if ($i <= $product['rating']) : ?>
                                        <i class="ri-star-fill"></i>
                                    <?php else : ?>
                                        <i class="ri-star-line"></i>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <p class="card-text">Price: $<?php echo $product['price']; ?></p>
                            </div>
                            <div class="col text-end">
                                <i class="ri-heart-line"></i>
                                <form action="add-to-cart.php" method="post">
    <input type="hidden" name="id" value="<?php echo $productId; ?>">
    <input type="hidden" name="name" value="<?php echo $productName; ?>">
    <input type="hidden" name="price" value="<?php echo $productPrice; ?>">
    <input type="hidden" name="image" value="<?php echo $productImage; ?>">
    <i class="ri-shopping-cart-fill"></i>
</form>
                                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-3 text-center">
        <button class="btn btn-primary" onclick="goBack()">Go Back</button>
    </div>
    <?php
    $productCategory = $product['main_category'];
    if ($productCategory === 'Mens') {
        // Display Men's carousel
        include 'mens-carousel.php';
    } elseif ($productCategory === 'Women') {
        // Display Women's carousel
        include 'women-carousel.php';
    } elseif ($productCategory === 'kids') {
        // Display Kids carousel
        include 'kids-carousel.php';
    }
    ?>
    <?php include 'footer.html'; ?>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>

</html>