<?php
session_start();

// Hapus sesi
session_unset();
session_destroy();

// Hapus cookie jika ada
if (isset($_COOKIE['user_id'])) {
    setcookie('user_id', '', time() - 3600, '/'); // Expire cookie dengan waktu di masa lalu
}

// Redirect ke halaman login
header('Location: login.php');
exit;
?>
