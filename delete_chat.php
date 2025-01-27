<?php
session_start();
require 'db/connection.php';

if (!isset($_SESSION['user_id'])) {
    die("User not logged in.");
}

$user_id = $_SESSION['user_id'];

if (isset($_GET['chat_id'])) {
    $chat_id = $_GET['chat_id']; // Ambil ID chat yang akan dihapus

    try {
        // Hapus chat berdasarkan ID dan user_id
        $stmt = $conn->prepare("DELETE FROM contact_messages WHERE id = ? AND user_id = ?");
        $stmt->execute([$chat_id, $user_id]);

        echo "Chat has been deleted.";  // Tampilkan pesan sukses
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "No chat ID provided!";
}
?>
