<?php
session_start();
require 'db/connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $remember_me = isset($_POST['remember_me']); // Checkbox for "Remember Me"

    // Query untuk mencari user berdasarkan username
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Simpan user ID ke session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        // Jika "Remember Me" diaktifkan, set cookie
        if ($remember_me) {
            setcookie('user_id', $user['id'], time() + (30 * 24 * 60 * 60), '/'); // Cookie berlaku 30 hari
        }

        header('Location: dashboard.php');
        exit;
    } else {
        $error = "Invalid username or password!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-cover bg-center bg-[url('https://cdn.pixabay.com/photo/2013/04/03/12/05/tree-99852_1280.jpg')] flex justify-center items-center min-h-screen">
    <div class="absolute inset-0 bg-black opacity-70"></div>  

    <div class="w-full max-w-xs bg-white/10 backdrop-blur-sm p-6 rounded-lg shadow-md hover:scale-105 transition-transform duration-300">
        <h2 class="text-2xl font-bold text-white text-center mb-6">Login</h2>

        <?php if (isset($error)) echo "<p class='text-red-500 text-center'>$error</p>"; ?>

        <form action="" method="post" class="space-y-4">
            <!-- Username -->
            <div>
                <label for="username" class="block text-sm font-medium text-white">Username</label>
                <input type="text" id="username" name="username" 
                    class="w-full mt-1 p-2 border rounded-lg focus:ring-2 focus:ring-white focus:outline-none bg-white/0 text-white" 
                    placeholder="Masukkan username" required>
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-white">Password</label>
                <input type="password" id="password" name="password" 
                    class="w-full mt-1 p-2 border rounded-lg focus:ring-2 focus:ring-white focus:outline-none bg-white/0 text-white" 
                    placeholder="Masukkan password" required>
            </div>

            <!-- Remember Me -->
            <div class="flex items-center">
                <input type="checkbox" id="remember_me" name="remember_me" class="form-checkbox text-white">
                <label for="remember_me" class="ml-2 text-white text-sm">Remember Me</label>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" 
                    class="w-full bg-teal-500 text-white font-semibold py-2 rounded-lg hover:bg-teal-600 transition">
                    Masuk
                </button>
            </div>
        </form>

        <!-- Link ke Register -->
        <p class="text-center text-sm text-white/50 mt-4">
            Belum punya akun? 
            <a href="register.php" class="text-white font-medium hover:underline">Daftar di sini</a>
        </p>
    </div>
</body>
</html>
