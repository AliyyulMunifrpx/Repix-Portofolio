<?php
session_start();
require 'db/connection.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id']; // Gunakan user_id sesuai dengan sesi dari login

try {
    $stmt = $conn->prepare("SELECT * FROM contact_messages WHERE user_id = ? ORDER BY created_at ASC");
    $stmt->execute([$user_id]);
    $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($messages as $message) {
        echo "<div class='mt-4'>
                <p class='font-bold'>" . htmlspecialchars($message['name']) . ":</p>
                <p>" . htmlspecialchars($message['message']) . "</p>";

        if ($message['is_replied'] == 1) {
            echo "<p class='text-green-500'>Admin: " . htmlspecialchars($message['reply']) . "</p>";
        } else {
            echo "<p class='text-yellow-500'>Waiting for reply...</p>";
        }

        echo "</div>";
    }
} catch (PDOException $e) {
    echo "<p class='text-red-500'>Error fetching messages: " . htmlspecialchars($e->getMessage()) . "</p>";
}
?>
