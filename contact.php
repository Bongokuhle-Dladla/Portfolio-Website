<?php
header('Content-Type: application/json'); // Set the content type to JSON

$response = ['success' => false]; // Default response

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Basic validation
    if (!empty($name) && !empty($email) && !empty($message)) {
        // Process the data, e.g., send an email
        $to = 'your-email@example.com'; // Replace with your email address
        $subject = 'New Contact Form Submission';
        $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";
        $headers = 'From: ' . $email;

        // Attempt to send email
        if (mail($to, $subject, $body, $headers)) {
            $response['success'] = true; // Success
        } else {
            $response['error'] = 'Failed to send email.'; // Error
        }
    } else {
        $response['error'] = 'Please fill in all required fields.'; // Validation error
    }
} else {
    $response['error'] = 'Invalid request method.'; // Request method error
}

// Return JSON response
echo json_encode($response);
?>
