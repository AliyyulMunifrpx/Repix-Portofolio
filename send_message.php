<?php
session_start();
require 'db/connection.php';

// Debugging session (hanya aktif di lingkungan pengembangan)
if (getenv('APP_ENV') === 'development') {
    file_put_contents('debug_session.log', "Session User (ID): " . $_SESSION['user_id'] . "\n", FILE_APPEND);
}

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id'];  // Gunakan user ID dari session

// Ambil data form
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$message = trim($_POST['message']);

// Debugging data form (hanya aktif di lingkungan pengembangan)
if (getenv('APP_ENV') === 'development') {
    file_put_contents('debug_form.log', "Session User: $user_id\nName: $name\nEmail: $email\nMessage: $message\n", FILE_APPEND);
}

// Validasi data
if (empty($name) || empty($email) || empty($message)) {
    die("All fields are required.");
}

// Validasi email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email format.");
}

// Sanitasi nama dan pesan untuk mencegah XSS
$name = htmlspecialchars($name);
$message = htmlspecialchars($message);

try {
    // Simpan pesan ke database
    $stmt = $conn->prepare("INSERT INTO contact_messages (user_id, name, email, message, is_replied) VALUES (?, ?, ?, ?, 0)");
    $stmt->execute([$user_id, $name, $email, $message]);

    // Debugging jika berhasil (hanya aktif di lingkungan pengembangan)
    if (getenv('APP_ENV') === 'development') {
        file_put_contents('debug_sql.log', "Message inserted successfully for user ID: $user_id\n", FILE_APPEND);
    }

    // Simpan nama dan email di session (hanya jika diperlukan)
    $_SESSION['user_name'] = $name;
    $_SESSION['user_email'] = $email;

} catch (PDOException $e) {
    // Log error jika gagal
    if (getenv('APP_ENV') === 'development') {
        file_put_contents('debug_sql.log', "Error: " . $e->getMessage() . "\n", FILE_APPEND);
    }
    die("Error: " . $e->getMessage());
}
file_put_contents('debug_form.log', "Name: $name, Email: $email, Message: $message\n", FILE_APPEND);

// Validasi data form
if (empty($name) || empty($email) || empty($message)) {
    die("All fields are required.");
}

// Cek apakah email valid
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email format.");
}

// Mengembalikan pesan status
echo "<div class='mt-4'>
        <p class='font-bold'>Your Message: " . htmlspecialchars($message) . "</p>
        <p class='text-yellow-500'>Waiting for reply...</p>
      </div>";
?>
