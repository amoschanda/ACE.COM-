<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the posted data
    $data = json_decode(file_get_contents('php://input'), true);
    $firstName = $data['firstName'];
    $email = $data['email'];

    // Set the recipient email address
    $to = 'acemayeson8@gmail.com';

    // Set the email subject
    $subject = 'New Signup Request';

    // Create the email message
    $message = "The first name $firstName wants to sign up.\nEmail: $email";

    // Set the email headers
    $headers = 'From: ' . $email . "\r\n" .
               'Reply-To: ' . $email . "\r\n" .
               'X-Mailer: PHP/' . phpversion();

    // Send the email
    if (mail($to, $subject, $message, $headers)) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'fail']);
    }
} else {
    echo json_encode(['status' => 'invalid']);
}
?>
