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
</head>

<body>
  
</body>

</html>