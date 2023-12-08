

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
    <link rel="stylesheet" href="css\style.css">
    <meta charset="utf-8">
    <title>PHP Innlogging</title>
    <link rel="stylesheet" href="css.css">

</head>
<div class="hero">

    <nav>
        <img src="bilder/epple.png" alt="" class="logo">
      


        <ul>
        

          <li><a href="index.php">Home</a></li>
          <li><a href="product_list.php">Phones</li>
          <li class="cart">
              <a href="view_cart.php">Cart<ion-icon name="basket"></ion-icon>
              </a>
          </li>
      




        </ul>
    </nav>
</div>
    
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>

<div class="log-in">
    <div class="log-in-text">
        <h1>Log in:</h1>
        <form method="post" action="login.php">


            <label for="brukernavn">Brukernavn:</label>
            <input type="text" class="input-box" name="brukernavn" /><br />

            <label for="passord">Passord:</label>
            <input type="password" class="input-box" name="passord" /><br />

            <input type="submit" value="Logg inn" name="submit"  class="LoginButton"/>
            <?php
            if (isset($_SESSION['login_error'])) {
                echo '<p class="error"> Feil brukernavn eller passord</p>';
                unset($_SESSION['login_error']);
            }
            ?>
            
        </form>
        <p class="registrer">Eller klikk <a href="registration.php">her</a> for å registrere ny bruker</p>
    </div>           
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
</html>
