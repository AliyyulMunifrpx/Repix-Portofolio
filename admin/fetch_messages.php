<?php
require '../db/connection.php';

// Ambil pesan yang belum dibalas
$stmt = $conn->query("SELECT * FROM contact_messages WHERE is_replied = 0 ORDER BY created_at DESC");
$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($messages as $message) {
    echo "<tr class='border-t' id='message-{$message['id']}'>";
    echo "<td class='px-4 py-2'>" . htmlspecialchars($message['name']) . "</td>";
    echo "<td class='px-4 py-2'>" . htmlspecialchars($message['message']) . "</td>";
    echo "<td class='px-4 py-2'>";
    echo "<a href='reply_message.php?id={$message['id']}' class='text-blue-500'>Reply</a>";
    echo "</td></tr>";
}
?>
