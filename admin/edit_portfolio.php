<?php
session_start();
require '../db/connection.php';

if (!isset($_SESSION['admin'])) {
    header('Location: index.php');
    exit;
}

if (!isset($_GET['id'])) {
    header('Location: dashboard.php');
    exit;
}

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM portfolio WHERE id = ?");
$stmt->execute([$id]);
$portfolio_item = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$portfolio_item) {
    header('Location: dashboard.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category = $_POST['category'];  // Ambil kategori yang dipilih
    $image = $_FILES['image'];

    if ($image['error'] == 0) {
        $targetDir = "../uploads/";
        $targetFile = $targetDir . basename($image['name']);
        if (move_uploaded_file($image['tmp_name'], $targetFile)) {
            $imageName = $image['name'];
        } else {
            $error = "Failed to upload image.";
        }
    } else {
        $imageName = $portfolio_item['image'];
    }

    if (!isset($error)) {
        $stmt = $conn->prepare("UPDATE portfolio SET title = ?, description = ?, category = ?, image = ? WHERE id = ?");
        $stmt->execute([$title, $description, $category, $imageName, $id]);
        header('Location: dashboard.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Edit Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
<?php include '../includes/admin-header.php'; ?>
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Edit Portfolio</h1>
        <?php if (isset($error)) echo "<p class='text-red-500'>$error</p>"; ?>
        <form method="POST" enctype="multipart/form-data">
            <!-- Title Input -->
            <div class="mb-6">
                <label class="block text-gray-700">Title</label>
                <input type="text" name="title" value="<?= htmlspecialchars($portfolio_item['title']) ?>" class="w-full px-4 py-3 border rounded-lg" required>
            </div>

            <!-- Category Dropdown -->
            <div class="mb-6">
                <label class="block text-gray-700">Category</label>
                <select name="category" class="w-full px-4 py-3 border rounded-lg">
                    <option value="Logo" <?= $portfolio_item['category'] == 'Logo' ? 'selected' : '' ?>>Logo</option>
                    <option value="Poster" <?= $portfolio_item['category'] == 'Poster' ? 'selected' : '' ?>>Poster</option>
                    <option value="Website" <?= $portfolio_item['category'] == 'Website' ? 'selected' : '' ?>>Website</option>
                    <!-- Add more categories as needed -->
                </select>
            </div>

            <!-- Description Textarea -->
            <div class="mb-6">
                <label class="block text-gray-700">Description</label>
                <textarea name="description" class="w-full px-4 py-3 border rounded-lg" required><?= htmlspecialchars($portfolio_item['description']) ?></textarea>
            </div>

            <!-- Image Upload -->
            <div class="mb-6">
                <label class="block text-gray-700">Image</label>
                <input type="file" name="image" class="w-full px-4 py-3 border rounded-lg">
                <p class="mt-2 text-sm text-gray-600">Current Image: <?= htmlspecialchars($portfolio_item['image']) ?></p>
            </div>

            <!-- Update Button -->
            <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 w-full sm:w-auto transition duration-300">Update Portfolio</button>
        </form>
    </div>
</body>
</html>
