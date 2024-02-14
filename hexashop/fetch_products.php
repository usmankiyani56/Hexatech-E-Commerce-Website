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

echo "Connection was successful";

// Query the database
$result = $conn->query("SELECT * FROM products");

$products = [];

// Fetch results into an array
while ($row = $result->fetch_assoc()) {
    $products[] = $row;
}

// Close the connection
$conn->close();
?>


 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Product Display</title>
</head>
<body>
  <h1>Welcome to our Web Shop!</h1>

 <?php foreach ($products as $product): ?>
      <div>
          <h3><?= $product['name'] ?></h3>
          
           <p>Price: $<?= $product['price'] ?></p>
            <img src="<?= $product['image_path'] ?>" alt="<?= $product['name'] ?>">
       </div>
   <?php endforeach; ?>
 </body>
</html> 
