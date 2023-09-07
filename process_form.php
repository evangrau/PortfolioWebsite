<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Perform validation (you can add more extensive validation)
    if (empty($name) || empty($email) || empty($message)) {
        // Redirect to error page if validation fails
        header("Location: error.html");
        exit;
    }

    // Process the data (e.g., save to a database)
    try {
        // Connect to the database (replace with your actual database credentials)
        $pdo = new PDO("mysql:host=localhost:3306;dbname=website", "root", "root");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Insert data into the database
        $stmt = $pdo->prepare("INSERT INTO users (name, email, message) VALUES (:name, :email, :message)");
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":message", $message);
        $stmt->execute();

        // Redirect to success page
        header("Location: success.html");
        exit;
    } catch (PDOException $e) {
        // Handle database errors
        header("Location: error.html");
        exit;
    }
} else {
    // Handle invalid request (e.g., direct access to this script)
    header("Location: error.html");
    exit;
}
?>
