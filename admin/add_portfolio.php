<?php
session_start();
require '../db/connection.php';

if (!isset($_SESSION['admin'])) {
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = $_FILES['image'];

    if ($image['error'] == 0) {
        $targetDir = "../uploads/";
        $targetFile = $targetDir . basename($image['name']);
        if (move_uploaded_file($image['tmp_name'], $targetFile)) {
            $category = $_POST['category'];  // Ambil kategori yang dipilih

            $stmt = $conn->prepare("INSERT INTO portfolio (title, description, category, image) VALUES (?, ?, ?, ?)");
            $stmt->execute([$title, $description, $category, $image['name']]);
            
            header('Location: dashboard.php');
            exit;
        } else {
            $error = "Failed to upload image.";
        }
    } else {
        $error = "Please upload an image.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
<?php include '../includes/admin-header.php'; ?>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Add Portfolio</h1>
        <?php if (isset($error)) echo "<p class='text-red-500'>$error</p>"; ?>
        <form method="POST" enctype="multipart/form-data">
    <div class="mb-4">
        <label class="block text-gray-700">Title</label>
        <input type="text" name="title" class="w-full px-4 py-2 border rounded" required>
    </div>
    <div class="mb-4">
        <label class="block text-gray-700">Category</label>
        <select name="category" class="w-full px-4 py-2 border rounded">
            <option value="Logo">Logo</option>
            <option value="Poster">Poster</option>
            <option value="Website">Website</option>
            <!-- Add more categories as needed -->
        </select>
    </div>
    <div class="mb-4">
        <label class="block text-gray-700">Description</label>
        <textarea name="description" class="w-full px-4 py-2 border rounded" required></textarea>
    </div>
    <div class="mb-4">
        <label class="block text-gray-700">Image</label>
        <input type="file" name="image" class="w-full px-4 py-2 border" required>
    </div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add Portfolio</button>
</form>

    </div>
</body>
</html>
