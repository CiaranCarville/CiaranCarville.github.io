<?php
$connect = new mysqli("localhost", "ciaran", "", "gamba");
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

if (isset($_GET['uid'])) {    
    $uid = $_GET['uid'];
    $sql = "UPDATE Users SET activated = 1 WHERE id = '$uid'";
};


if ($connect->query($sql) === TRUE) {
    echo "Activation successful";
} else {
    echo "Try again";
}