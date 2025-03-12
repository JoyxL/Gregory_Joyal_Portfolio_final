<?php
$servername = "localhost";
$username = "uskeym93_joyal";
$password = "joyal@123";
$dbname = "uskeym93_portfolio";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
