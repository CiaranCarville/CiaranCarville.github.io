<?php
session_start();
$connect = new mysqli("localhost", "ciaran", "", "gamba");
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$email = $_POST['email'];

$credCheck = "SELECT * FROM Users WHERE username='$username'";


$result = $connect->query($credCheck);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $storedPasswordHash = $row['password'];

    if (password_verify($_POST['password'], $storedPasswordHash)) {
        echo "Login Succ";
        $_SESSION['user_id'] = $user_id; // Store the user's ID
        $_SESSION['username'] = $username; // Store the username
        $_SESSION['logged_in'] = true; // Flag to indicate the user is logged in
    } else {
        echo "Incorrect Password";
    }
} else {
    echo "User not found";
}
