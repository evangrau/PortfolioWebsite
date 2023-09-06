<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Perform form validation and processing here (e.g., sending an email).

    // Redirect the user to a success or error page based on the result.
    $success = true; // Replace with your actual success condition.
    if ($success) {
        header("Location: success.html"); // Redirect to a success page
    } else {
        header("Location: error.html"); // Redirect to an error page
    }
    exit;
}
?>
