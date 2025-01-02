<?php
// login.php

session_start();
include('db.php');

// Generate CSRF Token
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Handle Form Submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate CSRF Token
    if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        $_SESSION['error'] = "Invalid CSRF token.";
        header("Location: login.php");
        exit();
    }

    // Retrieve and sanitize user inputs
    $username_or_email = trim($_POST['username_or_email']);
    $password = $_POST['password'];

    // Basic validation
    if (empty($username_or_email) || empty($password)) {
        $_SESSION['error'] = "All fields are required.";
        header("Location: login.php");
        exit();
    }

    // Fetch user from database
    $stmt = $conn->prepare("SELECT id, username, email, password FROM users WHERE username=? OR email=? LIMIT 1");
    if ($stmt === false) {
        $_SESSION['error'] = "Prepare failed: (" . $conn->errno . ") " . $conn->error;
        header("Location: login.php");
        exit();
    }
    $stmt->bind_param("ss", $username_or_email, $username_or_email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($id, $username, $email, $hashed_password);
        $stmt->fetch();

        // Verify password
        if (password_verify($password, $hashed_password)) {
            // Password is correct, start a new session
            session_regenerate_id(true);
            $_SESSION['user_id'] = $id;
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            header("Location: admin.php?action=posts");
            exit();
        } else {
            // Invalid password
            $_SESSION['error'] = "Invalid credentials.";
            header("Location: login.php");
            exit();
        }
    } else {
        // User not found
        $_SESSION['error'] = "Invalid credentials.";
        header("Location: login.php");
        exit();
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin Dashboard</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Log In</h2>

        <!-- Display Flash Messages -->
        <?php if(isset($_SESSION['success']) || isset($_SESSION['error'])): ?>
            <div class="mb-4">
                <?php if(isset($_SESSION['success'])): ?>
                    <div class="flex items-center bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline"><?php echo $_SESSION['success']; ?></span>
                        <button class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.style.display='none';">
                            <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <title>Close</title>
                                <path d="M14.348 5.652a1 1 0 00-1.414-1.414L10 7.172 7.066 4.238a1 1 0 10-1.414 1.414L8.828 10l-3.176 3.176a1 1 0 101.414 1.414L10 12.828l2.934 2.934a1 1 0 001.414-1.414L11.172 10l3.176-3.176z"/>
                            </svg>
                        </button>
                    </div>
                    <?php unset($_SESSION['success']); ?>
                <?php endif; ?>
                <?php if(isset($_SESSION['error'])): ?>
                    <div class="flex items-center bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline"><?php echo $_SESSION['error']; ?></span>
                        <button class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.style.display='none';">
                            <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <title>Close</title>
                                <path d="M14.348 5.652a1 1 0 00-1.414-1.414L10 7.172 7.066 4.238a1 1 0 10-1.414 1.414L8.828 10l-3.176 3.176a1 1 0 101.414 1.414L10 12.828l2.934 2.934a1 1 0 001.414-1.414L11.172 10l3.176-3.176z"/>
                            </svg>
                        </button>
                    </div>
                    <?php unset($_SESSION['error']); ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <!-- Login Form -->
        <form method="post" class="space-y-4">
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
            <div>
                <label for="username_or_email" class="block text-gray-700">Username or Email</label>
                <input type="text" id="username_or_email" name="username_or_email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div>
                <label for="password" class="block text-gray-700">Password</label>
                <input type="password" id="password" name="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div>
                <button type="submit" class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">Log In</button>
            </div>
        </form>
        <p class="text-center mt-4 text-gray-600">Don't have an account? <a href="signup.php" class="text-blue-500 hover:underline">Sign Up</a></p>
    </div>
</body>
</html>
