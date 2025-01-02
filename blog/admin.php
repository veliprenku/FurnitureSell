<?php
session_start();
include('db.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$action = isset($_GET['action']) ? $_GET['action'] : 'posts';

if ($action == 'edit' && isset($_GET['delete_image'])) {
    $id = intval($_GET['id']);
    $image_index = intval($_GET['delete_image']);
    $result = $conn->query("SELECT * FROM posts WHERE id=$id");
    if ($result->num_rows > 0) {
        $post = $result->fetch_assoc();
        $images = unserialize($post['images']);
        if (isset($images[$image_index])) {
            $image_to_delete = $images[$image_index];
            $image_path = "uploads/" . $image_to_delete;
            if (file_exists($image_path)) {
                unlink($image_path);
            }
            unset($images[$image_index]);
            $images = array_values($images);
            $images_serialized = serialize($images);
            $stmt = $conn->prepare("UPDATE posts SET images=? WHERE id=?");
            $stmt->bind_param("si", $images_serialized, $id);
            $stmt->execute();
            $stmt->close();
            header("Location: admin.php?action=edit&id=$id");
            exit();
        }
    }
}

if ($action == 'add' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $images = [];
    if (isset($_FILES['images'])) {
        foreach ($_FILES['images']['name'] as $key => $image_name) {
            if (!empty($image_name)) {
                $fileType = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
                $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
                if (in_array($fileType, $allowedTypes)) {
                    $unique_name = uniqid() . "_" . basename($image_name);
                    $target = "uploads/" . $unique_name;
                    move_uploaded_file($_FILES['images']['tmp_name'][$key], $target);
                    $images[] = $unique_name;
                }
            }
        }
    }
    $images_serialized = serialize($images);
    $stmt = $conn->prepare("INSERT INTO posts (title, content, images) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $title, $content, $images_serialized);
    $stmt->execute();
    $stmt->close();
    header("Location: admin.php?action=posts");
    exit();
}

if ($action == 'edit' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_GET['id']);
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $result = $conn->query("SELECT * FROM posts WHERE id=$id");
    if ($result->num_rows > 0) {
        $post = $result->fetch_assoc();
        $images = unserialize($post['images']);
        if (isset($_FILES['images'])) {
            foreach ($_FILES['images']['name'] as $key => $image_name) {
                if (!empty($image_name)) {
                    $fileType = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
                    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
                    if (in_array($fileType, $allowedTypes)) {
                        $unique_name = uniqid() . "_" . basename($image_name);
                        $target = "uploads/" . $unique_name;
                        move_uploaded_file($_FILES['images']['tmp_name'][$key], $target);
                        $images[] = $unique_name;
                    }
                }
            }
        }
        $images_serialized = serialize($images);
        $stmt = $conn->prepare("UPDATE posts SET title=?, content=?, images=? WHERE id=?");
        $stmt->bind_param("sssi", $title, $content, $images_serialized, $id);
        $stmt->execute();
        $stmt->close();
        header("Location: admin.php?action=posts");
        exit();
    }
}

if ($action == 'delete') {
    $id = intval($_GET['id']);
    $result = $conn->query("SELECT * FROM posts WHERE id=$id");
    if ($result->num_rows > 0) {
        $post = $result->fetch_assoc();
        $images = unserialize($post['images']);
        if (!empty($images)) {
            foreach ($images as $image) {
                $image_path = "uploads/" . $image;
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }
        }
    }
    $stmt = $conn->prepare("DELETE FROM posts WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    header("Location: admin.php?action=posts");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1D4ED8',
                        danger: '#EF4444',
                        success: '#10B981',
                        warning: '#F59E0B',
                    },
                },
            },
        }
    </script>
</head>
<body class="bg-gray-100 font-sans">
    <div class="flex">
        <aside class="bg-primary text-white w-64 min-h-screen p-6">
            <h2 class="text-2xl font-bold mb-6">Admin Dashboard</h2>
            <nav>
                <ul>
                    <li><a href="?action=posts" class="block py-2 px-4 hover:bg-blue-600 rounded">Posts</a></li>
                    <li><a href="?action=add" class="block py-2 px-4 hover:bg-blue-600 rounded">Add Post</a></li>
                    <li><a href="logout.php" class="block py-2 px-4 hover:bg-red-600 rounded">Logout</a></li>
                </ul>
            </nav>
        </aside>
        <main class="flex-1 p-6">
            <?php if ($action == 'add'): ?>
                <form class="bg-white p-6 rounded shadow-md" method="post" enctype="multipart/form-data">
                    <h3 class="text-2xl font-bold mb-4">Add New Post</h3>
                    <input type="text" name="title" class="w-full mb-4 px-4 py-2 border rounded" placeholder="Title" required>
                    <textarea name="content" class="w-full mb-4 px-4 py-2 border rounded" placeholder="Content" required></textarea>
                    <input type="file" name="images[]" multiple class="w-full mb-4">
                    <button type="submit" class="bg-primary text-white py-2 px-6 rounded">Add Post</button>
                </form>
            <?php elseif ($action == 'edit' && isset($_GET['id'])): 
                $id = intval($_GET['id']);
                $result = $conn->query("SELECT * FROM posts WHERE id=$id");
                $post = $result->fetch_assoc();
                $images = unserialize($post['images']);
            ?>
                <form class="bg-white p-6 rounded shadow-md" method="post" enctype="multipart/form-data">
                    <h3 class="text-2xl font-bold mb-4">Edit Post</h3>
                    <input type="text" name="title" value="<?php echo $post['title']; ?>" class="w-full mb-4 px-4 py-2 border rounded" required>
                    <textarea name="content" class="w-full mb-4 px-4 py-2 border rounded"><?php echo $post['content']; ?></textarea>
                    <div class="flex space-x-4 mb-4">
                        <?php foreach ($images as $index => $image): ?>
                            <div class="relative">
                                <img src="uploads/<?php echo $image; ?>" class="w-24 h-24 object-cover rounded">
                                <a href="?action=edit&id=<?php echo $id; ?>&delete_image=<?php echo $index; ?>" class="absolute top-0 right-0 bg-danger text-white rounded-full px-2 py-1">x</a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <input type="file" name="images[]" multiple class="w-full mb-4">
                    <button type="submit" class="bg-primary text-white py-2 px-6 rounded">Update Post</button>
                </form>
            <?php else: ?>
                <h3 class="text-2xl font-bold mb-4">All Posts</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php $result = $conn->query("SELECT * FROM posts");
                    while ($row = $result->fetch_assoc()): 
                        $images = unserialize($row['images']);
                        $first_image = $images ? $images[0] : 'placeholder.png'; ?>
                        <div class="bg-white p-4 rounded shadow-md">
                            <img src="uploads/<?php echo $first_image; ?>" class="w-full h-48 object-cover rounded mb-4">
                            <h4 class="text-xl font-bold mb-2"><?php echo $row['title']; ?></h4>
                            <p class="text-gray-600 mb-4"><?php echo substr($row['content'], 0, 100); ?>...</p>
                            <a href="?action=edit&id=<?php echo $row['id']; ?>" class="bg-warning text-white py-1 px-4 rounded">Edit</a>
                            <a href="?action=delete&id=<?php echo $row['id']; ?>" class="bg-danger text-white py-1 px-4 rounded">Delete</a>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </main>
    </div>
</body>
</html>
