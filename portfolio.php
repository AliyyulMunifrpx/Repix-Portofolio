<?php
require 'db/connection.php';

$stmt = $conn->query("SELECT * FROM portfolio ORDER BY created_at DESC");
$portfolio_items = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
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
<body class="bg-white font-sans text-gray-800 flex flex-col min-h-screen">

    <?php include 'includes/header.php'; ?>

    <div class="container mx-auto p-6">
        <h1 class="text-4xl text-center text-indigo-600 mb-6"style="font-family: 'Story Milky', sans-serif;">Portfolio</h1>

        <!-- Form Filter -->
        <form method="GET" action="portfolio.php" class="mb-6 flex justify-center space-x-4">
            <select name="category" class="w-64 px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">All Categories</option>
                <option value="Logo" <?= isset($_GET['category']) && $_GET['category'] == 'Logo' ? 'selected' : '' ?>>Logo</option>
                <option value="Poster" <?= isset($_GET['category']) && $_GET['category'] == 'Poster' ? 'selected' : '' ?>>Poster</option>
                <option value="Website" <?= isset($_GET['category']) && $_GET['category'] == 'Website' ? 'selected' : '' ?>>Website</option>
            </select>
            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600 transition duration-300">Filter</button>
        </form>

        <!-- Portfolio Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <?php
            $category = isset($_GET['category']) ? $_GET['category'] : '';
            $sql = "SELECT * FROM portfolio WHERE category LIKE ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$category ? $category : '%']);
            $portfolio_items = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($portfolio_items as $item):
            ?>
                <div class="border rounded-lg shadow-md bg-white overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-xl">
                    <img src="uploads/<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['title']) ?>" class="w-full h-48 object-cover mb-4">
                    <div class="px-4 py-2">
                        <h2 class="text-lg font-semibold text-gray-900"><?= htmlspecialchars($item['title']) ?></h2>
                        <p class="text-sm text-gray-600"><?= htmlspecialchars(substr($item['description'], 0, 100)) ?>...</p>
                        <a href="portfolio_detail.php?id=<?= $item['id'] ?>" class="text-blue-500 mt-2 inline-block">Read More</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>

    <?php include 'includes/footer.php'; ?>

</body>
</html>
