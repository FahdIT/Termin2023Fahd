


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


<html>
    <head>
        <link rel="stylesheet" href="css\style.css">
        <meta charset="utf-8">
        <title>PHP registrering</title>
        <link rel="stylesheet" href="css.css">
    </head>
    <body>


    <div class="hero">

<nav>
 <img src="bilder/epple.png" alt="" class="logo"> 
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="product_list.php.">Products</a></li>
      <li class="cart">
          <a href="view_cart.php">Cart<ion-icon name="basket"></ion-icon>
          </a>
        </li>
      <li><a href="LoginSite.php">Log in</a></li>
    </ul>
</nav>
</div>




<div class="log-in">
    <div class="log-in-text">
        <p>Opprett ny bruker:</p>
        <form method="post">
            <label for="brukernavn" >Brukernavn:</label>
            <input type="text" class="input-box" name="brukernavn" required /><br />

            <label for="epost">Epost:</label>
            <input type="email"  class="input-box" name="epost"  required /><br /> 

            <label for="passord">Passord:</label>
            <input type="password" class="input-box" name="passord" required /><br />


            
            <input type="submit" value="Logg inn" name="submit" class="LoginButton"/>
        </form>    

        </div>
   </div>
    </body>
    
    
    <?php
        if(isset($_POST['submit'])){
            //Gjøre om POST-data til variabler
            $brukernavn = $_POST['brukernavn'];
            $epost = $_POST['epost'];
            $passord = $_POST['passord'];   
            
            //Koble til databasen
            $dbc = mysqli_connect('localhost', 'root', '', 'barevifterfahd')
              or die('Error connecting to MySQL server.');
            
            //Gjøre klar SQL-strengen
            $query = "INSERT INTO users (Brukernavn, email, password) VALUES ('$brukernavn', '$epost', '$passord')";
            

            
            //Utføre spørringen
            $result = mysqli_query($dbc, $query)
              or die('Error querying database.');
            
            //Koble fra databasen
            mysqli_close($dbc);

            //Sjekke om spørringen gir resultater
            if($result){
                //Gyldig login
                header('location: LoginSite.php');
            }else{
                //Ugyldig login
                echo "Noe gikk galt, prøv igjen!";
            }
        }
    ?>


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

</html>