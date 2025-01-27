<?php
session_start();
require 'db/connection.php';

// Pastikan user sudah login
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Ambil user_id dari session
$user_id = $_SESSION['user_id'];

// Query ke database untuk mendapatkan data user berdasarkan user_id
$stmt = $conn->prepare("SELECT username FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Cek apakah data user ditemukan
if (!$user) {
    die("User not found.");
}

// Ambil username dari hasil query
$username = $user['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Akun</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">
    <?php include 'includes/header.php'; ?>
    
    <div class="container mx-auto p-6">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-md mx-auto">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Your Account</h2>
            <p class="text-gray-600 mb-4">Welcome back, <strong class="text-blue-600"><?= htmlspecialchars($username) ?></strong></p>

            <div class="space-y-4">
                <!-- Tombol logout -->
                <a href="logout.php" class="w-full inline-block text-center bg-red-500 text-white py-2 rounded hover:bg-red-600 transition-all duration-200">
                    Logout
                </a>
            </div>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>
</body>
</html>
