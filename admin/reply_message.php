<?php
session_start();
require '../db/connection.php';

if (!isset($_SESSION['admin'])) {
    header('Location: index.php');
    exit;
}

// Ambil pesan yang akan dibalas
if (isset($_GET['id'])) {
    $messageId = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM contact_messages WHERE id = ?");
    $stmt->execute([$messageId]);
    $message = $stmt->fetch(PDO::FETCH_ASSOC);

    // Cek apakah pesan ada
    if (!$message) {
        // Jika pesan tidak ditemukan, redirect ke dashboard atau halaman error
        header('Location: contact_messages.php');
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $reply = $_POST['reply'];

    // Update balasan dan status
    $stmt = $conn->prepare("UPDATE contact_messages SET reply = ?, is_replied = 1 WHERE id = ?");
    if (!$stmt->execute([$reply, $messageId])) {
        print_r($stmt->errorInfo());
        exit;
    }
    

    // Kirim balasan ke email pengguna
    $to = $message['email'];
    $subject = "Reply to your message";
    $body = "Hello {$message['name']},<br><br>{$reply}";

    // Kirim email (misalnya menggunakan PHPMailer)
    mail($to, $subject, $body, "Content-Type: text/html; charset=UTF-8");

    // Redirect ke contact_messages.php setelah berhasil balas
    header('Location: contact_messages.php?replied=true');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Reply to Message</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Reply to Message</h1>
        <!-- Tampilkan pesan yang diterima dari user -->
        <form method="POST" action="">
            <div class="mb-4">
                <label class="block text-gray-700">Message from: <?= htmlspecialchars($message['name']) ?></label>
                <textarea class="w-full px-4 py-2 border rounded" rows="4" readonly><?= htmlspecialchars($message['message']) ?></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Your Reply</label>
                <textarea name="reply" class="w-full px-4 py-2 border rounded" rows="4" required></textarea>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Send Reply</button>
        </form>
    </div>
</body>
</html>
