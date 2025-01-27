<!DOCTYPE html>
<html lang="id">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
<header class="bg-gray-800 text-white p-4">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Logo -->
        <img src="includes/logo.png" class="w-10" alt="Logo">

        <!-- Hamburger Button -->
        <button id="menu-toggle" class="lg:hidden text-2xl focus:outline-none">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Navigasi -->
        <nav id="menu" class="hidden lg:flex space-x-6">
            <a href="dashboard.php" class="px-4 hover:text-blue-400 transition duration-300">Home</a>
            <a href="portfolio.php" class="px-4 hover:text-blue-400 transition duration-300">Portfolio</a>
            <a href="akun.php" class="px-4 hover:text-blue-400 transition duration-300">Akun</a>
        </nav>

        <!-- Social Media Logos -->
        <div id="social-links" class="hidden lg:flex space-x-4">
            <a href="https://wa.me/1234567890" target="_blank" class="text-2xl hover:text-green-500 transition duration-300">
                <i class="fab fa-whatsapp"></i>
            </a>
            <a href="https://instagram.com/repixposter" target="_blank" class="text-2xl hover:text-pink-500 transition duration-300">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="https://www.facebook.com/munifkeren.munifkeren" target="_blank" class="text-2xl hover:text-blue-600 transition duration-300">
                <i class="fab fa-facebook-f"></i>
            </a>
        </div>
    </div>

    <!-- Dropdown Menu for Mobile -->
    <div id="mobile-menu" class="hidden bg-gray-700 lg:hidden">
        <nav class="flex flex-col space-y-2 p-4">
            <a href="dashboard.php" class="hover:text-blue-400 transition duration-300">Home</a>
            <a href="portfolio.php" class="hover:text-blue-400 transition duration-300">Portfolio</a>
            <a href="akun.php" class="hover:text-blue-400 transition duration-300">Akun</a>
            <div class="flex space-x-4 mt-2">
                <a href="https://wa.me/1234567890" target="_blank" class="text-2xl hover:text-green-500 transition duration-300">
                    <i class="fab fa-whatsapp"></i>
                </a>
                <a href="https://instagram.com/repixposter" target="_blank" class="text-2xl hover:text-pink-500 transition duration-300">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://www.facebook.com/munifkeren.munifkeren" target="_blank" class="text-2xl hover:text-blue-600 transition duration-300">
                    <i class="fab fa-facebook-f"></i>
                </a>
            </div>
        </nav>
    </div>
</header>

<script>
    // Toggle mobile menu visibility
    document.getElementById('menu-toggle').addEventListener('click', function() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    });
</script>
</body>
</html>
