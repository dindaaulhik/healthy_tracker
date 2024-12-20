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

    try {
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
                $_SESSION['roles'] = $user['roles']; 

                // Redirect based on the role
                if ($_SESSION['roles'] === 'admin') {
                    echo "<script>
                            alert('Login berhasil. Selamat Datang Admin!');
                            window.location.href = '/healthy_tracker/ADMIN_DASHBOARD/admin2.php'; // Redirect to admin dashboard
                        </script>";
                } else {
                    echo "<script>
                            alert('Login berhasil. Selamat Datang!');
                            window.location.href = '/healthy_tracker/DASHBOARD/index.php'; // Redirect to user dashboard
                        </script>";
                }
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

    } catch (Exception $e) {
        // Handle errors in database query execution
        error_log("Error during login: " . $e->getMessage()); // Log the error for debugging
        header("Location: login.php?error=Terjadi kesalahan, coba lagi nanti.");
        exit();
    }
}
?>
