<?php
session_start();
 if ($_SESSION['logged_in'] != true) {
    header('Location: /login.html');
    exit;
 };
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>csDOS</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
<nav>
        <ul class="navbar">
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Portfolio</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </nav>
</body>

</html>