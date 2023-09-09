<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();                                        // Send using SMTP
    $mail->Host       = '127.0.0.1';                   // SMTP server
    $mail->SMTPAuth   = true;                               // Enable SMTP authentication
    $mail->Username   = 'ccSafety@protonmail.com';             // SMTP username
    $mail->Password   = '20PUMb4NyuXbJJbHqXKjHQ';                    // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;     // Enable TLS encryption
    $mail->Port       = 1025;                                // TCP port to connect to
    $mail->SMTPOptions = [
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true,
        ],
    ];
    // Recipients
    $mail->setFrom('ccSafety@protonmail.com', 'Safety');
    $mail->addAddress('ciarancarville@pm.me');              // Add a recipient

    // Content
    $mail->isHTML(true);                                    // Set email format to HTML
    $mail->Subject = 'Hello, World!';
    $mail->Body    = 'This is a test email sent from PHPMailer.';

    $mail->send();
    echo 'Email sent successfully!';
} catch (Exception $e) {
    echo 'Email could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
