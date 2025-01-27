<?php
require 'db/connection.php';

if (!isset($_GET['category'])) {
    header('Location: index.php');
    exit;
}

$category = $_GET['category'];

// Ambil semua portfolio berdasarkan kategori
$stmt = $conn->prepare("SELECT * FROM portfolio WHERE category = ? ORDER BY created_at DESC");
$stmt->execute([$category]);
$portfolios = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio - <?= htmlspecialchars($category) ?></title>
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
        <h1 class="text-4xl text-center text-blue-600 mb-6" style="font-family: 'Story Milky', sans-serif;"><?= htmlspecialchars($category) ?> Portfolio</h1>

        <!-- Portfolio Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <?php foreach ($portfolios as $item): ?>
                <div class="border rounded-lg shadow-md bg-white overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-xl">
                    <img src="uploads/<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['title']) ?>" class="w-full h-48 object-cover mb-4">
                    <div class="px-4 py-2">
                        <h2 class="text-lg font-semibold text-gray-900"><?= htmlspecialchars($item['title']) ?></h2>
                        <a href="portfolio_detail.php?id=<?= $item['id'] ?>" class="text-blue-500 mt-2 inline-block">Read More</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>

    <?php include 'includes/footer.php'; ?>

</body>
</html>
