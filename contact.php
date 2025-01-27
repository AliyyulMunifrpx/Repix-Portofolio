<?php
session_start();
require 'db/connection.php';

// Pastikan user sudah login
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id'];  // Gunakan user ID dari session

// Variabel untuk menampilkan status pesan
$message_status = "";

// Logika untuk menangani pengiriman pesan (INSERT)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Validasi form
    if (empty($name) || empty($email) || empty($message)) {
        die("All fields are required.");
    }

    // Insert pesan ke database
    try {
        $stmt = $conn->prepare("INSERT INTO contact_messages (user_id, name, email, message, is_replied) VALUES (?, ?, ?, ?, 0)");
        $stmt->execute([$user_id, $name, $email, $message]);

        // Status pesan berhasil
        $message_status = "<div class='mt-4'>
                <p class='font-bold'>Your Message: " . htmlspecialchars($message) . "</p>
                <p class='text-yellow-500'>Waiting for reply...</p>
              </div>";

    } catch (PDOException $e) {
        // Log error jika gagal
        file_put_contents('debug_sql.log', "Error: " . $e->getMessage() . "\n", FILE_APPEND);
        die("Error: " . $e->getMessage());
    }
}

// Ambil chat yang sudah ada
try {
    $stmt = $conn->prepare("SELECT * FROM contact_messages WHERE user_id = ? ORDER BY created_at ASC");
    $stmt->execute([$user_id]);
    $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    file_put_contents('debug_sql.log', "Error fetching chats: " . $e->getMessage() . "\n", FILE_APPEND);
    die("Error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-white font-sans text-gray-800 flex flex-col min-h-screen">

    <?php include 'includes/header.php'; ?>

    <div class="container mx-auto p-6">
        <h1 class="text-4xl font-semibold text-center text-indigo-600 mb-6">Contact Admin</h1>
        <p class="text-gray-600 text-center mb-6">Feel free to reach out for collaborations or just a friendly chat!</p>

        <!-- Form untuk mengirim pesan -->
        <form id="messageForm" class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg" method="POST">
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Your Name</label>
                <input type="text" name="name" id="name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Your Email</label>
                <input type="email" name="email" id="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="message" class="block text-gray-700">Message</label>
                <textarea name="message" id="message" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition duration-300">Send Message</button>
        </form>

        <!-- Tampilkan chat sebelumnya dan balasan admin -->
        <div id="chatSection" class="mt-6">
            <?php
            if (empty($messages)) {
                echo "<p>No messages found. Start a conversation!</p>";
            } else {
                foreach ($messages as $message) {
                    echo "<div class='mt-4'>
                            <p class='font-bold'>" . htmlspecialchars($message['name']) . ":</p>
                            <p>" . htmlspecialchars($message['message']) . "</p>";
                    
                    if ($message['is_replied'] == 1) {
                        echo "<p class='text-green-500'>Admin: " . htmlspecialchars($message['reply']) . "</p>";
                    } else {
                        echo "<p class='text-yellow-500'>Waiting for reply...</p>";
                    }

                    // Tombol Hapus Chat

                    echo "</div>";
                }
            }
            ?>
        </div>

        <!-- Menampilkan status pengiriman pesan setelah form -->
        <?php
        if ($message_status) {
            echo $message_status; // Menampilkan status pesan di bawah form
        }
        ?>

    </div>

    <?php include 'includes/footer.php'; ?>

</body>
</html>
