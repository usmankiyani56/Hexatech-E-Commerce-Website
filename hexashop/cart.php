<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.0.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" href="mstyle.css">
  <link rel="stylesheet" href="cart.css">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.0.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" href="mstyle.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>My Web Shop</title>
  
</head>

<body>
  <?php include 'header.html'; ?>

  <div class="container mt-5">
    <h2>Shopping Cart</h2>
    <div class="row">
    <div class="col-lg-7 col-md-7 col-sm-12 bg-success">

        <table class="table">
          <thead>
            <tr>
              <th scope="col">Image</th>
              <th scope="col">Name</th>
              <th scope="col">Price</th>
              <th scope="col">Quantity</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // Check if the product details are set in the URL
            if (isset($_GET['id'], $_GET['name'], $_GET['price'], $_GET['image'])) {
              // Get the product details from the URL
              $productId = $_GET['id'];
              $productName = $_GET['name'];
              $productPrice = $_GET['price'];
              $productImage = $_GET['image'];

              // Display the product in the cart
            ?>
              <tr>
                <th scope="row"><img class="cart-img" src="<?php echo $productImage; ?>" alt=""></th>
                <td><?php echo $productName; ?></td>
                <td>$<?php echo $productPrice; ?></td>
                <td>1</td> <!-- You can handle quantity logic as needed -->
              </tr>
            <?php
            } else {
              // Handle the case where no product details are provided
              echo '<tr><td colspan="4">No items in the cart</td></tr>';
            }
            ?>
          </tbody>
        </table>
      </div>
   
    <!-- Right Column (col-5) -->
    <div class="col-lg-5 col-md-5 col-sm-12 bg-light">
      <h2>Right Column Content</h2>
      <p>This is the content of the right column.</p>
    </div>
    </div>


    <?php include 'footer.html'; ?>
</body>









<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>