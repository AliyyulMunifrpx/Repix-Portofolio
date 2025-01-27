<?php
session_start();
if (isset($_COOKIE['user_id'])) {
    // Jika cookie user_id ada, arahkan ke dashboard
    header('Location: dashboard.php');
    exit;
} else {
    // Jika tidak ada cookie, arahkan ke halaman login
    header('Location: login.php');
    exit;
}
?>
