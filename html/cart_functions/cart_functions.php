<?php

// Include your database connection
include('db_connection.php'); // Adjust the path accordingly

function addToCart($user_id, $product_id, $quantity) {
    global $dbc;

    // Check if the product is already in the user's cart
    $checkQuery = "SELECT * FROM cart WHERE UserID = '$user_id' AND ProductID = '$product_id'";
    $checkResult = mysqli_query($dbc, $checkQuery);

    if (!$checkResult) {
        die('Error: ' . mysqli_error($dbc));
    }

    if (mysqli_num_rows($checkResult) > 0) {
        // If the product is already in the cart, update the quantity
        $updateQuery = "UPDATE cart SET quantity = quantity + '$quantity' WHERE UserID = '$user_id' AND ProductID = '$product_id'";
        mysqli_query($dbc, $updateQuery);
    } else {
        // If the product is not in the cart, insert a new record
        $insertQuery = "INSERT INTO cart (UserID, ProductID, quantity) VALUES ('$user_id', '$product_id', '$quantity')";
        mysqli_query($dbc, $insertQuery);

        // Check for errors in the insert query
        if (mysqli_errno($dbc) == 1452) {
            die('Foreign key constraint failure: User does not exist.');
        } elseif (mysqli_errno($dbc)) {
            die('Error: ' . mysqli_error($dbc));
        }
    }
}




// cart_functions.php

function getCartContents($user_id) {
    global $dbc; // Assuming you've defined $dbc in your file

    // Use prepared statements to prevent SQL injection
    $query = "SELECT p.ProductID, p.navn AS product_name, p.pris AS price, c.quantity
              FROM barevifterfahd.cart c
              JOIN barevifterfahd.product p ON c.ProductID = p.ProductID
              WHERE c.UserID = ?";

    $stmt = mysqli_prepare($dbc, $query);
    mysqli_stmt_bind_param($stmt, "s", $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (!$result) {
        die('Error fetching cart contents: ' . mysqli_error($dbc));
    }

    $cartContents = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $cartContents[] = $row;
    }

    mysqli_free_result($result);

    return $cartContents;
}



// You can add other cart-related functions here as well


// Rest of your functions
?>
