<?php

session_start();

// Check if the user is logged in
if (!isset($_SESSION['brukernavn'])) {
    // Redirect or handle the case when the user is not logged in
    header('Location: ../login.php'); // Change to your login page
    exit();
}

// Retrieve user ID from the session
$user_id = $_SESSION['brukernavn'];

// Include the file with cart functions
include('cart_functions.php');

// Function to get user ID based on username
function getUserId($username) {
    global $dbc;
    
    $query = "SELECT UserID FROM users WHERE Brukernavn = '$username'";
    $result = mysqli_query($dbc, $query);

    if (!$result) {
        die('Error: ' . mysqli_error($dbc));
    }

    $row = mysqli_fetch_assoc($result);

    return $row['UserID'];
}

// Check if product_id is set in the POST request
if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : 1; // Set a default quantity if not provided

    // Retrieve the actual user ID based on the username
    $actual_user_id = getUserId($user_id);

    // Call the function to add the product to the cart
    addToCart($actual_user_id, $product_id, $quantity);

    // Redirect back to the product list or cart page
    header('Location: ../product_list.php'); // Change to your product list page
    exit();
} else {
    // Handle invalid or missing parameters
    echo 'Invalid request';
}

?>
