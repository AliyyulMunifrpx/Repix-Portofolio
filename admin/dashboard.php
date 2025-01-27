<?php 
session_start();
require '../db/connection.php';

if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

$category = isset($_GET['category']) ? $_GET['category'] : '';
$sql = "SELECT * FROM portfolio WHERE category LIKE ? ORDER BY created_at DESC";
$stmt = $conn->prepare($sql);
$stmt->execute([$category ? $category : '%']);
$portfolio_items = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
<?php include '../includes/admin-header.php'; ?>

    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Dashboard</h1>
        
        <!-- Add New Portfolio Button -->
        <a href="add_portfolio.php" class="bg-green-500 text-white px-6 py-3 rounded-lg hover:bg-green-600 mb-6 inline-block">Add New Portfolio</a>

        <!-- Filter by Category -->
        <form method="GET" action="dashboard.php" class="my-4">
            <select name="category" class="w-full px-4 py-3 border rounded-lg mb-4">
                <option value="">All Categories</option>
                <option value="Logo" <?= $category == 'Logo' ? 'selected' : '' ?>>Logo</option>
                <option value="Poster" <?= $category == 'Poster' ? 'selected' : '' ?>>Poster</option>
                <option value="Website" <?= $category == 'Website' ? 'selected' : '' ?>>Website</option>
                <!-- Add more categories as needed -->
            </select>
            <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 transition duration-300 w-full sm:w-auto">Filter</button>
        </form>

        <!-- Portfolio Table -->
        <table class="w-full mt-6 border-collapse">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-6 py-3 text-left">Title</th>
                    <th class="px-6 py-3 text-left">Category</th>
                    <th class="px-6 py-3 text-left">Created At</th>
                    <th class="px-6 py-3 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($portfolio_items as $item): ?>
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-6 py-4"><?= htmlspecialchars($item['title']) ?></td>
                        <td class="px-6 py-4"><?= htmlspecialchars($item['category']) ?></td>
                        <td class="px-6 py-4"><?= htmlspecialchars($item['created_at']) ?></td>
                        <td class="px-6 py-4">
                            <a href="edit_portfolio.php?id=<?= $item['id'] ?>" class="text-blue-500 hover:text-blue-700">Edit</a> | 
                            <a href="delete_portfolio.php?id=<?= $item['id'] ?>" class="text-red-500 hover:text-red-700" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
