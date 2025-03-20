<?php
// contact.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Basic validation
    if (!empty($name) && !empty($email) && !empty($message)) {
        // Send email (example, adjust as needed)
        $to = "your-email@example.com"; // Replace with your email
        $subject = "New Contact Form Submission";
        $body = "Name: $name\nEmail: $email\nMessage:\n$message";
        $headers = "From: $email";

        if (mail($to, $subject, $body, $headers)) {
            $success = "Your message has been sent successfully!";
        } else {
            $error = "Failed to send your message. Please try again.";
        }
    } else {
        $error = "All fields are required.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
</head>
<body>
    <h1>Contact Us</h1>
    <?php if (!empty($success)) echo "<p style='color: green;'>$success</p>"; ?>
    <?php if (!empty($error)) echo "<p style='color: red;'>$error</p>"; ?>
    <form action="contact.php" method="POST">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="message">Message:</label><br>
        <textarea id="message" name="message" rows="5" required></textarea><br><br>

        <button type="submit">Send</button>
    </form>
</body>
</html>