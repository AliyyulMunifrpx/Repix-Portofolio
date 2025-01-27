<?php
$host = 'localhost';
$dbname = 'portfolio';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
file_put_contents('debug_connection.log', "Database connected successfully.\n", FILE_APPEND);

?>
