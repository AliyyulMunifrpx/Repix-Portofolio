<?php
require 'db/connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Query tanpa email
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->execute([$username, $password]);

    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-cover bg-center bg-[url('https://cdn.pixabay.com/photo/2013/04/03/12/05/tree-99852_1280.jpg')] flex justify-center items-center min-h-screen">
    <div class="absolute inset-0 bg-black opacity-70"></div>  

    <div class="w-full max-w-xs bg-white/10 backdrop-blur-sm p-6 rounded-lg shadow-md hover:scale-105 transition-transform duration-300">
        <!-- Logo dan Text "Welcome" -->
       
            <img src="includes/logo.png" alt="Repix Logo" class="mx-auto h-20 mb-4">
        
        
       

        <h2 class="text-2xl font-bold text-white text-center mb-6">Register</h2>

        <form method="POST" action="" class="space-y-4">
            <!-- Username -->
            <div>
                <label for="username" class="block text-sm font-medium text-white">Username</label>
                <input type="text" id="username" name="username" 
                    class="w-full mt-1 p-2 border rounded-lg focus:ring-2 focus:ring-white focus:outline-none bg-white/0 text-white" 
                    placeholder="Enter your username" required>
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-white">Password</label>
                <input type="password" id="password" name="password" 
                    class="w-full mt-1 p-2 border rounded-lg focus:ring-2 focus:ring-white focus:outline-none bg-white/0 text-white" 
                    placeholder="Enter your password" required>
            </div>

            <!-- Register Button -->
            <div>
                <button type="submit" 
                    class="w-full bg-teal-500 text-white font-semibold py-2 rounded-lg hover:bg-teal-600 transition">
                    Register
                </button>
            </div>
        </form>

        <!-- Link to Login Page -->
        <p class="text-center text-sm text-white/50 mt-4">
            Already have an account? 
            <a href="login.php" class="text-white font-medium hover:underline">Login here</a>
        </p>
    </div>
</body>
</html>
