<?php
session_start();
require '../db/connection.php';

if (!isset($_SESSION['admin'])) {
    header('Location: index.php');
    exit;
}

if (!isset($_GET['id'])) {
    header('Location: dashboard.php');
    exit;
}

$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM portfolio WHERE id = ?");
$stmt->execute([$id]);

header('Location: dashboard.php');
exit;
?>
