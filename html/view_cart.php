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
    
    <script type="module" src="https://unpkg.com/ionicons/dist/ionicons/ionicons.esm.js"></script>



<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


// Include the file with cart functions using an absolute path
include(__DIR__ . '/cart_functions/cart_functions.php');

// Retrieve user ID from the session
$user_id = $_SESSION['brukernavn']; // Assuming you have stored user ID in the session

// Retrieve cart contents
$cartContents = getCartContents($user_id);

// Display cart contents
foreach ($cartContents as $cartItem) {
    echo '<div>';
    echo '<h2>' . $cartItem['product_name'] . '</h2>';
    echo '<p>Quantity: ' . $cartItem['quantity'] . '</p>';
    echo '<p>Price: ' . $cartItem['price'] . '</p>';
    // Add more details as needed
    echo '</div>';
}
?>
