
<?php
session_start();

// Database configuration
$host = "localhost";
$username = "root";
$password = "";
$database = "barevifterfahd";

// Create a database connection
$dbc = mysqli_connect('localhost', 'root', '', 'barevifterfahd') or die('Error connecting to MySQL server.');

// Check if the user is already logged in, if yes then redirect him to welcome page



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    
    <title>Document</title>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="css.css">
    <script src="Java.js"></script>
</head>

<body>
    
<div class="hero">

    <nav>
        <img src="bilder/epple.png" alt="" class="logo">
      


        <ul>
        
        <?php
       if (isset($_SESSION['brukernavn'])) {
           $brukernavn = $_SESSION['brukernavn'];
           // Now you can use $brukernavn safely
           echo '<li><p class="popuplog">Welcome ' . $brukernavn . '</p></li>'; } ?>

          <li><a href="index.php">Home</a></li>
          <li><a href="product_list.php">Phones</li>
          <li class="cart">
              <a href="view_cart.php">Cart<ion-icon name="basket"></ion-icon>
              </a>
          </li>
            <?php
       
       // Check if the session variable is set before using it
       if (isset($_SESSION['brukernavn'])) {
           $brukernavn = $_SESSION['brukernavn'];
           // Now you can use $brukernavn safely
           echo '<li><form action="logout.php" method="post"><button class="logout" type="submit">Logout</button></form></li>';
       } else {
           // Handle the case when the user is not logged in
           echo '<li><a href="loginSite.php">Login</a></li>';
       }
       ?>
      




        </ul>
    </nav>
</div>




<div class="Space">
    <div class="text">
        <h1>Shoes</h1>
        <p>Shoes for every occasion</p>
    </div>
</div>
<div class="product-row-body">

<?php
include('cart_functions/db_connection.php');

// Function to get products from the database
function getProductsFromDatabase() {
    global $dbc;

    // Query to select products from the database
    $query = "SELECT * FROM barevifterfahd.product";

    // Perform the query
    $result = mysqli_query($dbc, $query);

    if (!$result) {
        // Handle the query error
        die('Error fetching products: ' . mysqli_error($dbc));
    }

    // Fetch the results into an associative array
    $products = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $products[] = $row;
    }

    // Free the result set
    mysqli_free_result($result);

    return $products;
}

// Call the function to get products from the database
$products = getProductsFromDatabase();

// Display product list
foreach ($products as $product) {
    echo '<div class="ProductsRow">';
    echo '<div class="productsBox">';
    echo '<div class="products">';
    echo '<h2>' . $product['navn'] . '</h2>';
    echo '<img src="' . $product['bilde'] . '" alt="' . $product['navn'] . '">';
    echo '<p>Price: ' . $product['pris'] . 'kr</p>';
    echo '<form action="cart_functions/add_to_cart.php" method="post">';
    echo '<input type="hidden" name="product_id" value="' . $product['ProductID'] . '">';

    echo '<button type="submit">Add to Cart</button>';
    echo '</form>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
}
?>



</div>



<footer class="footer">
        <div class="container">
          <div class="row">
            <div class="footer-col">
              <h4>company</h4>
              <ul>
                <li><a href="#">about us</a></li>
                <li><a href="#">our services</a></li>
                <li><a href="#">privacy policy</a></li>
                <li><a href="#">affiliate program</a></li>
              </ul>
            </div>
            <div class="footer-col">
              <h4>get help</h4>
              <ul>
                <li><a href="#">FAQ</a></li>
                <li><a href="#">returns</a></li>
                <li><a href="#">order status</a></li>
                <li><a href="#">payment options</a></li>
              </ul>
            </div>
            <div class="footer-col">
              <h4>Extra</h4>
              <ul>
                <li><a href="../shush/HTML/index.html" target="_blank">Home-Site</a></li>
                <li><a href="../shush/HTML/Portfolio.html" target="_blank">portefolio</a></li>
                <li><a href="../shush/HTML/About-me.html" target="_blank">About-Me</a></li>
                <li><a href="../Design-Manual-Shoe-Shop.pdf" download="design">Download-Design-manual</a></li>
              </ul>
            </div>   
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <p>© 2023 Triple S. All Rights Reserved</p>
    </div>

</body>

</body>