<?php
session_start();

if (isset($_SESSION['brukernavn'])) {
    $_SESSION = array();
    session_destroy();
    header("Location: registration.php");
    exit();
} else {
    
    exit();
}
