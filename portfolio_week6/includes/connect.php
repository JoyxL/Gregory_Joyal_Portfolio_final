<?php
$dsn = "mysql:host=localhost;dbname=uskeym93_portfolio;charset=utf8mb4";
try {
$connection = new PDO($dsn, 'uskeym93_joyal', 'joyal@123');
} catch (Exception $e) {
  error_log($e->getMessage());
  exit('unable to connect');
}
?>