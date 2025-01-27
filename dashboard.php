<?php
require 'db/connection.php';

session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Ambil data portfolio berdasarkan kategori
$stmt = $conn->query("SELECT * FROM portfolio ORDER BY created_at DESC");
$portfolios = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Kelompokkan portfolio berdasarkan kategori
$grouped_portfolio = [];
foreach ($portfolios as $item) {
    $grouped_portfolio[$item['category']][] = $item;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Repix Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
    <style>
        /* Mendefinisikan font Yay Holiday */
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

        .fade-in {
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }

        @keyframes zoomInOut {
            0% { 
                transform: scale(1); 
                opacity: 0.6;
            }
            50% { 
                transform: scale(1); 
                opacity: 1;
            }
            100% { 
                transform: scale(1); 
                opacity: 0.6;
            }
        }

        .zoom-item {
            animation: zoomInOut 1.9s ease-in-out infinite;
        }

        .zoom-item:nth-child(1) {
            animation-delay: 0s;
        }

        .zoom-item:nth-child(2) {
            animation-delay: 0.2s;
        }

        .zoom-item:nth-child(3) {
            animation-delay: 0.4s;
        }

        .zoom-item:nth-child(4) {
            animation-delay: 0.6s;
        }

        .zoom-item:nth-child(5) {
            animation-delay: 0.8s;
        }

        .zoom-item:nth-child(6) {
            animation-delay: 1s;
        }
    </style>
</head>
<body class="bg-gray-50 font-sans flex flex-col min-h-screen">

    <?php include 'includes/header.php'; ?>

    <div class="container mx-auto p-6">
        <h1 class="text-2xl text-center text-gray-600 fade-in"style="font-family: 'Story Milky', sans-serif;" >WELCOME TO</h1>
        <h1 class="text-4xl text-center text-blue-600 fade-in tracking-wide" style="font-family: 'Story Milky', sans-serif;">REPIX PORTFOLIO</h1>
        <p class="text-gray-600 text-center mb-8 fade-in tracking-wide">Explore my latest and most creative designs!</p>

        <!-- Portfolio Section: Loop through categories -->
        <?php foreach ($grouped_portfolio as $category => $items): ?>
            <div class="mb-10 fade-in">
                <h2 class="text-2xl font-bold text-gray-800 mb-6"><?= htmlspecialchars($category) ?> Portfolio</h2>
                
                <!-- Responsive Layout for Mobile -->
                <div class="grid grid-cols-2 gap-4 sm:hidden">
                    <?php foreach (array_slice($items, 0, 6) as $item): ?>
                        <div class="border rounded-lg shadow-lg overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-xl hover:bg-gray-100 p-4 bg-white zoom-item">
                            <img src="uploads/<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['title']) ?>" class="w-full h-40 object-cover rounded mb-4">
                            <h3 class="text-lg font-semibold text-gray-900 truncate"><?= htmlspecialchars($item['title']) ?></h3>
                            <a href="portfolio_detail.php?id=<?= $item['id'] ?>" class="text-indigo-600 mt-2 inline-block">Read More</a>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Swiper Carousel for Desktop (Tambah zoom-item disini) -->
                <div class="hidden sm:block swiper-container">
                    <div class="swiper-wrapper">
                        <?php foreach ($items as $item): ?>
                            <div class="swiper-slide zoom-item"> <!-- Tambahkan class zoom-item disini -->
                                <div class="border rounded-lg shadow-lg overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-xl hover:bg-gray-100 p-4 bg-white">
                                    <img src="uploads/<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['title']) ?>" class="w-full h-60 object-cover rounded mb-4">
                                    <h3 class="text-xl font-semibold text-gray-900"><?= htmlspecialchars($item['title']) ?></h3>
                                    <a href="portfolio_detail.php?id=<?= $item['id'] ?>" class="text-indigo-600 mt-2 inline-block">Read More</a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Lihat Selengkapnya Button -->
                <div class="mt-6 text-center">
                    <a href="portfolio_category.php?category=<?= urlencode($category) ?>" class="bg-indigo-600 text-white px-6 py-3 rounded-full shadow-md hover:bg-blue-600 transition duration-300">See More <?= htmlspecialchars($category) ?> Portfolio</a>
                </div>
            </div>
        <?php endforeach; ?>

    </div>

<script>
    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 1,
        spaceBetween: 10,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: false,
        breakpoints: {
            640: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 30,
            },
            1024: {
                slidesPerView: 4,
                spaceBetween: 40,
            },
        },
    });
</script>

    <?php include 'includes/footer.php'; ?>
</body>
</html>
