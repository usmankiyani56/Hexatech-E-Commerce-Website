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


// Fetch kid's latest products from the database
$kidsLatestResult = $conn->query("SELECT * FROM products WHERE main_category = 'kids'");

$kidsLatestProducts = [];
while ($row = $kidsLatestResult->fetch_assoc()) {
    $kidsLatestProducts[] = $row;
}

// Fetch results into an array


// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Image Carousel</title>
</head>

<body>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <!-- Include your existing meta tags, stylesheets, and Bootstrap CDN links here -->

        <title>My Web Shop</title>
    </head>

    <body>


        <div class="container">
            <!--- <h2>Kid's Latest</h2> --->
            <div id="kidsCarousel" class="carousel slide" data-bs-ride="carousel">
                <!-- Carousel Inner -->
                <div class="carousel-inner">
                    <?php
                    $kidsImages = array_column($kidsLatestProducts, 'image_path'); // Extract image paths from Kids' latest products

                    // Display images in the Carousel with a responsive number of images per slide
                    for ($i = 0; $i < count($kidsImages); $i += 3) {
                        $isActive = $i === 0 ? 'active' : ''; // Mark the first image of each set as active
                    ?>
                        <div class="carousel-item <?= $isActive; ?>">
                            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
                                <?php
                                // Loop through the next three images in the set
                                for ($j = $i; $j < $i + 3 && $j < count($kidsImages); $j++) {
                                ?>
                                    <div class="col">
                                        <a href="product-details.php?id=<?php echo $kidsLatestProducts[$j]['id']; ?>">
                                            <img src="<?= $kidsImages[$j]; ?>" class="d-block w-100" alt="Product Image">
                                        </a>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>

                <!-- Carousel Navigation Arrows -->
                <button class="carousel-control-prev" type="button" data-bs-target="#kidsCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#kidsCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>



        </div>

    </body>

    </html>