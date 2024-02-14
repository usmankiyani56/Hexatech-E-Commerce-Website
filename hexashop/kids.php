<?php
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

// Query the database
$result = $conn->query("SELECT * FROM products");

$products = [];

// Fetch results into an array
while ($row = $result->fetch_assoc()) {
    $products[] = $row;
}

// Fetch only products with sub_category set to "men_latest"
$latestProducts = array_filter($products, function ($product) {
    return $product['sub_category'] == 'kids_latest';
});

// Close the connection
$conn->close();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.0.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="mstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.0.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="hfstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>My Web Shop</title>
</head>

<body>
    <?php include 'header.html'; ?>
    <div class="container-fluid mt-3">
        <h2>Kids's Latest</h2>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
            <?php foreach ($latestProducts as $product) : ?>
                <div class="col mb-4 mx-auto">
                    <div class="card custom-card">
                        <a href="product-details.php?id=<?php echo $product['id']; ?>">
                            <img src="<?php echo $product['image_path']; ?>" class="card-img-top" alt="Product Image">
                        </a>

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
                                    <i class="ri-shopping-cart-fill"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <h2 class="mt-5">Featured</h2>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
            <?php
            // Fetch only products with sub_category set to "featured"
            $featuredProducts = array_filter($products, function ($product) {
                return $product['sub_category'] == 'kids_featured';
            });

            foreach ($featuredProducts as $product) :
            ?>
                <div class="col mb-4 mx-auto">
                    <div class="card custom-card h-100">
                        <a href="product-details.php?id=<?php echo $product['id']; ?>">
                            <img src="<?php echo $product['image_path']; ?>" class="card-img-top" alt="Product Image">
                        </a>
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
                                    <i class="ri-shopping-cart-fill"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <h2 class="mt-5">Casual</h2>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
            <?php
            // Fetch only products with sub_category set to "featured"
            $CasualProducts = array_filter($products, function ($product) {
                return $product['sub_category'] == 'kids_casual';
            });

            foreach ($CasualProducts as $product) :
            ?>
                <div class="col mb-4 mx-auto">
                    <div class="card custom-card h-100">
                        <a href="product-details.php?id=<?php echo $product['id']; ?>">
                            <img src="<?php echo $product['image_path']; ?>" class="card-img-top" alt="Product Image">
                        </a>
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
                                    <i class="ri-shopping-cart-fill"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <?php include 'footer.html'; ?>
</body>

</html>