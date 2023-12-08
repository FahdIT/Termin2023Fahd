
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

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>

<div class="video-container">
  <a href="../shush/HTML/index.html"></a>
    <H1> BLACK FRIDAY DEALS!</H1>
    <h4><a href="">Click here to find out more!</a></h4>
<video autoplay loop muted src="bilder/epplevid.mp4" class="video-ad"></video>
</div>

<div class="profil">
  <h1>About Epple </h1>
 <p>
  Welcome to Epple,<br>
  where innovation meets simplicity! At Epple, we believe in making technology accessible and enjoyable for everyone. <br>
   we're committed to redefining your cooling experience.</p>

   <p>Our range of cutting-edge products is designed with you in mind, seamlessly blending style and functionality. <br>
   Explore a world of possibilities with Epple, where each device is crafted to enhance your everyday experiences. <br>
   Embrace the future with confidence, as we bring you the latest in technology, packaged with a touch of elegance.</p>

    <p>Join us on a journey of convenience,  <br>
    reliability, and excitement with Epple where your world meets innovation. <br>
</div>


    







<h1 id="Container-title">POPULAR NOW</h1>

<div class="container-box">

    

     <div class="box1">
        <div class="box-text">
          
            <h1>Domair portabel aircondition DOM100380</h1>
            <h3>fra 1 245,00 kr</h3>
            </div>
    
     
    
     </div>
    
    <div class="box2">
        <div class="box-text">

            <h1>MeacoFan 1056P, stillegående vifte på stativ</h1>
            <h3>fra 999,00 kr</h3>
            </div>
    
     
    
     </div>
    
     <div class="box3">
        <div class="box-text">
        <h1>MeacoFan 360 vifte</h1>
        <h3>fra 1 399,00 kr</h3>
        </div>

    
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