<?php
require 'db/connection.php';

if (!isset($_GET['id'])) {
    header('Location: portfolio.php');
    exit;
}

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM portfolio WHERE id = ?");
$stmt->execute([$id]);
$portfolio_item = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$portfolio_item) {
    header('Location: portfolio.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($portfolio_item['title']) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
     @font-face {
            font-family: 'Story Milky'; /* Nama font yang ingin kamu panggil */
            src: url('../assets/fonts/Story Milky.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        /* Gunakan font Yay Holiday dalam elemen tertentu */
        body {
            font-family: 'Story Milky', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">
    <?php include 'includes/header.php'; ?>
    
    <div class="container mx-auto p-6">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-4xl mx-auto">
            <div class="flex flex-col items-center">
                <!-- Kontainer untuk gambar dengan lebar responsif -->
                <div class="w-full max-w-md mx-auto mb-6">
                    <img src="uploads/<?= htmlspecialchars($portfolio_item['image']) ?>" alt="<?= htmlspecialchars($portfolio_item['title']) ?>" class="w-full h-auto object-contain rounded-lg mb-6">
                </div>
                <h1 class="text-3xl text-blue-600 mb-4"style="font-family: 'Story Milky', sans-serif;"><?= htmlspecialchars($portfolio_item['title']) ?></h1>
                <p class="text-lg text-gray-700 leading-relaxed"><?= nl2br(htmlspecialchars($portfolio_item['description'])) ?></p>
            </div>
        </div>
    </div>
    
    <?php include 'includes/footer.php'; ?>
</body>
</html>
