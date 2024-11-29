<?php
// Start session
session_start();

// Include database connection
include 'config.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $username = $_POST['username'];
    $password = $_POST['pass'];

    // Check if fields are not empty
    if (empty($username) || empty($password)) {
        header("Location: login.php?error=Username dan Password tidak boleh kosong!");
        exit();
    }

    // Prepare SQL query to select user from the database
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $user['pass'])) {
            // Password is correct, set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            // Redirect to dashboard or home page
            echo "<script>
            alert('login berhasil, Selamat datang!');
            window.location.href = '/healthy_tracker/DASHBOARD/index.php'; // Ganti dengan URL halaman login Anda
                </script>";
            exit();
        } else {
            // Incorrect password
            header("Location: login.php?error=Password salah!");
            exit();
        }
    } else {
        // User not found
        header("Location: login.php?error=Username tidak ditemukan.");
        exit();
    }
}
?>
