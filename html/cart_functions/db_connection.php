<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "barevifterfahd";

// Create connection
$dbc = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$dbc) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
