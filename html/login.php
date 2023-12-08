<?php
session_start();

if (isset($_POST['submit'])) {
    //Gjøre om POST-data til variabler
    $brukernavn = $_POST['brukernavn'];
    $passord = $_POST['passord'];
    
    
    //Koble til databasen
    $dbc = mysqli_connect('localhost', 'root', '', 'barevifterfahd') or die('Error connecting to MySQL server.');
    
    //Gjøre klar SQL-strengen
    $query = "SELECT brukernavn, password FROM users WHERE brukernavn='$brukernavn' AND password='$passord'";
    
    //Utføre spørringen
    $result = mysqli_query($dbc, $query) or die('Error querying database.');
    
    //Koble fra databasen
    mysqli_close($dbc);

    //Sjekke om spørringen gir resultater
    if ($result->num_rows > 0) {
        //Gyldig login
        $_SESSION['brukernavn'] = $brukernavn; // Store username in the session
        header('location: index.php');
        
    } else {
         //Ugyldig login
         $_SESSION['login_error'] = "wrong";
         header('location: LoginSite.php');
    }
}
?>
