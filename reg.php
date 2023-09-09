<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$connect = new mysqli("localhost", "ciaran", "", "gamba");
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

$username = trim($_POST['username']);
$password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);
$email = trim($_POST['email']);
$activation_token = uniqid();
$userDataSQL = "INSERT INTO users (username, password, email, activated) VALUES ('$username', '$password', '$email', 0)";

if ($connect->query($userDataSQL) === TRUE) {
    echo "Successfully Registered, please check email for activation link.";
} else {
    echo "Error";
}
$idQuery = "SELECT id FROM Users WHERE username='$username'";
$idResult = $connect->query($idQuery);
$row = $idResult -> fetch_assoc();
$idFinal = $row['id'];

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
    $mail->Subject = 'Activation Email';
    $mail->Body    = 'Thanks for joining! Click the link to activate your account. http://127.0.0.1/activate.php?uid=' . $idFinal;

    $mail->send();
    echo ' Email sent successfully!';
} catch (Exception $e) {
    echo 'Email could not be sent. Mailer Error: ', $mail->ErrorInfo;
}



$connect->close();
